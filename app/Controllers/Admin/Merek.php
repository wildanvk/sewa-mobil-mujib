<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MerekModel;

class Merek extends BaseController
{
    protected $merekModel;

    public function __construct()
    {
        helper('form');
        $this->merekModel = new MerekModel();
    }

    public function index()
    {
        session();
        $merek = $this->merekModel->getMerek();
        $data = [
            'title' => 'Data Merek Mobil',
            'merek' => $merek
        ];
        return view('admin/merek/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Merek',
        ];
        return view('admin/merek/tambah', $data);
    }

    public function insert()
    {
        $validation = \Config\Services::validation();

        $data = [
            'nama_merek' => $this->request->getPost('nama_merek'),
            'status' => $this->request->getPost('status')
        ];

        if ($validation->run($data, 'merek') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        } else {
            $this->merekModel->insertMerek($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
            return redirect()->to('/admin/master/merek');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Merek',
            'merek' => $this->merekModel->getMerek($id)
        ];
        return view('admin/merek/edit', $data);
    }

    public function update()
    {
        $validation = \Config\Services::validation();
        $id_merek = $this->request->getPost('id_merek');

        $data = [
            'id_merek' => $id_merek,
            'nama_merek' => $this->request->getPost('nama_merek'),
            'status' => $this->request->getPost('status')
        ];

        if ($validation->run($data, 'merek') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        } else {
            $this->merekModel->updateMerek($data, $id_merek);
            session()->setFlashdata('update', 'Data berhasil diubah.');
            return redirect()->to('/admin/master/merek');
        }
    }

    public function hapus($id)
    {
        $this->merekModel->deleteMerek($id);
        session()->setFlashdata('delete', 'Data berhasil dihapus.');
        return redirect()->to('/admin/master/merek');
    }
}
