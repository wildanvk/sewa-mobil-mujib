<?php

namespace App\Models;

use CodeIgniter\Model;

class RekeningModel extends Model
{
    protected $table            = 'rekening';
    protected $primaryKey       = 'id_rekening';
    protected $allowedFields    = ['nama_bank', 'nomor_rekening', 'atas_nama', 'status'];

    public function getRekening($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_rekening' => $id])->first();
    }

    public function insertRekening($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateRekening($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_rekening' => $id]);
    }

    public function deleteRekening($id)
    {
        return $this->db->table($this->table)->delete(['id_rekening' => $id]);
    }
}
