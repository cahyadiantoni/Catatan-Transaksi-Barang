<!-- jQuery 3 -->
<script src="<?= base_url('adminlte/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('adminlte/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Morris.js charts -->
<script src="<?= base_url('adminlte/bower_components/raphael/raphael.min.js') ?>"></script>
<script src="<?= base_url('adminlte/bower_components/morris.js/morris.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?= base_url('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?= base_url('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('adminlte/bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?= base_url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?= base_url('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?= base_url('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('adminlte/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('adminlte/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('adminlte/dist/js/demo.js') ?>"></script>

<!-- Datatable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/scroller/2.0.7/js/dataTables.scroller.min.js"></script>
<script>
    $('#nama_perusahaan').on('change', function(){
    const namaPerusahaan = $('#nama_perusahaan').val();
    document.formTransaksi.nama_perusahaan2.value = namaPerusahaan;
  });
    $('#nama_barang').on('change', function(){
    const namaPerusahaan = $('#nama_barang').val();
    document.formTransaksi.nama_barang2.value = namaPerusahaan;
  });
    $('#nama_pengurus').on('change', function(){
    const namaPerusahaan = $('#nama_pengurus').val();
    document.formTransaksi.nama_pengurus2.value = namaPerusahaan;
  });
</script>
<script>
  harga = document.formTransaksi.harga.value;
  jumlah = document.formTransaksi.jumlah.value;
  harga2 = document.formTransaksi.harga2.value;
  jumlah2 = document.formTransaksi.jumlah2.value;

  function OnChange(value) {
    harga = document.formTransaksi.harga.value;
    jumlah = document.formTransaksi.jumlah.value;
    total_bayar = harga * jumlah;
    document.formTransaksi.total_bayar.value = total_bayar;
    harga2 = document.formTransaksi.harga2.value;
    jumlah2 = document.formTransaksi.jumlah2.value;
    total_bayar2 = harga2 * jumlah2;
    document.formTransaksi.total_bayar2.value = total_bayar2;
  }
</script>
<script>
  function listdatatransaksi() {
    var table = $('#datatransaksi').DataTable({
      "processing": true,
      "serverSide": true,
      "scrollY": 400,
      "scrollX": true,
      "order": [],
      "ajax": {
        "url": '<?= base_url("Transaksi/listdata") ?>',
        "type": "POST"
      },
      "columnDefs": [{
        "targets": 0,
        "orderable": false,
      }],
    });
  }
  $(document).ready(function() {
    listdatatransaksi();
  });
</script>