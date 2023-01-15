<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Supir_model;

class Supir extends Controller
{
    protected $msupir, $pager, $session;
    protected $table = "aset5";

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->msupir = new Supir_model();
        $this->pager = \Config\Services::pager();

        $this->msupir->setTable($this->table);
    }

    public function index()
    {
        $getdata = $this->msupir->getdata();
        $data = array(
            'datasupir' => $getdata,
            'supirPager' => $this->msupir->paginate(25),
            'pager' => $this->msupir->pager,
        );
        if ($this->session->has('sesusername') == "") {
            return redirect()->to("Login");
        } else {
            return view('admin/supir', $data);
        }
    }

    public function simpan()
    {
        $supir = $this->request->getPost("supir");
        $plat_ken = $this->request->getPost("plat_ken");

        $data = [
            'supir' => $supir,
            'plat_ken' => $plat_ken,
        ];
        try {
            $simpan = $this->msupir->simpanData($this->table, $data);
            if ($simpan) {
                echo "<script>alert('Data Berhasil Disimpan'); window.location='" . base_url('/Supir') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Disimpan'); window.location='" . base_url('/Supir') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Disimpan'); window.location'" . base_url('/Supir') . "'; </script>";
        }
    }

    public function edit()
    {
        $id = $this->request->getPost("id");
        $supir = $this->request->getPost("supir");
        $plat_ken = $this->request->getPost("plat_ken");

        $data = [
            'supir' => $supir,
            'plat_ken' => $plat_ken,
        ];

        $where = ['id' => $id];
        try {
            $edit = $this->msupir->editData($this->table, $data, $where);
            if ($edit) {
                echo "<script>alert('Data Berhasil Diubah'); window.location='" . base_url('/Supir') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Diubah'); window.location='" . base_url('/Supir') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Diubah'); window.location'" . base_url('/Supir') . "'; </script>";
        }
    }

    public function hapus($id)
    {
        $where = ['id' => $id];
        try {
            $hapus = $this->msupir->hapusData($this->table, $where);
            if ($hapus) {
                echo "<script>alert('Data Berhasil Dihapus'); window.location='" . base_url('/Supir') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Dihapus'); window.location='" . base_url('/Supir') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Dihapus'); window.location'" . base_url('/Supir') . "'; </script>";
        }
    }
}
