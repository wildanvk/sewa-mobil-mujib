<?php

namespace App\Models;

use CodeIgniter\Model;

class MobilModel extends Model
{
    protected $table            = 'mobil';
    protected $primaryKey       = 'id_mobil';
    protected $allowedFields    = ['id_merek', 'id_warna', 'nama_mobil', 'plat_nomor', 'tahun', 'harga_sewa', 'denda', 'status', 'tersedia', 'fitur_ac', 'fitur_tv', 'gambar_mobil'];

    public function getMobil($id = false)
    {
        if ($id == false) {
            return $this->db->table('mobil')
                ->select('merek.nama_merek, warna.warna, mobil.*')
                ->join('merek', 'merek.id_merek = mobil.id_merek')
                ->join('warna', 'warna.id_warna = mobil.id_warna')
                ->get()
                ->getResultArray();
        }
        return $this->db->table('mobil')
            ->select('merek.nama_merek, warna.warna, mobil.*')
            ->join('merek', 'merek.id_merek = mobil.id_merek')
            ->join('warna', 'warna.id_warna = mobil.id_warna')
            ->where(['id_mobil' => $id])
            ->get()
            ->getRowArray();
    }

    public function getMobilActive()
    {
        return $this->db->table('mobil')
            ->select('merek.nama_merek, warna.warna, mobil.*')
            ->join('merek', 'merek.id_merek = mobil.id_merek')
            ->join('warna', 'warna.id_warna = mobil.id_warna')
            ->where(['mobil.status' => 'Aktif'])
            ->get()
            ->getResultArray();
    }

    public function insertMobil($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateMobil($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_mobil' => $id]);
    }

    public function deleteMobil($id)
    {
        return $this->db->table($this->table)->delete(['id_mobil' => $id]);
    }
}
