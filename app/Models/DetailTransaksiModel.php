<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    protected $table            = 'detail_transaksi';
    protected $primaryKey       = 'id_detail';
    protected $allowedFields    = ['id_transaksi', 'id_mobil', 'tanggal_sewa', 'tanggal_kembali', 'lama_sewa', 'tanggal_pengembalian', 'total_bayar', 'total_denda', 'bukti_pembayaran', 'foto_ktp', 'status'];

    public function insertDetailTransaksi($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateDetailTransaksi($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_transaksi' => $id]);
    }

    public function deleteDetailTransaksi($id)
    {
        return $this->db->table($this->table)->delete(['id_transaksi' => $id]);
    }
}
