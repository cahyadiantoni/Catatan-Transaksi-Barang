<?= view('layout/header') ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Data Transaksi
      <small>Add Data</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Transaksi </a></li>
      <li class="active">Data Transaksi</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    
    <div class="row">
      <!-- left column -->
      <form role="form" id="formTransaksi" name="formTransaksi" enctype="multipart/form-data" action=">" method="POST">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d'); ?>">
              </div>
              <div class="form-group">
                <label>Nomor Surat Jalan</label>
                <input type="text" class="form-control" name="nosj" value="<?= $nosj?>">
              </div>
              <div class="form-group">
                <label>Nomor Polisi Kendaraan</label>
                <input type="text" class="form-control" name="nopk" value="<?= $nopk?>">
              </div>
              <!-- select -->
              <div class="form-group">
                <label>Nama Supir</label>
                <input type="text" class="form-control" name="nama_supir" value="<?= $nama_supir?>">
              </div>
              <div class="form-group">
                <label>Nama Pengurus</label>
                <input type="text" class="form-control" name="nama_pengurus" value="<?= $nama_pengurus?>">
              </div>
              <div class="form-group">
                <label>Nama Perusahaan</label>
                <input type="text" class="form-control" name="nama_perusahaan" value="<?= $nama_perusahaan?>">
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <select name="nama_barang" id="nama_barang" class="form-control">
                  <option disabled selected>Nama Barang</option>
                  <?php foreach ($databarang as $barang) : ?>
                    <option value="<?= $barang->nama_barang; ?>"><?= $barang->nama_barang; ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label>Jumlah/Satuan</label><br>
                <div class="col-md-4">
                  <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukan jumlah..." onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
                </div>
                <div class="col-md-4">
                  <select name="qty" class="form-control">
                    <option disabled selected>Satuan</option>
                    <?php foreach ($dataqty as $qty) : ?>
                      <option value="<?= $qty->qty; ?>"><?= $qty->qty; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan harga..." onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
              </div>
              <div class="form-group">
                <label>Total Bayar</label>
                <input type="number" class="form-control" name="total_bayar" id="total_bayar" placeholder="Masukan total bayar..." readonly>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Actuali Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- text input -->
              <div class="form-group">
                <label>ACT Nama Pengurus</label>
                <input type="text" class="form-control" name="nama_pengurus2" id="nama_pengurus2" value="<?= $nama_pengurus?>">
              </div>
              <div class="form-group">
                <label>ACT Nama Perusahaan</label>
                <input type="text" class="form-control" name="nama_perusahaan2" id="nama_perusahaan2" value="<?= $nama_perusahaan?>">
              </div>
              <div class="form-group">
                <label>ACT Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang2" id="nama_barang2" >
              </div>
              <div class="form-group">
                <label>ACT Jumlah/Satuan</label><br>
                <div class="col-md-4">
                  <input type="number" class="form-control" name="jumlah2" id="jumlah2" placeholder="Masukan ACT jumlah..." onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
                </div>
                <div class="col-md-4">
                  <select name="qty2" class="form-control">
                    <option disabled selected>Satuan</option>
                    <?php foreach ($dataqty as $qty) : ?>
                      <option value="<?= $qty->qty; ?>"><?= $qty->qty; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <label>ACT Harga</label>
                <input type="number" class="form-control" name="harga2" id="harga2" placeholder="Masukan harga..." onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
              </div>
              <div class="form-group">
                <label>ACT Total Bayar</label>
                <input type="number" class="form-control" name="total_bayar2" id="total_bayar2" placeholder="Masukan total bayar..." readonly>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukan keterangan...">
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="box-footer">
            <a href="" onclick="document.formTransaksi.action = '<?= base_url('Transaksitambah/simpan'); ?>'; document.formTransaksi.submit(); return false;" class="btn btn-primary" style="width: 100%;">Submit</a>
            <br><br>
            <a href="" onclick="document.formTransaksi.action = '<?= base_url('Transaksiadditem'); ?>'; document.formTransaksi.submit(); return false;" class="btn btn-success" style="width: 100%;">Add Data</a>
          </div>
        </div>
        <!--/.col (right) -->
      </form>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<?= view('layout/footertransaksi') ?>