  <!-- Pembatas -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <?= date('D, d M Y H:i:s')?>
    </div>
    <!-- Default to the left -->
    <strong>MProject - Production &copy; 2019-2020.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url() ?>/node_modules/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Only for Dashboard -->
<?php if (isset($halaman) && $halaman == 'Dashboard'): ?>
  <script src="<?= base_url() ?>/node_modules/chart.js/dist/Chart.min.js"></script>
<?php endif;?>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/dist/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>/js/index.js" type="module"></script>

<!-- Datatable -->
<script src="<?= base_url() ?>/plugins_ekstra/datatables/datatables.min.js"></script>



<!-- Select2-->
<script src="<?= base_url() ?>/node_modules/select2/dist/js/select2.full.min.js"></script>

<!-- Toastr -->
<script src="<?= base_url() ?>/node_modules/toastr/build/toastr.min.js"></script>
<script src="<?= base_url() ?>/node_modules/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>/node_modules/daterangepicker/daterangepicker.js"></script>

<script>
 $('.select2').select2({
  theme: 'bootstrap',
 })
 
//Date range picker
$('#periode').daterangepicker({
  showDropdowns: true,
  drops: 'up'
})
$(".tanggal").daterangepicker({
  // format: 'dd',
  singleDatePicker: true,
  showDropdowns: true,
  minYear: parseInt(moment().subtract(10, 'year').format('YYYY')),
  maxDate: moment().startOf('day'),

  locale : {
    direction: 'ltr',
    format: moment.localeData().longDateFormat('Ll'),
    separator: ' - ',
  }
});

</script>  

</body>
</html>
