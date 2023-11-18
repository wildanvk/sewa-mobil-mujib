<?php

namespace App\Models;

use CodeIgniter\Model;

class WarnaModel extends Model
{
    protected $table            = 'warna';
    protected $primaryKey       = 'id_warna';
    protected $allowedFields    = [];

    public function getWarna($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_warna' => $id])->first();
    }

    public function getWarnaActive()
    {
        return $this->where(['status' => 'Aktif'])->findAll();
    }

    public function insertWarna($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateWarna($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_warna' => $id]);
    }

    public function deleteWarna($id)
    {
        return $this->db->table($this->table)->delete(['id_warna' => $id]);
    }
}
