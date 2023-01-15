<?= view('layout/header') ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Data Transaksi
      <small>Edit Data</small>
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
      <?php foreach ($datatransaksi as $row) { ?>
        <form role="form" id="formTransaksi" name="formTransaksi" enctype="multipart/form-data" action="<?= base_url('Transaksiedit/edit'); ?>" method="POST">
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
                  <input type="date" class="form-control" name="tanggal" value="<?= $row->tanggal; ?>">
                </div>
                <input type="hidden" class="form-control" name="catid" value="<?= $row->catid; ?>">
                <div class="form-group">
                  <label>Nomor Surat Jalan</label>
                  <input type="text" class="form-control" name="nosj" value="<?= $row->nosj; ?>">
                </div>
                <div class="form-group">
                  <label>Nomor Polisi Kendaraan</label>
                  <input type="text" class="form-control" name="nopk" value="<?= $row->nopk; ?>">
                </div>
                <!-- select -->
                <div class="form-group">
                  <label>Nama Supir</label>
                  <select name="nama_supir" class="form-control">
                    <?php foreach ($datasupir as $supir) :
                      if ($row->nama_supir == $supir->supir) { ?>
                        <option value="<?= $supir->supir; ?>" selected><?= $supir->supir; ?></option>
                      <?php
                      } else { ?>
                        <option value="<?= $supir->supir; ?>"><?= $supir->supir; ?></option>
                    <?php
                      };
                    endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Pengurus</label>
                  <select name="nama_pengurus" id="nama_pengurus" class="form-control">
                    <?php foreach ($datapengurus as $pengurus) :
                      if ($row->nama_pengurus == $pengurus->pengurus) { ?>
                        <option value="<?= $pengurus->pengurus; ?>" selected><?= $pengurus->pengurus; ?></option>
                      <?php
                      } else { ?>
                        <option value="<?= $pengurus->pengurus; ?>"><?= $pengurus->pengurus; ?></option>
                    <?php
                      };
                    endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Perusahaan</label>
                  <select name="nama_perusahaan" id="nama_perusahaan" class="form-control">
                    <?php foreach ($dataperusahaan as $perusahaan) :
                      if ($row->nama_perusahaan == $perusahaan->nama_perusahaan) { ?>
                        <option value="<?= $perusahaan->nama_perusahaan; ?>" selected><?= $perusahaan->nama_perusahaan; ?></option>
                      <?php
                      } else { ?>
                        <option value="<?= $perusahaan->nama_perusahaan; ?>"><?= $perusahaan->nama_perusahaan; ?></option>
                    <?php
                      };
                    endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <select name="nama_barang" id="nama_barang" class="form-control">
                    <option disabled selected>Nama Barang</option>
                    <?php foreach ($databarang as $barang) :
                      if ($row->nama_barang == $barang->nama_barang) { ?>
                        <option value="<?= $barang->nama_barang; ?>" selected><?= $barang->nama_barang; ?></option>
                      <?php
                      } else { ?>
                        <option value="<?= $barang->nama_barang; ?>"><?= $barang->nama_barang; ?></option>
                    <?php
                      };
                    endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jumlah/Satuan</label><br>
                  <div class="col-md-4">
                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?= $row->jumlah; ?>" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
                  </div>
                  <div class="col-md-4">
                    <select name="qty" class="form-control">
                      <option disabled selected>Satuan</option>
                      <?php foreach ($dataqty as $qty) :
                        if ($row->qty == $qty->qty) { ?>
                          <option value="<?= $qty->qty; ?>" selected><?= $qty->qty; ?></option>
                        <?php
                        } else { ?>
                          <option value="<?= $qty->qty; ?>"><?= $qty->qty; ?></option>
                      <?php
                        };
                      endforeach ?>
                    </select>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" class="form-control" name="harga" id="harga" value="<?= $row->harga; ?>" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
                </div>
                <div class="form-group">
                  <label>Total Bayar</label>
                  <input type="number" class="form-control" name="total_bayar" id="total_bayar" value="<?= $row->total_bayar; ?>" readonly>
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
                <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                <label>Nama Pengurus</label>
                <input type="text" class="form-control" name="nama_pengurus2" value="<?= $row->nama_pengurus2; ?>" id="nama_pengurus2" >
              </div>
              <div class="form-group">
                <label>ACT Nama Perusahaan</label>
                <input type="text" class="form-control" name="nama_perusahaan2" value="<?= $row->nama_perusahaan2; ?>" id="nama_perusahaan2" >
              </div>
              <div class="form-group">
                <label>ACT Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang2" value="<?= $row->nama_barang2; ?>" id="nama_barang2" >
              </div>
                <div class="form-group">
                  <label>ACT Jumlah/Satuan</label><br>
                  <div class="col-md-4">
                    <input type="number" class="form-control" name="jumlah2" id="jumlah2" value="<?= $row->jumlah2; ?>" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
                  </div>
                  <div class="col-md-4">
                    <select name="qty2" class="form-control">
                      <option disabled selected>Satuan</option>
                      <?php foreach ($dataqty as $qty) :
                        if ($row->qty2 == $qty->qty) { ?>
                          <option value="<?= $qty->qty; ?>" selected><?= $qty->qty; ?></option>
                        <?php
                        } else { ?>
                          <option value="<?= $qty->qty; ?>"><?= $qty->qty; ?></option>
                      <?php
                        };
                      endforeach ?>
                    </select>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label>ACT Harga</label>
                  <input type="number" class="form-control" name="harga2" id="harga2" value="<?= $row->harga2; ?>" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)">
                </div>
                <div class="form-group">
                  <label>ACT Total Bayar</label>
                  <input type="number" class="form-control" name="total_bayar2" id="total_bayar2" value="<?= $row->total_bayar2; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= $row->keterangan; ?>">
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
            </div>
          </div>
          <!--/.col (right) -->
        </form>
      <?php }; ?>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<?= view('layout/footertransaksi') ?>