<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Models\MobilModel;
use CodeIgniter\I18n\Time;

class Transaksi extends BaseController
{
    protected $transaksiModel;
    protected $transaksiDetailModel;
    protected $mobilModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->transaksiDetailModel = new DetailTransaksiModel();
        $this->mobilModel = new MobilModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Transaksi',
            'transaksi' => $this->transaksiModel->getTransaksi()
        ];

        return view('admin/sewa/transaksi', $data);
    }

    public function indexPemesanan()
    {
        $data = [
            'title' => 'Pemesanan',
            'pemesanan' => $this->transaksiModel->getActivePemesanan()
        ];

        return view('admin/sewa/pemesanan', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Transaksi',
            'transaksi' => $this->transaksiModel->getTransaksiByIdTransaksi($id),
        ];

        return view('admin/sewa/detail', $data);
    }

    public function konfirmasiPesanan($id)
    {
        $konfirmasi = $this->transaksiDetailModel->updateDetailTransaksi(['status' => 'Terkonfirmasi'], $id);
        if ($konfirmasi) {
            session()->setFlashdata('success', 'Berhasil mengonfirmasi pesanan');
            return redirect()->to('/admin/pemesanan');
        }
    }

    public function batalPesanan($id)
    {
        $transaksi = $this->transaksiModel->getTransaksiByIdTransaksi($id);
        $id_mobil = $transaksi['id_mobil'];


        $deleteTransaksi = $this->transaksiModel->deleteTransaksi($id);
        $deleteDetailTransaksi = $this->transaksiDetailModel->deleteDetailTransaksi($id);
        $updateMobil = $this->mobilModel->updateMobil(['tersedia' => 'Tersedia'], $id_mobil);

        if ($deleteTransaksi && $deleteDetailTransaksi && $updateMobil) {
            session()->setFlashdata('batal', 'Transaksi berhasil dibatalkan.');
            return redirect()->back();
        }
    }

    public function selesaiPesanan($id)
    {
        $transaksi = $this->transaksiModel->getTransaksiByIdTransaksi($id);
        $id_mobil = $transaksi['id_mobil'];

        $tanggal_sekarang = Time::now('Asia/Jakarta', 'id_ID');
        $tanggal_kembali = $transaksi['tanggal_kembali'];

        $dendaMobil = $transaksi['denda'];
        $denda = 0;

        if ($tanggal_sekarang->isAfter($tanggal_kembali)) {
            $selisih = $tanggal_sekarang->diff($tanggal_kembali)->days;
            $denda = $selisih * $dendaMobil;
        }

        $dataUpdateTransaksi = [
            'status' => 'Selesai',
        ];

        $dataUpdateDetailTransaksi = [
            'tanggal_pengembalian' => $tanggal_sekarang->toDateString(),
            'total_denda' => $denda,
            'total_bayar' => $transaksi['total_bayar'] + $denda,
        ];

        $updateMobil = $this->mobilModel->updateMobil(['tersedia' => 'Tersedia'], $id_mobil);
        $updateTransaksi = $this->transaksiModel->updateTransaksi($dataUpdateTransaksi, $id);
        $updateDetailTransaksi = $this->transaksiDetailModel->updateDetailTransaksi($dataUpdateDetailTransaksi, $id);

        if ($updateMobil && $updateTransaksi && $updateDetailTransaksi) {
            session()->setFlashdata('selesai', 'Berhasil menyelesaikan pesanan');
            return redirect()->to('/admin/transaksi');
        }
    }
}
