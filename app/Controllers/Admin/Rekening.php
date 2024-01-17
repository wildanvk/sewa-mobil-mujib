<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RekeningModel;

class Rekening extends BaseController
{
    protected $rekeningModel;

    public function __construct()
    {
        helper('form');
        $this->rekeningModel = new RekeningModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Rekening',
            'rekening' => $this->rekeningModel->getRekening()
        ];

        return view('admin/rekening/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Rekening',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/rekening/tambah', $data);
    }

    public function insert()
    {

        $validation = \Config\Services::validation();

        $data = [
            'nama_bank' => $this->request->getVar('nama_bank'),
            'no_rekening' => $this->request->getVar('no_rekening'),
            'atas_nama' => $this->request->getVar('atas_nama'),
            'status' => $this->request->getVar('status')
        ];

        if ($validation->run($data, 'rekening') == FALSE) {
            return redirect()->to('/admin/master/rekening/tambah')->withInput();
        } else {
            $this->rekeningModel->insertRekening($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
            return redirect()->to('/admin/master/rekening');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Rekening',
            'validation' => \Config\Services::validation(),
            'rekening' => $this->rekeningModel->getRekening($id)
        ];

        return view('admin/rekening/edit', $data);
    }

    public function update()
    {
        $validation = \Config\Services::validation();
        $id_rekening = $this->request->getVar('id_rekening');

        $data = [
            'nama_bank' => $this->request->getVar('nama_bank'),
            'no_rekening' => $this->request->getVar('no_rekening'),
            'atas_nama' => $this->request->getVar('atas_nama'),
            'status' => $this->request->getVar('status')
        ];

        if ($validation->run($data, 'rekening_update') == FALSE) {
            return redirect()->to('/admin/master/rekening/edit/' . $id_rekening)->withInput();
        } else {
            $this->rekeningModel->updateRekening($data, $id_rekening);
            session()->setFlashdata('update', 'Data berhasil diubah.');
            return redirect()->to('/admin/master/rekening');
        }
    }

    public function hapus($id)
    {
        $this->rekeningModel->deleteRekening($id);
        session()->setFlashdata('delete', 'Data berhasil dihapus.');
        return redirect()->to('/admin/master/rekening');
    }
}
