<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ImageController extends BaseController
{
    public function showBukti($namaFile)
    {
        $path = ROOTPATH . 'img/bukti/' . $namaFile;

        // Periksa apakah file ada sebelum menampilkan
        if (file_exists($path)) {
            $mime = mime_content_type($path);
            header('Content-Length: ' . filesize($path));
            header("Content-Type: $mime");
            header('Content-Disposition: inline; filename="' . $path . '";');
            readfile($path);
            exit();
        } else {
            // File tidak ditemukan, tangani sesuai kebijakan aplikasi Anda
            echo 'File not found';
        }
    }

    public function showKTP($namaFile)
    {
        $path = ROOTPATH . 'img/ktp/' . $namaFile;

        // Periksa apakah file ada sebelum menampilkan
        if (file_exists($path)) {
            $mime = mime_content_type($path);
            header('Content-Length: ' . filesize($path));
            header("Content-Type: $mime");
            header('Content-Disposition: inline; filename="' . $path . '";');
            readfile($path);
            exit();
        } else {
            // File tidak ditemukan, tangani sesuai kebijakan aplikasi Anda
            echo 'File not found';
        }
    }
}
