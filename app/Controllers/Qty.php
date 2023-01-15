<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Qty_model;

class Qty extends Controller
{
    protected $mqty, $pager, $session;
    protected $table = "aset3";

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->mqty = new Qty_model();
        $this->pager = \Config\Services::pager();

        $this->mqty->setTable($this->table);
    }

    public function index()
    {
        $getdata = $this->mqty->getdata();
        $data = array(
            'dataqty' => $getdata,
            'qtyPager' => $this->mqty->paginate(25),
            'pager' => $this->mqty->pager,
        );
        if ($this->session->has('sesusername') == "") {
            return redirect()->to("Login");
        } else {
            return view('admin/qty', $data);
        }
    }

    public function simpan()
    {
        $qty = $this->request->getPost("qty");
        $keterangan_qty = $this->request->getPost("keterangan_qty");

        $data = [
            'qty' => $qty,
            'keterangan_qty' => $keterangan_qty,
        ];
        try {
            $simpan = $this->mqty->simpanData($this->table, $data);
            if ($simpan) {
                echo "<script>alert('Data Berhasil Disimpan'); window.location='" . base_url('/Qty') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Disimpan'); window.location='" . base_url('/Qty') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Disimpan'); window.location'" . base_url('/Qty') . "'; </script>";
        }
    }

    public function edit()
    {
        $id = $this->request->getPost("id");
        $qty = $this->request->getPost("qty");
        $keterangan_qty = $this->request->getPost("keterangan_qty");

        $data = [
            'qty' => $qty,
            'keterangan_qty' => $keterangan_qty,
        ];

        $where = ['id' => $id];
        try {
            $edit = $this->mqty->editData($this->table, $data, $where);
            if ($edit) {
                echo "<script>alert('Data Berhasil Diubah'); window.location='" . base_url('/Qty') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Diubah'); window.location='" . base_url('/Qty') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Diubah'); window.location'" . base_url('/Qty') . "'; </script>";
        }
    }

    public function hapus($id)
    {
        $where = ['id' => $id];
        try {
            $hapus = $this->mqty->hapusData($this->table, $where);
            if ($hapus) {
                echo "<script>alert('Data Berhasil Dihapus'); window.location='" . base_url('/Qty') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Dihapus'); window.location='" . base_url('/Qty') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Dihapus'); window.location'" . base_url('/Qty') . "'; </script>";
        }
    }
}
