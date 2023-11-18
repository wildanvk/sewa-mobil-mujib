<?php

namespace App\Models;

use CodeIgniter\Model;

class MerekModel extends Model
{
    protected $table            = 'merek';
    protected $primaryKey       = 'id_merek';
    protected $allowedFields    = [];

    public function getMerek($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_merek' => $id])->first();
    }

    public function insertMerek($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateMerek($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_merek' => $id]);
    }

    public function deleteMerek($id)
    {
        return $this->db->table($this->table)->delete(['id_merek' => $id]);
    }
}
