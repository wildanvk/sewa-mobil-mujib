<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        helper('form');
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('user/auth/login');
    }

    private function setUserSession($user)
    {
        $sessionData = [
            'role' => 'user',
            'id_user' => $user['id'],
            'nama' => $user['nama'],
            'user_logged_in' => true,
        ];

        session()->set($sessionData);
        return true;
    }

    public function auth()
    {
        $session = session();
        $model  =  new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $model->where('email', $email)->first();

        if ($user) {
            $pass = $user['password'];
            if (password_verify($password, $pass)) {
                $this->setUserSession($user);
                return redirect()->to('/');
            } else {
                $session->setFlashdata('failed', 'Password yang anda masukkan salah!');
                return redirect()->to('/user/login');
            }
        } else {
            $session->setFlashdata('failed', 'Email yang anda masukkan tidak ada!');
            return redirect()->to('/user/login');
        }
    }

    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];

        return view('user/auth/register', $data);
    }

    public function createAccount()
    {
        $validation = \Config\Services::validation();

        $data = [
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'email' => $this->request->getVar('email'),
            'telepon' => $this->request->getVar('telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'password' => $this->request->getVar('password'),
        ];

        if ($validation->run($data, 'user') == FALSE) {
            return redirect()->to('/user/register')->withInput();
        } else {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->userModel->insertUser($data);
            session()->setFlashdata('createAccount', 'Akun anda berhasil dibuat!');
            return redirect()->to('/user/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->setFlashdata('logout', 'Anda telah berhasil logout!');
        $fields = ['role', 'id_user', 'nama', 'user_logged_in'];
        $session->remove($fields);
        return redirect()->to('/');
    }
}
