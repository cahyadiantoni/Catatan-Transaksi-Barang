<?= view('layout/header') ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Filter Data Transaksi
      <small>Membuat Laporan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Laporan </a></li>
      <li class="active">Data Transaksi</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <form role="form" id="formTransaksi" name="formTransaksi" enctype="multipart/form-data" action="" method="POST">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Filter Data </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <div class="col-md-4">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Perusahaan </h3>
                </div>
                <table class="table table-bordered" id="example" style="width: 100%;">
                  <thead>
                    <tr>
                      <th style="width: 10px">
                        <input type="checkbox" name="allperusahaan" onClick="toggle(this)">
                      </th>
                      <th>Nama Perusahaan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($dataperusahaan as $row) : ?>
                      <tr>
                        <td>
                          <input type="checkbox" name="perusahaan[]" onClick="backtoggle(this)" value="<?= $row->nama_perusahaan; ?>">
                        </td>
                        <td><?= $row->nama_perusahaan; ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <div class="box-header with-border">
                  <h3 class="box-title"> Data Barang </h3>
                </div>
                <table class="table table-bordered" id="example2" style="width: 100%;">
                  <thead>
                    <tr>
                      <th style="width: 10px">
                        <input type="checkbox" name="allbarang" onClick="toggle2(this)">
                      </th>
                      <th>Nama Barang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($databarang as $row) : ?>
                      <tr>
                        <td>
                          <input type="checkbox" name="barang[]" onClick="backtoggle2(this)" value="<?= $row->nama_barang; ?>">
                        </td>
                        <td><?= $row->nama_barang; ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="col-md-4">
                <!-- <div class="form-group">
                  <label>Dari Harga</label>
                  <input type="number" class="form-control" name="dariharga" id="dariharga">
                </div>
                <div class="form-group">
                  <label>Hingga Harga</label>
                  <input type="number" class="form-control" name="hinggaharga" id="hinggaharga">
                </div> -->
                <div class="form-group">
                  <label>Dari Tanggal</label>
                  <input type="date" class="form-control" name="daritanggal" id="daritanggal">
                </div>
                <div class="form-group">
                  <label>Hingga Tanggal</label>
                  <input type="date" class="form-control" name="hinggatanggal" id="hinggatanggal">
                </div>
                <div class="box-footer">
                  <!-- <button type="submit" class="btn btn-primary" style="width: 100%;">Dapatkan Data</button> -->
                  <!-- <input type="submit" class="btn btn-primary" style="width: 100%;" name="lihat_data" placeholder="Lihat Data">
                  <br> <br>
                  <input type="submit" class="btn btn-success" style="width: 100%;" name="print_data" placeholder="Print Data"> -->
                  <a href="" onclick="document.formTransaksi.action = '<?= base_url('Laporan/lihatLaporan'); ?>'; document.formTransaksi.submit(); return false;" class="btn btn-primary" style="width: 100%;">Lihat Data</a>
                  <br><br>
                  <a href="" onclick="document.formTransaksi.action = '<?= base_url('Laporan/exportPdf'); ?>'; document.formTransaksi.submit(); return false;" class="btn btn-success" style="width: 100%;">Print Data</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->
      </form>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<?= view('layout/footerlaporan') ?>