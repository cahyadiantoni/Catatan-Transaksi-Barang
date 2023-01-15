<?php

namespace App\Models;

use CodeIgniter\Model;

class Perusahaan_model extends Model
{
    protected $table;
    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM aset1 ORDER BY nama_perusahaan ASC");

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
}
