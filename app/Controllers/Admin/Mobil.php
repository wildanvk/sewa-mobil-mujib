<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MerekModel;
use App\Models\MobilModel;
use App\Models\WarnaModel;

class Mobil extends BaseController
{

    protected $merekModel;
    protected $mobilModel;
    protected $warnaModel;

    public function __construct()
    {
        helper('form');
        $this->merekModel = new MerekModel();
        $this->mobilModel = new MobilModel();
        $this->warnaModel = new WarnaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Mobil',
            'mobil' => $this->mobilModel->getMobil()
        ];

        return view('admin/mobil/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Mobil',
            'merek' => $this->merekModel->getMerekActive(),
            'warna' => $this->warnaModel->getWarnaActive()
        ];

        return view('admin/mobil/tambah', $data);
    }

    public function insert()
    {
        $validation = \Config\Services::validation();

        // Ambil gambar mobil
        $gambar_mobil = $this->request->getFile('gambar_mobil');
        // Beri nama random
        $nama_gambar = $gambar_mobil->getRandomName();

        $data = [
            'id_merek' => $this->request->getPost('id_merek'),
            'id_warna' => $this->request->getPost('id_warna'),
            'nama_mobil' => $this->request->getPost('nama_mobil'),
            'plat_nomor' => $this->request->getPost('plat_nomor'),
            'tahun' => $this->request->getPost('tahun'),
            'harga_sewa' => $this->request->getPost('harga_sewa'),
            'denda' => $this->request->getPost('denda'),
            'status' => $this->request->getPost('status'),
            'tersedia' => $this->request->getPost('tersedia'),
            'fitur_ac' => $this->request->getPost('fitur_ac'),
            'fitur_tv' => $this->request->getPost('fitur_tv'),
            'gambar_mobil' => $nama_gambar
        ];

        if ($validation->run($data, 'mobil') == FALSE) {
            return redirect()->to('/admin/master/mobil/tambah')->withInput();
        } else {
            // Pindahkan file gambar ke public/uploads
            $gambar_mobil->move(ROOTPATH . 'public/uploads/mobil', $nama_gambar);

            $this->mobilModel->insertMobil($data);
            session()->setFlashdata('success', 'Data mobil berhasil ditambahkan!');
            return redirect()->to('/admin/master/mobil');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Mobil',
            'mobil' => $this->mobilModel->getMobil($id),
            'merek' => $this->merekModel->getMerekActive(),
            'warna' => $this->warnaModel->getWarnaActive()
        ];

        return view('admin/mobil/edit', $data);
    }

    public function update()
    {
        $id_mobil = $this->request->getPost('id_mobil');
        $validation = \Config\Services::validation();

        $gambar_mobil = $this->request->getFile('gambar_mobil');
        // Jika gambar tidak diubah
        if ($gambar_mobil->getError() == 4) {
            $nama_gambar = $this->request->getPost('gambar_mobil_lama');
        } else {
            // Beri nama random
            $nama_gambar = $gambar_mobil->getRandomName();
            // Hapus file gambar lama
            unlink(ROOTPATH . 'public/uploads/mobil/' . $this->request->getPost('gambar_mobil_lama'));
        }

        $data = [
            'id_mobil' => $id_mobil,
            'id_merek' => $this->request->getPost('id_merek'),
            'id_warna' => $this->request->getPost('id_warna'),
            'nama_mobil' => $this->request->getPost('nama_mobil'),
            'plat_nomor' => $this->request->getPost('plat_nomor'),
            'tahun' => $this->request->getPost('tahun'),
            'harga_sewa' => $this->request->getPost('harga_sewa'),
            'denda' => $this->request->getPost('denda'),
            'status' => $this->request->getPost('status'),
            'tersedia' => $this->request->getPost('tersedia'),
            'fitur_ac' => $this->request->getPost('fitur_ac'),
            'fitur_tv' => $this->request->getPost('fitur_tv'),
            'gambar_mobil' => $nama_gambar
        ];

        if ($validation->run($data, 'mobil_edit') == FALSE) {
            return redirect()->to('/admin/master/mobil/edit/' . $data['id_mobil'])->withInput();
        } else {
            if (!$gambar_mobil->getError() == 4) {
                $gambar_mobil->move(ROOTPATH . 'public/uploads/mobil', $nama_gambar);
            }

            $this->mobilModel->updateMobil($data, $id_mobil);
            session()->setFlashdata('update', 'Data mobil berhasil diubah!');
            return redirect()->to('/admin/master/mobil');
        }
    }

    public function hapus($id)
    {
        $this->mobilModel->deleteMobil($id);
        session()->setFlashdata('delete', 'Data mobil berhasil dihapus!');
        return redirect()->to('/admin/master/mobil');
    }
}
