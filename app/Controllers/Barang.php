<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Barang_model;

class Barang extends Controller
{
    protected $mbarang, $pager, $session;
    protected $table = "aset2";

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->mbarang = new Barang_model();
        $this->pager = \Config\Services::pager();

        $this->mbarang->setTable($this->table);
    }

    public function index()
    {
        $getdata = $this->mbarang->getdata();
        $data = array(
            'databarang' => $getdata,
            'barangPager' => $this->mbarang->paginate(25),
            'pager' => $this->mbarang->pager,
        );
        if ($this->session->has('sesusername') == "") {
            return redirect()->to("Login");
        } else {
            return view('admin/barang', $data);
        }
    }

    public function simpan()
    {
        $nama_barang = $this->request->getPost("nama_barang");
        $keterangan_barang = $this->request->getPost("keterangan_barang");

        $data = [
            'nama_barang' => $nama_barang,
            'keterangan_barang' => $keterangan_barang,
        ];
        try {
            $simpan = $this->mbarang->simpanData($this->table, $data);
            if ($simpan) {
                echo "<script>alert('Data Berhasil Disimpan'); window.location='" . base_url('/Barang') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Disimpan'); window.location='" . base_url('/Barang') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Disimpan'); window.location'" . base_url('/Barang') . "'; </script>";
        }
    }

    public function edit()
    {
        $id = $this->request->getPost("id");
        $nama_barang = $this->request->getPost("nama_barang");
        $keterangan_barang = $this->request->getPost("keterangan_barang");

        $data = [
            'nama_barang' => $nama_barang,
            'keterangan_barang' => $keterangan_barang,
        ];

        $where = ['id' => $id];
        try {
            $edit = $this->mbarang->editData($this->table, $data, $where);
            if ($edit) {
                echo "<script>alert('Data Berhasil Diubah'); window.location='" . base_url('/Barang') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Diubah'); window.location='" . base_url('/Barang') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Diubah'); window.location'" . base_url('/Barang') . "'; </script>";
        }
    }

    public function hapus($id)
    {
        $where = ['id' => $id];
        try {
            $hapus = $this->mbarang->hapusData($this->table, $where);
            if ($hapus) {
                echo "<script>alert('Data Berhasil Dihapus'); window.location='" . base_url('/Barang') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Dihapus'); window.location='" . base_url('/Barang') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Dihapus'); window.location'" . base_url('/Barang') . "'; </script>";
        }
    }
}
