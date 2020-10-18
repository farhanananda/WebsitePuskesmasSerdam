  </div>
  <!-- /.content-wrapper -->




  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="<?= $home ?>">Puskesmas Sungai Raya Dalam</a>.</strong>
    All rights reserved.
<!--     <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.1.0
    </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="<?= $admin ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= $admin ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= $admin ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- DataTables -->
<script src="<?= $admin ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $admin ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $admin ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $admin ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= $admin ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $admin ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $admin ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= $admin ?>plugins/datatables-export/dataTables.jszip.min.js"></script>

<!-- InputMask -->
<script src="<?= $admin ?>plugins/moment/moment.min.js"></script>
<script src="<?= $admin ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- ChartJS -->
<script src="<?= $admin ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= $admin ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= $admin ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= $admin ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= $admin ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= $admin ?>plugins/moment/moment.min.js"></script>
<script src="<?= $admin ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= $admin ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= $admin ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= $admin ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $admin ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- script src="<?= $admin ?>dist/js/pages/dashboard.js"></script -->
<!-- AdminLTE for demo purposes -->
<script src="<?= $admin ?>dist/js/demo.js"></script>

<script type="text/javascript">
var admin_url = '<?= $admin ?>';
$(function () {
  window.setTimeout("waktu()", 1000);
  allpoli()
})

  function waktu(){
    let current = moment();
    let currenttime = current.format("DD MMMM YYYY HH:mm:ss");
    setTimeout( "waktu()", 1000 )
    $('.sekarang').html(currenttime);
  }


  function allpoli(){
    poli_umum()
    poli_anak()
    poli_gizi()
    poli_gigi()
  }


  function poli_umum(id_poli=6){
    $('#poli-umum').html('Load..')
    $.post(admin_url+"ajax",
    {
      get_poli: "",
      id_poli: id_poli
    },
    function(data, status){
      $('#poli-umum').html(data)
      //   alert("Error: " + data + "\nStatus: " + status);
    });
  }

  function poli_anak(id_poli=5){
    $('#poli-anak').html('Load..')
    $.post(admin_url+"ajax",
    {
      get_poli: "",
      id_poli: id_poli
    },
    function(data, status){
      $('#poli-anak').html(data)
      //   alert("Error: " + data + "\nStatus: " + status);
    });
  }

  function poli_gizi(id_poli=4){
    $('#poli-gizi').html('Load..')
    $.post(admin_url+"ajax",
    {
      get_poli: "",
      id_poli: id_poli
    },
    function(data, status){
      $('#poli-gizi').html(data)
      //   alert("Error: " + data + "\nStatus: " + status);
    });
  }

  function poli_gigi(id_poli=3){
    $('#poli-gigi').html('Load..')
    $.post(admin_url+"ajax",
    {
      get_poli: "",
      id_poli: id_poli
    },
    function(data, status){
      $('#poli-gigi').html(data)
      //   alert("Error: " + data + "\nStatus: " + status);
    });
  }

</script>