<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\MobilModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\RekeningModel;
use CodeIgniter\I18n\Time;

class Rent extends BaseController
{
    protected $mobilModel;
    protected $transaksiModel;
    protected $detailTransaksiModel;
    protected $rekeningModel;

    public function __construct()
    {
        $this->mobilModel = new MobilModel();
        $this->transaksiModel = new TransaksiModel();
        $this->detailTransaksiModel = new DetailTransaksiModel();
        $this->rekeningModel = new RekeningModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Rent',
            'mobil' => $this->mobilModel->getMobilActive(),
            'tx' => $this->transaksiModel->getCountActiveTransaksi(session()->get('id_user'))
        ];

        return view('user/rent/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail',
            'mobil' => $this->mobilModel->getMobil($id),
            'tx' => $this->transaksiModel->getCountActiveTransaksi(session()->get('id_user'))
        ];

        return view('user/rent/detail', $data);
    }

    public function rent($id)
    {
        $data = [
            'title' => 'Rent',
            'mobil' => $this->mobilModel->getMobil($id),
            'tx' => $this->transaksiModel->getCountActiveTransaksi(session()->get('id_user'))
        ];

        return view('user/rent/rent', $data);
    }

    public function transaksiSewa()
    {
        $validation = \Config\Services::validation();

        $id_mobil = $this->request->getVar('id_mobil');
        $tanggal_sewa = $this->request->getVar('tanggal_sewa');
        $tanggal_kembali = $this->request->getVar('tanggal_kembali');

        $data = [
            'id_mobil' => $id_mobil,
            'tanggal_sewa' => $tanggal_sewa,
            'tanggal_kembali' => $tanggal_kembali
        ];

        // Menghitung lama sewa
        $tanggal_sewa = Time::parse($tanggal_sewa);
        $tanggal_kembali = Time::parse($tanggal_kembali);
        $lama_sewa = $tanggal_sewa->diff($tanggal_kembali)->days;

        // Membuat ID Transaksi
        $prefix = 'TRX'; // Prefix kode transaksi (opsional)
        $currentDateTime = Time::now(); // Tanggal dan waktu saat ini
        $dateString = $currentDateTime->format('YmdHis'); // Merubah format tanggal dan waktu menjadi string
        $randomNumber = mt_rand(100, 999); // Membuat angka acak dari 100 sampai 999
        $transactionCode = $prefix . $dateString . $randomNumber;

        // Menghitung total bayar
        $mobil = $this->mobilModel->getMobil($id_mobil);
        $total_bayar = $mobil['harga_sewa'] * $lama_sewa;


        if ($validation->run($data, 'transaksi') == FALSE || $tanggal_kembali->isBefore($tanggal_sewa)) {
            session()->setFlashdata('gagal', 'Harap masukkan tanggal yang valid!');
            return redirect()->back()->withInput();
        } else {
            $transaksi = [
                'id_transaksi' => $transactionCode,
                'id_user' => session()->get('id_user'),
            ];

            $detailTransaksi = [
                'id_transaksi' => $transactionCode,
                'id_mobil' => $id_mobil,
                'tanggal_sewa' => $tanggal_sewa,
                'tanggal_kembali' => $tanggal_kembali,
                'lama_sewa' => $lama_sewa,
                'total_bayar' => $total_bayar,
            ];

            $insertTransaksi = $this->transaksiModel->insertTransaksi($transaksi);
            $insertDetailTransaksi = $this->detailTransaksiModel->insertDetailTransaksi($detailTransaksi);

            if ($insertTransaksi && $insertDetailTransaksi) {
                $updateMobil = $this->mobilModel->updateMobil(['tersedia' => 'Tidak Tersedia'], $id_mobil);
                session()->setFlashdata('success', 'Silahkan lanjut ke menu transaksi untuk melakukan pembayaran.');
                return redirect()->to('/rent');
            }
        }
    }

    public function batalTransaksi($id)
    {
        $transaksi = $this->transaksiModel->getTransaksiByIdTransaksi($id);
        $id_mobil = $transaksi['id_mobil'];


        $deleteTransaksi = $this->transaksiModel->deleteTransaksi($id);
        $deleteDetailTransaksi = $this->detailTransaksiModel->deleteDetailTransaksi($id);
        $updateMobil = $this->mobilModel->updateMobil(['tersedia' => 'Tersedia'], $id_mobil);

        if ($deleteTransaksi && $deleteDetailTransaksi && $updateMobil) {
            session()->setFlashdata('batal', 'Transaksi berhasil dibatalkan.');
            return redirect()->to('/rent');
        }
    }

    public function transaksiMenu()
    {
        $data = [
            'title' => 'Transaksi',
            'transaksi' => $this->transaksiModel->getTransaksi(session()->get('id_user')),
            'tx' => $this->transaksiModel->getCountActiveTransaksi(session()->get('id_user'))
        ];

        return view('user/rent/transaksi', $data);
    }

    public function menuPembayaran($id)
    {
        $data = [
            'title' => 'Pembayaran',
            'transaksi' => $this->transaksiModel->getTransaksiByIdTransaksi($id),
            'rekening' => $this->rekeningModel->getRekening(),
            'tx' => $this->transaksiModel->getCountActiveTransaksi(session()->get('id_user'))
        ];

        return view('user/rent/pembayaran', $data);
    }

    public function pembayaran()
    {
        $validation = \Config\Services::validation();

        $id_transaksi = $this->request->getVar('id_transaksi');
        $bukti_pembayaran = $this->request->getFile('bukti_pembayaran');
        $foto_ktp = $this->request->getFile('foto_ktp');

        $data = [
            'id_transaksi' => $id_transaksi,
            'bukti_pembayaran' => $bukti_pembayaran,
            'foto_ktp' => $foto_ktp
        ];

        if ($validation->run($data, 'pembayaran') == FALSE) {
            session()->setFlashdata('gagal', 'Harap isi data yang valid!');
            return redirect()->back()->withInput();
        } else {
            $nama_bukti_pembayaran = $bukti_pembayaran->getRandomName();
            $bukti_pembayaran->move(ROOTPATH . 'img/bukti', $nama_bukti_pembayaran);

            $nama_foto_ktp = $foto_ktp->getRandomName();
            $foto_ktp->move(ROOTPATH . 'img/ktp', $nama_foto_ktp);

            $dataDetailTransaksi = [
                'bukti_pembayaran' => $nama_bukti_pembayaran,
                'foto_ktp' => $nama_foto_ktp,
                'status' => 'Menunggu Konfirmasi',
                'uploaded' => 1
            ];

            $updateDetailTransaksi = $this->detailTransaksiModel->updateDetailTransaksi($dataDetailTransaksi, $id_transaksi);

            if ($updateDetailTransaksi) {
                session()->setFlashdata('success', 'Pembayaran berhasil dilakukan, silahkan menunggu konfirmasi dari admin.');
                return redirect()->to('/rent/menu_transaksi');
            }
        }
    }
}
