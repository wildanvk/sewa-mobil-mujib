<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    protected $transaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Transaksi',
            'transaksi' => $this->transaksiModel->getTransaksiSelesai()
        ];

        return view('admin/laporan/transaksi', $data);
    }

    public function cetak()
    {
        $dompdf = new dompdf();
        $model = new TransaksiModel();
        $bulan = $this->request->getVar('bulan');
        if (!empty($bulan)) {
            $data['bulan'] = format_bulan($bulan);
        }

        $now = date('Y-m-d');

        $data['transaksi'] = $model->getTransaksiByBulan($bulan);
        $html = view('admin/laporan/print', $data);
        $dompdf->loadhtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Laporan Transaksi ' . $now . '.pdf', array(
            "Attachment" => 0
        ));
    }
}
