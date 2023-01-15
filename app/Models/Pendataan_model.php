<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendataan_model extends Model
{
    public function getdata()
    {
        $query = $this->db->query("SELECT * FROM pendataan");

        return $query->getResult();
    }
}
