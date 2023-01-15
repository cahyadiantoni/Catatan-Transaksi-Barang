<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Transaksi_model;
use App\Models\Supir_model;
use App\Models\Pengurus_model;
use App\Models\Perusahaan_model;
use App\Models\Qty_model;
use App\Models\Barang_model;

class Transaksiedit extends Controller
{
    protected $mtransaksi, $session;
    protected $table = "pendataan";

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->mtransaksi = new Transaksi_model();
        $this->mperusahaan = new Perusahaan_model();
        $this->mqty = new Qty_model();
        $this->mbarang = new Barang_model();
        $this->msupir = new Supir_model();
        $this->mpengurus = new Pengurus_model();

        $this->mtransaksi->setTable($this->table);
    }

    public function index($id)
    {
        $getdata = $this->mtransaksi->dataId($id);
        $getdatasupir = $this->msupir->getdata();
        $getdatapengurus = $this->mpengurus->getdata();
        $getdataperusahaan = $this->mperusahaan->getdata();
        $getdatabarang = $this->mbarang->getdata();
        $getdataqty = $this->mqty->getdata();
        $data = array(
            'datatransaksi' => $getdata,
            'datasupir' => $getdatasupir,
            'datapengurus' => $getdatapengurus,
            'dataperusahaan' => $getdataperusahaan,
            'databarang' => $getdatabarang,
            'dataqty' => $getdataqty,
        );
        if ($this->session->has('sesusername') == "") {
            return redirect()->to("Login");
        } else {
            return view('admin/transaksiedit', $data);
        }
    }

    public function edit()
    {
        $catid = $this->request->getPost("catid");
        $nosj = $this->request->getPost("nosj");
        $nopk = $this->request->getPost("nopk");
        $nama_supir = $this->request->getPost("nama_supir");
        $nama_pengurus = $this->request->getPost("nama_pengurus");
        $nama_barang = $this->request->getPost("nama_barang");
        $nama_perusahaan = $this->request->getPost("nama_perusahaan");
        $jumlah = $this->request->getPost("jumlah");
        $qty = $this->request->getPost("qty");
        $harga = $this->request->getPost("harga");
        $total_bayar = $this->request->getPost("total_bayar");
        $nama_pengurus2 = $this->request->getPost("nama_pengurus2");
        $nama_barang2 = $this->request->getPost("nama_barang2");
        $nama_perusahaan2 = $this->request->getPost("nama_perusahaan2");
        $jumlah2 = $this->request->getPost("jumlah2");
        $qty2 = $this->request->getPost("qty2");
        $harga2 = $this->request->getPost("harga2");
        $total_bayar2 = $this->request->getPost("total_bayar2");
        $tanggal = $this->request->getPost("tanggal");
        $keterangan = $this->request->getPost("keterangan");

        $data = [
            'nosj' => $nosj,
            'nopk' => $nopk,
            'nama_supir' => $nama_supir,
            'nama_pengurus' => $nama_pengurus,
            'nama_barang' => $nama_barang,
            'nama_perusahaan' => $nama_perusahaan,
            'jumlah' => $jumlah,
            'qty' => $qty,
            'harga' => $harga,
            'total_bayar' => $total_bayar,
            'nama_pengurus2' => $nama_pengurus2,
            'nama_barang2' => $nama_barang2,
            'nama_perusahaan2' => $nama_perusahaan2,
            'jumlah2' => $jumlah2,
            'qty2' => $qty2,
            'harga2' => $harga2,
            'total_bayar2' => $total_bayar2,
            'tanggal' => $tanggal,
            'keterangan' => $keterangan,
            'catid' => $catid,
        ];

        $where = ['catid' => $catid];
        try {
            $edit = $this->mtransaksi->editData($this->table, $data, $where);
            if ($edit) {
                echo "<script>alert('Data Berhasil Diubah'); window.location='" . base_url('/Transaksi') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Diubah'); window.location='" . base_url('/Transaksi') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Diubah'); window.location'" . base_url('/Transaksi') . "'; </script>";
        }
    }
}
