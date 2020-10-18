<?
  $pagename = "Dasbor";
  include "header.php";
  include "menubar.php";
?>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <? include "list-antri.php"; ?>
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom tabs (Charts with tabs)-->


            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Riwayat Pemeriksaan</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="riwayat_pasien" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Dokter</th>
                    <th>Keluhan</th>
                    <th>Catatan</th>
                    <th>Resep Obat</th>
                  </tr>
                  </thead>
                  <tbody><tr><td colspan="5" class="text-center">Memuat data...</td></tr></tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->




<? include "footer.php"; ?>


<script>

  $(function () {


    // $("#example1").DataTable({
    //   "responsive": true,
    //   "autoWidth": false,
    // });

  // DATATABLE AJAX
   var riwayat_pasien = $('#riwayat_pasien').on( 'processing.dt', function ( e, settings, processing ) {
        // $('#processingIndicator').css( 'display', processing ? loader('show') : loader('hide') );
    } ).DataTable({
        ajax: {
            url: admin_url+'submit',
            type: 'POST',
            data: {"get_datatable_pasien":"", "id_pasien":'<?= pasien(userid(), 'id_pasien') ?>'}
        },
        // "columnDefs": [
        //     { className: "table-config", "targets": [5] }
        // ],
        "language": {
            "emptyTable": "Maaf, tidak ada data yang ditampilkan :'(",
            "zeroRecords": "Maaf, tidak menemukan data yang cocok :'("
        },
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "order": [[0, "desc"]],
        "info": true,
        "autoWidth": false,
        "responsive": true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                className: 'btn btn-primary ionicons ion-document',
                title: 'Riwayat Pemeriksaan Pasien - <?= nama_lengkap(userid()) ?>',
                messageTop: '<?= nama_lengkap(userid()) ?>'
            },
            {
                extend: 'print',
                className: 'btn btn-primary ionicons ion-printer',
                title: 'Riwayat Pemeriksaan Pasien',
                messageTop: '<?= nama_lengkap(userid()) ?>'
            }
        ]
    });




    // $('#riwayat_pasien').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": true,
    //   "ordering": true,
    //   "order": [[0, "desc"]],
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>


</body>
</html>
