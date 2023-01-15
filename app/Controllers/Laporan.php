<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Transaksi_model;
use App\Models\Supir_model;
use App\Models\Perusahaan_model;
use App\Models\Qty_model;
use App\Models\Barang_model;
use App\Models\Laporan_model;
use Dompdf\Dompdf;

class Laporan extends Controller
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
        $this->mlaporan = new Laporan_model();

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
            return view('admin/laporanfilter', $data);
        }
    }

    public function lihatLaporan()
    {
        $allperusahaan = $this->request->getPost("allperusahaan");
        $perusahaan = $this->request->getPost("perusahaan");
        $allbarang = $this->request->getPost("allbarang");
        $barang = $this->request->getPost("barang");
        // $dariharga = $this->request->getPost("dariharga");
        // $hinggaharga = $this->request->getPost("hinggaharga");
        $daritanggalbantu = $this->request->getPost("daritanggal");
        $hinggatanggalbantu = $this->request->getPost("hinggatanggal");
        $daritanggal = $this->request->getPost("daritanggal");
        if ($daritanggal != null) {
            $daritanggal = strtotime($daritanggal);
            $daritanggal = date('Y-m-d', $daritanggal);
        } else {
            $daritanggal = null;
        }
        $hinggatanggal = $this->request->getPost("hinggatanggal");
        if ($hinggatanggal != null) {
            $hinggatanggal = strtotime($hinggatanggal);
            $hinggatanggal = date('Y-m-d', $hinggatanggal);
        } else {
            $hinggatanggal = null;
        }
        $getDataLaporan = $this->mlaporan->hasilFilter($allperusahaan, $perusahaan, $allbarang, $barang, $daritanggal, $hinggatanggal);
        $getdataperusahaan = $this->mperusahaan->getdata();
        $getdatabarang = $this->mbarang->getdata();
        $data = array(
            'allperusahaan' => $allperusahaan,
            'perusahaan' => $perusahaan,
            'allbarang' => $allbarang,
            'barang' => $barang,
            'daritanggal' => $daritanggalbantu,
            'hinggatanggal' => $hinggatanggalbantu,
            'dataperusahaan' => $getdataperusahaan,
            'databarang' => $getdatabarang,
            'datalaporan' => $getDataLaporan,
        );
        // var_dump($getDataLaporan);
        // die;
        return view('admin/laporanlihat', $data);
    }

    function exportPdf()
    {
        $allperusahaan = $this->request->getPost("allperusahaan");
        $perusahaan = $this->request->getPost("perusahaan");
        $allbarang = $this->request->getPost("allbarang");
        $barang = $this->request->getPost("barang");
        // $dariharga = $this->request->getPost("dariharga");
        // $hinggaharga = $this->request->getPost("hinggaharga");
        $daritanggalbantu = $this->request->getPost("daritanggal");
        $hinggatanggalbantu = $this->request->getPost("hinggatanggal");
        $daritanggal = $this->request->getPost("daritanggal");
        if ($daritanggal != null) {
            $daritanggal = strtotime($daritanggal);
            $daritanggal = date('Y-m-d', $daritanggal);
        } else {
            $daritanggal = null;
        }
        $hinggatanggal = $this->request->getPost("hinggatanggal");
        if ($hinggatanggal != null) {
            $hinggatanggal = strtotime($hinggatanggal);
            $hinggatanggal = date('Y-m-d', $hinggatanggal);
        } else {
            $hinggatanggal = null;
        }
        $getDataLaporan = $this->mlaporan->hasilFilter($allperusahaan, $perusahaan, $allbarang, $barang, $daritanggal, $hinggatanggal);
        $data = array(
            'allperusahaan' => $allperusahaan,
            'perusahaan' => $perusahaan,
            'allbarang' => $allbarang,
            'barang' => $barang,
            // 'dariharga' => $dariharga,
            // 'hinggaharga' => $hinggaharga,
            'daritanggal' => $daritanggalbantu,
            'hinggatanggal' => $hinggatanggalbantu,
            'datalaporan' => $getDataLaporan,
        );
        $dompdf = new Dompdf();
        $html = view('admin/export', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }
}
