<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Perusahaan_model;

class Perusahaan extends Controller
{
    protected $mperusahaan, $pager, $session;
    protected $table = "aset1";

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->mperusahaan = new Perusahaan_model();
        $this->pager = \Config\Services::pager();

        $this->mperusahaan->setTable($this->table);
    }

    public function index()
    {
        $getdata = $this->mperusahaan->getdata();
        $data = array(
            'dataPerusahaan' => $getdata,
            'perusahaanPager' => $this->mperusahaan->paginate(25),
            'pager' => $this->mperusahaan->pager,
        );
        if ($this->session->has('sesusername') == "") {
            return redirect()->to("Login");
        } else {
            return view('admin/perusahaan', $data);
        }
    }

    public function simpan()
    {
        $nama_perusahaan = $this->request->getPost("nama_perusahaan");
        $alamat_perusahaan = $this->request->getPost("alamat_perusahaan");

        $data = [
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_perusahaan' => $alamat_perusahaan,
        ];
        try {
            $simpan = $this->mperusahaan->simpanData($this->table, $data);
            if ($simpan) {
                echo "<script>alert('Data Berhasil Disimpan'); window.location='" . base_url('/Perusahaan') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Disimpan'); window.location='" . base_url('/Perusahaan') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Disimpan'); window.location'" . base_url('/Perusahaan') . "'; </script>";
        }
    }

    public function edit()
    {
        $id = $this->request->getPost("id");
        $nama_perusahaan = $this->request->getPost("nama_perusahaan");
        $alamat_perusahaan = $this->request->getPost("alamat_perusahaan");

        $data = [
            'nama_perusahaan' => $nama_perusahaan,
            'alamat_perusahaan' => $alamat_perusahaan,
        ];

        $where = ['id' => $id];
        try {
            $edit = $this->mperusahaan->editData($this->table, $data, $where);
            if ($edit) {
                echo "<script>alert('Data Berhasil Diubah'); window.location='" . base_url('/Perusahaan') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Diubah'); window.location='" . base_url('/Perusahaan') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Diubah'); window.location'" . base_url('/Perusahaan') . "'; </script>";
        }
    }

    public function hapus($id)
    {
        $where = ['id' => $id];
        try {
            $hapus = $this->mperusahaan->hapusData($this->table, $where);
            if ($hapus) {
                echo "<script>alert('Data Berhasil Dihapus'); window.location='" . base_url('/Perusahaan') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Dihapus'); window.location='" . base_url('/Perusahaan') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Dihapus'); window.location'" . base_url('/Perusahaan') . "'; </script>";
        }
    }
}
