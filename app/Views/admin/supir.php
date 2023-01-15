<?= view('layout/header') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Supir
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
            <li class="active">Data Supir</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                            + Tambah Data
                        </button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="example" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama supir</th>
                                    <th>Plat Kendaraan</th>
                                    <th style="width: 100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($datasupir as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row->supir; ?></td>
                                        <td><?= $row->plat_ken; ?></td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#edit<?= $row->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                                            <a href="<?= base_url('Supir/hapus') ?>/<?= $row->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data?')"><i class="fa fa-trash"></i></a>
                                        </td>
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
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                </div>
                <form action="<?= base_url('Supir/simpan') ?>" method="POST" class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="supir" class="col-sm-4 control-label">Nama supir</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="supir" name="supir" placeholder="Masukan Nama supir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="plat_ken" class="col-sm-4 control-label">Plat Kendaraan</label>

                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="plat_ken" name="plat_ken" placeholder="Masukan Plat Kendaraan">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Modal edit -->
    <?php foreach ($datasupir as $row) : ?>
        <div class="modal fade" id="edit<?= $row->id; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <form action="<?= base_url('Supir/edit') ?>" method="POST" class="form-horizontal">
                        <div class="modal-body">
                            <input type="hidden" value="<?= $row->id ?>" name="id">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama supir</label>

                                <div class="col-sm-8">
                                    <input value="<?= $row->supir; ?>" type="text" class="form-control" name="supir" placeholder="Masukan Nama supir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Plat Kendaraan</label>

                                <div class="col-sm-8">
                                    <input value="<?= $row->plat_ken; ?>" type="text" class="form-control" name="plat_ken" placeholder="Masukan Plat Kendaraan">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php endforeach; ?>
</div>
<!-- /.content-wrapper -->

<?= view('layout/footer') ?>