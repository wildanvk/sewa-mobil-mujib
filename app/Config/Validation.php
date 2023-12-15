<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $merek = [
        'nama_merek' => 'required',
        'status' => 'required'
    ];

    public $merek_errors = [
        'nama_merek' => [
            'required' => 'Nama merek harus diisi!',
        ],
        'status' => [
            'required' => 'Status harus diisi!'
        ]
    ];

    public $warna = [
        'warna' => 'required',
        'status' => 'required'
    ];

    public $warna_errors = [
        'warna' => [
            'required' => 'Nama warna harus diisi!',
        ],
        'status' => [
            'required' => 'Status harus diisi!'
        ]
    ];

    public $mobil = [
        'id_merek' => 'required',
        'id_warna' => 'required',
        'nama_mobil' => 'required',
        'plat_nomor' => 'required|is_unique[mobil.plat_nomor]',
        'tahun' => 'required',
        'harga_sewa' => 'required',
        'denda' => 'required',
        'status' => 'required',
        'tersedia' => 'required',
        'fitur_ac' => 'required',
        'fitur_tv' => 'required',
        'gambar_mobil' => 'uploaded[gambar_mobil]|mime_in[gambar_mobil,image/jpg,image/jpeg,image/png]|max_size[gambar_mobil,1024]|is_image[gambar_mobil]',
    ];

    public $mobil_errors = [
        'id_merek' => [
            'required' => 'Merek harus diisi!',
        ],
        'id_warna' => [
            'required' => 'Warna harus diisi!',
        ],
        'nama_mobil' => [
            'required' => 'Nama mobil harus diisi!',
        ],
        'plat_nomor' => [
            'required' => 'Plat nomor harus diisi!',
            'is_unique' => 'Plat nomor sudah terdaftar!'
        ],
        'tahun' => [
            'required' => 'Tahun harus diisi!',
        ],
        'harga_sewa' => [
            'required' => 'Harga sewa harus diisi!',
        ],
        'denda' => [
            'required' => 'Denda harus diisi!',
        ],
        'status' => [
            'required' => 'Status harus diisi!',
        ],
        'tersedia' => [
            'required' => 'Tersedia harus diisi!',
        ],
        'fitur_ac' => [
            'required' => 'Fitur AC harus diisi!',
        ],
        'fitur_tv' => [
            'required' => 'Fitur TV harus diisi!',
        ],
        'gambar_mobil' => [
            'uploaded' => 'Gambar mobil harus diisi!',
            'mime_in' => 'Gambar mobil harus berformat jpg/jpeg/png!',
            'max_size' => 'Ukuran gambar maksimal 1MB!',
            'is_image' => 'File yang anda pilih bukan gambar!'
        ]
    ];

    public $mobil_edit = [
        'id_merek' => 'required',
        'id_warna' => 'required',
        'nama_mobil' => 'required',
        'plat_nomor' => 'required',
        'tahun' => 'required',
        'harga_sewa' => 'required',
        'denda' => 'required',
        'status' => 'required',
        'tersedia' => 'required',
        'fitur_ac' => 'required',
        'fitur_tv' => 'required',
        'gambar_mobil' => 'mime_in[gambar_mobil,image/jpg,image/jpeg,image/png]|max_size[gambar_mobil,1024]|is_image[gambar_mobil]',
    ];

    public $mobil_edit_errors = [
        'id_merek' => [
            'required' => 'Merek harus diisi!',
        ],
        'id_warna' => [
            'required' => 'Warna harus diisi!',
        ],
        'nama_mobil' => [
            'required' => 'Nama mobil harus diisi!',
        ],
        'plat_nomor' => [
            'required' => 'Plat nomor harus diisi!',
        ],
        'tahun' => [
            'required' => 'Tahun harus diisi!',
        ],
        'harga_sewa' => [
            'required' => 'Harga sewa harus diisi!',
        ],
        'denda' => [
            'required' => 'Denda harus diisi!',
        ],
        'status' => [
            'required' => 'Status harus diisi!',
        ],
        'tersedia' => [
            'required' => 'Tersedia harus diisi!',
        ],
        'fitur_ac' => [
            'required' => 'Fitur AC harus diisi!',
        ],
        'fitur_tv' => [
            'required' => 'Fitur TV harus diisi!',
        ],
        'gambar_mobil' => [
            'mime_in' => 'Gambar mobil harus berformat jpg/jpeg/png!',
            'max_size' => 'Ukuran gambar maksimal 1MB!',
            'is_image' => 'File yang anda pilih bukan gambar!'
        ]
    ];

    public $user = [
        'nama' => 'required',
        'nik' => 'required|is_unique[user.nik]|min_length[16]|max_length[16]|numeric',
        'jenis_kelamin' => 'required',
        'email' => 'required|valid_email|is_unique[user.email]',
        'telepon' => 'required',
        'alamat' => 'required',
        'password' => 'required|min_length[8]',

    ];

    public $user_errors = [
        'nama' => [
            'required' => 'Nama harus diisi!',
        ],
        'nik' => [
            'required' => 'NIK harus diisi!',
            'is_unique' => 'NIK sudah terdaftar!',
            'min_length' => 'NIK harus 16 karakter!',
            'max_length' => 'NIK harus 16 karakter!',
            'numeric' => 'NIK harus berupa angka!'
        ],
        'jenis_kelamin' => [
            'required' => 'Jenis kelamin harus diisi!',
        ],
        'email' => [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Email tidak valid!',
            'is_unique' => 'Email sudah terdaftar!'
        ],
        'telepon' => [
            'required' => 'No. telepon harus diisi!',
        ],
        'alamat' => [
            'required' => 'Alamat harus diisi!',
        ],
        'password' => [
            'required' => 'Password harus diisi!',
            'min_length' => 'Password minimal 8 karakter!'
        ],

    ];
}