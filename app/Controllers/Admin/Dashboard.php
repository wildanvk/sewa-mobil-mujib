<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use App\Models\MobilModel;

class Dashboard extends BaseController
{
    protected $TransaksiModel;
    protected $UserModel;
    protected $MobilModel;

    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
        $this->UserModel = new UserModel();
        $this->MobilModel = new MobilModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'countTransaksi' => $this->TransaksiModel->getCountTransaksiSelesai(),
            'countPendapatan' => $this->TransaksiModel->getSumPendapatanTransaksi(),
            'countPesanan' => $this->TransaksiModel->getCountActiveTransaksi(),
            'countMobil' => $this->MobilModel->getCountMobil(),
            'grafikTransaksiSelesai' => $this->TransaksiModel->getGrafikTransaksiSelesai(),
            'grafikJumlahPendapatan' => $this->TransaksiModel->getGrafikJumlahPendapatan(),
        ];

        return view('admin/dashboard/index', $data);
    }
}
