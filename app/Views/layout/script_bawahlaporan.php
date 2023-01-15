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
<script language="JavaScript">
  function toggle(source) {
    checkboxes = document.getElementsByName('perusahaan[]');
    for (var i in checkboxes) checkboxes[i].checked = source.checked
  }

  function backtoggle(source) {
    checkboxes = document.getElementsByName('allperusahaan');
    for (var i in checkboxes) {
      if (checkboxes[i].checked == true) checkboxes[i].checked = source.checked
    }
  }

  function toggle2(source) {
    checkboxes = document.getElementsByName('barang[]');
    for (var i in checkboxes) checkboxes[i].checked = source.checked
  }

  function backtoggle2(source) {
    checkboxes = document.getElementsByName('allbarang');
    for (var i in checkboxes) {
      if (checkboxes[i].checked == true) checkboxes[i].checked = source.checked
    }
  }
</script>
<script>
  $(document).ready(function() {
    $('#example').DataTable({
      "scrollY": 400,
      "scrollX": true,
      "paging": false,
      "ordering": false,
      "info": false
    });
    $('#example2').DataTable({
      "scrollY": 400,
      "scrollX": true,
      "paging": false,
      "ordering": false,
      "info": false
    });
    $('#example3').DataTable({
      "scrollY": 400,
      "scrollX": true,
      "paging": false,
      "ordering": false,
      "info": false
    });
    $('#example4').DataTable({
      "scrollY": 400,
      "scrollX": true,
      "paging": false,
      "ordering": false,
      "info": false
    });
    $('#lihat1').DataTable({
      "scrollY": 200,
      "scrollX": true,
      "paging": false,
      "ordering": false,
      "info": false
    });
    $('#lihat2').DataTable({
      "scrollY": 50,
      "paging": false,
      "ordering": false,
      "info": false,
      "searching": false
    });
  });
</script>