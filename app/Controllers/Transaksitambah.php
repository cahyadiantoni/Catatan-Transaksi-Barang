<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Transaksi_model;
use App\Models\Supir_model;
use App\Models\Pengurus_model;
use App\Models\Perusahaan_model;
use App\Models\Qty_model;
use App\Models\Barang_model;

class Transaksitambah extends Controller
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

    public function index()
    {
        $getdatasupir = $this->msupir->getdata();
        $getdatapengurus = $this->mpengurus->getdata();
        $getdataperusahaan = $this->mperusahaan->getdata();
        $getdatabarang = $this->mbarang->getdata();
        $getdataqty = $this->mqty->getdata();
        $data = array(
            'datasupir' => $getdatasupir,
            'datapengurus' => $getdatapengurus,
            'dataperusahaan' => $getdataperusahaan,
            'databarang' => $getdatabarang,
            'dataqty' => $getdataqty,
        );
        if ($this->session->has('sesusername') == "") {
            return redirect()->to("Login");
        } else {
            return view('admin/transaksitambah', $data);
        }
    }

    public function simpan()
    {
        $tanggal = strtotime($this->request->getPost("tanggal"));
        $tanggal = date('Y-m-d H:i:s', $tanggal);
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
        if(isset($jumlah)&&isset($harga)){
            $total_bayar = floatval($jumlah) * floatval($harga);
        }else if(isset($jumlah)&&$harga==null){
            $harga=0;
            $total_bayar = 0;
        }else if(isset($harga)&&$jumlah==null){
            $jumlah=0;
            $total_bayar = floatval($harga);
        }else{
            $jumlah=0;
            $harga=0;
            $total_bayar = 0;
        }
        if(isset($jumlah2)&&isset($harga2)){
            $total_bayar2 = floatval($jumlah2) * floatval($harga2);
        }else if(isset($jumlah2)&&$harga2==null){
            $harga2=0;
            $total_bayar2 = 0;
        }else if(isset($harga2)&&$jumlah2==null){
            $jumlah2=0;
            $total_bayar2 = floatval($harga2);
        }else{
            $jumlah2=0;
            $harga2=0;
            $total_bayar2=0;
        }
        $keterangan = $this->request->getPost("keterangan");
        // echo $this->mtransaksi->cekInput($tanggal, $nosj, $nopk, $nama_supir, $nama_pengurus, $nama_barang, $nama_perusahaan, $jumlah, $qty, $harga, $total_bayar);
        // die;
        if($this->mtransaksi->cekInput($tanggal, $nosj, $nopk, $nama_supir, $nama_pengurus, $nama_barang, $nama_perusahaan, $jumlah, $qty, $harga, $total_bayar)>0){
            echo "<script>alert('Duplicate, Data gagal disimpan'); window.location=history.go(-1); </script>";
        }else{
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
            ];
            try {
                $simpan = $this->mtransaksi->simpanData($this->table, $data);
                if ($simpan) {
                    echo "<script>alert('Data Berhasil Disimpan'); window.location='" . base_url('/Transaksi') . "'; </script>";
                } else {
                    echo "<script>alert('Data Gagal Disimpan'); window.location='" . base_url('/Transaksi') . "'; </script>";
                }
            } catch (\Exception $e) {
                echo "<script>alert('Data Gagal Disimpan'); window.location'" . base_url('/Transaksi') . "'; </script>";
            }
        }
    }
}
