<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WarnaModel;

class Warna extends BaseController
{
    protected $warnaModel;

    public function __construct()
    {
        helper('form');
        $this->warnaModel = new WarnaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Warna Mobil',
            'warna' => $this->warnaModel->getWarna()
        ];

        return view('admin/warna/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Warna',
        ];

        return view('admin/warna/tambah', $data);
    }

    public function insert()
    {
        $validation = \Config\Services::validation();

        $data = [
            'warna' => $this->request->getPost('warna'),
            'status' => $this->request->getPost('status')
        ];

        if ($validation->run($data, 'warna') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        } else {
            $this->warnaModel->insertWarna($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
            return redirect()->to('/admin/master/warna');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Warna',
            'warna' => $this->warnaModel->getWarna($id)
        ];

        return view('admin/warna/edit', $data);
    }

    public function update()
    {
        $validation = \Config\Services::validation();

        $data = [
            'warna' => $this->request->getPost('warna'),
            'status' => $this->request->getPost('status')
        ];

        $id = $this->request->getPost('id_warna');

        if ($validation->run($data, 'warna') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        } else {
            $this->warnaModel->updateWarna($data, $id);
            session()->setFlashdata('success', 'Data berhasil diupdate.');
            return redirect()->to('/admin/master/warna');
        }
    }

    public function hapus($id)
    {
        $this->warnaModel->deleteWarna($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/admin/master/warna');
    }
}
