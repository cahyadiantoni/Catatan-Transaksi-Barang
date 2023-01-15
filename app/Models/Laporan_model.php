<?php

namespace App\Models;

use CodeIgniter\Model;

class Laporan_model extends Model
{
    public function hasilFilter($allperusahaan, $perusahaan, $allbarang, $barang, $daritanggal, $hinggatanggal)
    {
        $builder = $this->db->table('pendataan');
        $builder->select();
        if ($allperusahaan == null) {
            if (isset($perusahaan)) {
                $arrayPerusahaan = [];
                foreach ($perusahaan as $row) {
                    // $builder->where('nama_perusahaan =', $row . "\n");
                    // $builder->orwhere('nama_perusahaan =', $row);
                    array_push($arrayPerusahaan, "$row", "$row\n");
                }
                $builder->whereIn('nama_perusahaan', $arrayPerusahaan);
            } else {
                $builder->where('nama_perusahaan', $allperusahaan);
            }
        }
        if ($allbarang == null) {
            if (isset($barang)) {
                $arrayBarang = [];
                foreach ($barang as $row) {
                    // $builder->where('nama_barang =', $row . "\n");
                    // $builder->orwhere('nama_barang =', $row);
                    array_push($arrayBarang, "$row", "$row\n");
                }
                $builder->whereIn('nama_barang', $arrayBarang);
            } else {
                $builder->where('nama_barang', $allbarang);
            }
        }
        // if ($dariharga > 0) {
        //     $builder->where('harga >=', $dariharga);
        // }
        // if ($hinggaharga > 0) {
        //     $builder->where('harga <=', $hinggaharga);
        // }
        if (isset($daritanggal)) {
            $builder->where('tanggal >=', "$daritanggal");
        }
        if (isset($hinggatanggal)) {
            $builder->where('tanggal <=', "$hinggatanggal");
        }
        $builder->orderBy('tanggal', 'ASC');
        $query = $builder->get();
        return $query->getResult();
    }
}
