<?= view('layout/header') ?>
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
                <div class="box">
                    <div class="box-header with-border">
                        <a href="<?= base_url('Transaksitambah'); ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="datatransaksi" style="width: 100%;">
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
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>Total Bayar</th>
                                    <th>ACT Nama Pengurus</th>
                                    <th>ACT Nama Perusahaan</th>
                                    <th>ACT Nama Barang</th>
                                    <th>ACT Jumlah</th>
                                    <th>ACT Quantity</th>
                                    <th>ACT Harga</th>
                                    <th>ACT Total Bayar</th>
                                    <th>Keterangan</th>
                                    <th>ID</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

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

<?= view('layout/footertransaksi') ?>