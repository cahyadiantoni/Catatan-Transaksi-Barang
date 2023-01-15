<?= view('layout/header') ?>
<?php function format_indo($date)
{
    date_default_timezone_set('Asia/Jakarta');
    // array hari dan bulan
    // $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $waktu = substr($date, 11, 5);
    $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

    return $result;
} ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Transaksi
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Transaksi</a></li>
            <li class="active">Data Transaksi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Lihat Data </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="lihat1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Tanggal</th>
                                    <th>No. Surat Jalan</th>
                                    <th>No. Pol Kendaraan</th>
                                    <th>Nama Pengurus</th>
                                    <th>Nama Supir</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>ACT Nama Pengurus</th>
                                    <th>ACT Nama Perusahaan</th>
                                    <th>ACT Nama Barang</th>
                                    <th>ACT Jumlah</th>
                                    <th>ACT Satuan</th>
                                    <th>ACT Harga</th>
                                    <th>ACT Total</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $total = 0.0;
                                $total2 = 0.0;
                                $totalQty = 0.0;
                                $totalQty2 = 0.0;
                                $satuan = "KG";
                                foreach ($datalaporan as $row) : 
                                    $total += floatval($row->total_bayar);
                                    $total2 += floatval($row->total_bayar2);
                                    $totalQty += floatval($row->jumlah);
                                    $totalQty2 += floatval($row->jumlah2);
                                    if ($row->qty != null) {
                                      $satuan = $row->qty;
                                    }
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= format_indo($row->tanggal) ?></td>
                                        <td><?= $row->nosj ?></td>
                                        <td><?= $row->nopk ?></td>
                                        <td><?= $row->nama_pengurus ?></td>
                                        <td><?= $row->nama_supir ?></td>
                                        <td><?= $row->nama_perusahaan ?></td>
                                        <td><?= $row->nama_barang ?></td>
                                        <td><?= $row->jumlah ?></td>
                                        <td><?= $row->qty ?></td>
                                        <td><?= "Rp. " . number_format($row->harga, 0, ',', '.'); ?></td>
                                        <td><?= "Rp. " . number_format($row->total_bayar, 0, ',', '.'); ?></td>
                                        <td><?= $row->nama_pengurus2 ?></td>
                                        <td><?= $row->nama_perusahaan2 ?></td>
                                        <td><?= $row->nama_barang2 ?></td>
                                        <td><?= $row->jumlah2 ?></td>
                                        <td><?= $row->qty2 ?></td>
                                        <td><?= "Rp. " . number_format($row->harga2, 0, ',', '.'); ?></td>
                                        <td><?= "Rp. " . number_format($row->total_bayar2, 0, ',', '.'); ?></td>
                                        <td><?= $row->keterangan ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Tonnase </h3> <br>
                        <h7>Periode : <?= format_indo($daritanggal) ?> Sampai <?= format_indo($hinggatanggal) ?></h7>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="lihat2" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Total QTY</th>
                                    <th>Total Harga</th>
                                    <th>ACT Total QTY</th>
                                    <th>ACT Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td><?= $totalQty . " " . $satuan ?></td>
                                        <td><?= "Rp. " . number_format($total, 0, ',', '.'); ?></td>
                                        <td><?= $totalQty2 . " " . $satuan ?></td>
                                        <td><?= "Rp. " . number_format($total2, 0, ',', '.'); ?></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= view('layout/footerlaporan') ?>