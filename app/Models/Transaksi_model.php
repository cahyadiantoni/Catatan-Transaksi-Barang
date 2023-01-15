<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi_model extends Model
{
    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM pendataan ORDER BY tanggal DESC");

        return $query->getResult();
    }
    public function dataId($id)
    {
        $query = $this->db->query("SELECT * FROM pendataan WHERE catid=$id");
        return $query->getResult();
    }

    public function simpanData($table, $data)
    {
        $this->db->table($table)->insert($data);

        return true;
    }

    public function editData($table, $data, $where)
    {
        $this->db->table($table)->update($data, $where);

        return true;
    }

    public function hapusData($table, $where)
    {
        $this->db->table($table)->delete($where);

        return true;
    }

    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }

    function getDataId($table, $where)
    {
        $builder = $this->db->table($table);
        $builder->where($where);

        return $builder->get()->getResult();
    }

    public function cekInput($tanggal, $nosj, $nopk, $nama_supir, $nama_pengurus, $nama_barang, $nama_perusahaan, $jumlah, $qty, $harga, $total_bayar)
    {
        $builder = $this->db->table('pendataan');
        $builder->select('*');
        $builder->where('tanggal', $tanggal);
        $builder->where('nosj', $nosj);
        $builder->where('nopk', $nopk);
        $builder->where('nama_supir', $nama_supir);
        $builder->where('nama_pengurus', $nama_pengurus);
        $builder->where('nama_barang', $nama_barang);
        $builder->where('nama_perusahaan', $nama_perusahaan);
        $builder->where('jumlah', $jumlah);
        $builder->where('qty', $qty);
        $builder->where('harga', $harga);
        $builder->where('total_bayar', $total_bayar);
        return $builder->countAllResults();
    }

    public function getDataTerakhir()
    {
        $builder = $this->db->table('pendataan');
        $builder->select('*');
        $builder->orderBy('catid', 'DESC');
        $builder->limit(1);
        return $builder->get()->getResult();
    }
}
