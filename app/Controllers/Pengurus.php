<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengurus_model;

class Pengurus extends Controller
{
    protected $mpengurus, $pager, $session;
    protected $table = "mpengurus";

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->mpengurus = new Pengurus_model();
        $this->pager = \Config\Services::pager();

        $this->mpengurus->setTable($this->table);
    }

    public function index()
    {
        $getdata = $this->mpengurus->getdata();
        $data = array(
            'datapengurus' => $getdata,
            'pengurusPager' => $this->mpengurus->paginate(25),
            'pager' => $this->mpengurus->pager,
        );
        if ($this->session->has('sesusername') == "") {
            return redirect()->to("Login");
        } else {
            return view('admin/pengurus', $data);
        }
    }

    public function simpan()
    {
        $pengurus = $this->request->getPost("pengurus");
        $keterangan = $this->request->getPost("keterangan");

        $data = [
            'pengurus' => $pengurus,
            'keterangan' => $keterangan,
        ];
        try {
            $simpan = $this->mpengurus->simpanData($this->table, $data);
            if ($simpan) {
                echo "<script>alert('Data Berhasil Disimpan'); window.location='" . base_url('/Pengurus') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Disimpan'); window.location='" . base_url('/Pengurus') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Disimpan'); window.location'" . base_url('/Pengurus') . "'; </script>";
        }
    }

    public function edit()
    {
        $id = $this->request->getPost("id");
        $pengurus = $this->request->getPost("pengurus");
        $keterangan = $this->request->getPost("keterangan");

        $data = [
            'pengurus' => $pengurus,
            'keterangan' => $keterangan,
        ];

        $where = ['id' => $id];
        try {
            $edit = $this->mpengurus->editData($this->table, $data, $where);
            if ($edit) {
                echo "<script>alert('Data Berhasil Diubah'); window.location='" . base_url('/Pengurus') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Diubah'); window.location='" . base_url('/Pengurus') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Diubah'); window.location'" . base_url('/Pengurus') . "'; </script>";
        }
    }

    public function hapus($id)
    {
        $where = ['id' => $id];
        try {
            $hapus = $this->mpengurus->hapusData($this->table, $where);
            if ($hapus) {
                echo "<script>alert('Data Berhasil Dihapus'); window.location='" . base_url('/Pengurus') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Dihapus'); window.location='" . base_url('/Pengurus') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Dihapus'); window.location'" . base_url('/Pengurus') . "'; </script>";
        }
    }
}
