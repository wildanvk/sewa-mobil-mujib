<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $allowedFields    = ['id_user', 'status', 'created_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

    public function getTransaksi($id = false)
    {
        if ($id == false) {
            return $this->db->table('transaksi')
                ->select('user.nama, mobil.*, transaksi.id_user, transaksi.status as "status_transaksi", transaksi.created_at, detail_transaksi.*')
                ->join('user', 'user.id = transaksi.id_user')
                ->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi')
                ->join('mobil', 'mobil.id_mobil = detail_transaksi.id_mobil')
                ->orderBy('transaksi.created_at', 'DESC')
                ->get()
                ->getResultArray();
        }
        return $this->db->table('transaksi')
            ->select('user.nama, mobil.*, transaksi.id_user, transaksi.status as "status_transaksi", transaksi.created_at, detail_transaksi.*')
            ->join('user', 'user.id = transaksi.id_user')
            ->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi')
            ->join('mobil', 'mobil.id_mobil = detail_transaksi.id_mobil')
            ->where(['transaksi.id_user' => $id])
            ->orderBy('transaksi.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getTransaksiByIdTransaksi($id = false)
    {
        return $this->db->table('transaksi')
            ->select('user.nama, mobil.*, transaksi.id_user, transaksi.status as "status_transaksi", transaksi.created_at, detail_transaksi.*')
            ->join('user', 'user.id = transaksi.id_user')
            ->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi')
            ->join('mobil', 'mobil.id_mobil = detail_transaksi.id_mobil')
            ->where(['transaksi.id_transaksi' => $id])
            ->get()
            ->getRowArray();
    }

    public function getCountActiveTransaksi($id)
    {
        return $this->db->table('transaksi')
            ->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi')
            ->where(['transaksi.id_user' => $id])
            ->where(['transaksi.status' => 'Aktif'])
            ->countAllResults();
    }

    public function getActivePemesanan()
    {
        return $this->db->table('transaksi')
            ->select('user.nama, mobil.*, transaksi.id_user, transaksi.status as "status_transaksi", transaksi.created_at, detail_transaksi.*')
            ->join('user', 'user.id = transaksi.id_user')
            ->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi')
            ->join('mobil', 'mobil.id_mobil = detail_transaksi.id_mobil')
            ->where(['transaksi.status' => 'Aktif'])
            ->get()
            ->getResultArray();
    }

    public function insertTransaksi($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateTransaksi($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_transaksi' => $id]);
    }

    public function deleteTransaksi($id)
    {
        return $this->db->table($this->table)->delete(['id_transaksi' => $id]);
    }
}
