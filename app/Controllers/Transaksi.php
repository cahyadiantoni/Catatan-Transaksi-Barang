<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;
use App\Models\Transaksi_model;
use App\Models\Transaksidata_model;
use App\Models\Supir_model;
use App\Models\Perusahaan_model;
use App\Models\Qty_model;
use App\Models\Barang_model;

class Transaksi extends Controller
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

        $this->mtransaksi->setTable($this->table);
    }

    public function index()
    {
        $getdata = $this->mtransaksi->getdata();
        $getdatasupir = $this->msupir->getdata();
        $getdataperusahaan = $this->mperusahaan->getdata();
        $getdatabarang = $this->mbarang->getdata();
        $getdataqty = $this->mqty->getdata();
        $data = array(
            'datatransaksi' => $getdata,
            'datasupir' => $getdatasupir,
            'dataperusahaan' => $getdataperusahaan,
            'databarang' => $getdatabarang,
            'dataqty' => $getdataqty,
        );
        if ($this->session->has('sesusername') == "") {
            return redirect()->to("Login");
        } else {
            return view('admin/transaksi', $data);
        }
    }

    public function hapus($id)
    {
        $where = ['catid' => $id];
        try {
            $hapus = $this->mtransaksi->hapusData($this->table, $where);
            if ($hapus) {
                echo "<script>alert('Data Berhasil Dihapus'); window.location='" . base_url('/Transaksi') . "'; </script>";
            } else {
                echo "<script>alert('Data Gagal Dihapus'); window.location='" . base_url('/Transaksi') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Gagal Dihapus'); window.location'" . base_url('/Transaksi') . "'; </script>";
        }
    }

    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Transaksidata_model($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tomboledit = "<a href=" . base_url('Transaksiedit/index') . "/" . $list->catid . " class=\"btn btn-sm btn-info\"><i class=\"fa fa-pencil\"></i></a>";
                $tombolhapus = "<a href=" . base_url('Transaksi/hapus') . "/" . $list->catid . " class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Yakin menghapus data?')\"><i class=\"fa fa-trash\"></i></a>";

                $row[] = $no;
                $row[] = $list->tanggal;
                $row[] = $list->nosj;
                $row[] = $list->nopk;
                $row[] = $list->nama_pengurus;
                $row[] = $list->nama_supir;
                $row[] = $list->nama_perusahaan;
                $row[] = $list->nama_barang;
                $row[] = $list->jumlah;
                $row[] = $list->qty;
                $row[] = "Rp. " . number_format($list->harga, 0, ',', '.');
                $row[] = "Rp. " . number_format($list->total_bayar, 0, ',', '.');
                $row[] = $list->nama_pengurus2;
                $row[] = $list->nama_perusahaan2;
                $row[] = $list->nama_barang2;
                $row[] = $list->jumlah2;
                $row[] = $list->qty2;
                $row[] = "Rp. " . number_format($list->harga2, 0, ',', '.');
                $row[] = "Rp. " . number_format($list->total_bayar2, 0, ',', '.');
                $row[] = $list->keterangan;
                $row[] = $list->catid;
                $row[] = $tomboledit . " " . $tombolhapus;
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }
}
