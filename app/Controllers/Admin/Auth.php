<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('admin/auth/login');
    }

    public function auth()
    {
        $session = session();
        $model  =  new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $model->where('username', $username)->first();

        if ($user) {
            $pass = $user['password'];
            if ($pass == $password) {
                $this->setUserSession($user);
                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashdata('failed', 'Password yang anda masukkan salah!');
                return redirect()->to('/admin');
            }
        } else {
            $session->setFlashdata('failed', 'Username yang anda masukkan tidak ada!');
            return redirect()->to('/admin');
        }
    }

    private function setUserSession($user)
    {
        $sessionData = [
            'role' => 'admin',
            'id_admin' => $user['id_admin'],
            'nama_admin' => $user['nama_admin'],
            'username' => $user['username'],
            'admin_logged_in' => true,
        ];

        session()->set($sessionData);
        return true;
    }

    public function logout()
    {
        $session = session();
        $session->setFlashdata('logout', 'Anda telah berhasil logout!');
        $fields = ['role', 'id_admin', 'username', 'logged_in'];
        $session->remove($fields);


        return redirect()->to('/admin');
    }
}
