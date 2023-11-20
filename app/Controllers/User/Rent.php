<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\MobilModel;

class Rent extends BaseController
{
    protected $mobilModel;

    public function __construct()
    {
        $this->mobilModel = new MobilModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Rent',
            'mobil' => $this->mobilModel->getMobilActive()
        ];

        return view('user/rent/index', $data);
    }
}
