<?
  $pagename = "Poli";
  include "header.php";
  include "menubar.php";
?>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


<?
    if(isset($_GET['id'])){
        include_once "poli_edit.php";
    }else if(isset($_GET['idd'])){
        include_once "poli_detail.php";
    }else if(isset($_GET['tambah'])){
        include_once "poli_tambah.php";
    }
?>
  
  
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom tabs (Charts with tabs)-->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Tabel Poli</b></h3>
                <h3 class="card-title float-right"><a href="<?= $master ?>poli?tambah"><b>Tambah Poli</b></a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="getpoli" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>Nama Poli</th>
                    <th>Dokter</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody><tr><td colspan="4" class="text-center">Memuat data...</td></tr></tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          <!-- right col -->
        </div>
        </div>
        <!-- /.row (main row) -->
    <!-- /.content -->


      </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->




<? include "footer.php"; ?>


<script>
  $(function () {

  // DATATABLE AJAX
   var poli = $('#getpoli').on( 'processing.dt', function ( e, settings, processing ) {
        // $('#processingIndicator').css( 'display', processing ? loader('show') : loader('hide') );
    } ).DataTable({
        ajax: {
            url: admin_url+'submit',
            type: 'POST',
            data: {"get_datatable_poli":""}
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
        "info": true,
        "autoWidth": false,
        "responsive": true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                className: 'btn btn-primary ionicons ion-document',
                title: 'Daftar Poli',
                messageTop: ''
            },
            {
                extend: 'print',
                className: 'btn btn-primary ionicons ion-printer',
                title: 'Daftar Poli',
                messageTop: ''
            }
        ]


    });


<? if(isset($_GET['idd'])){
    $id_poli = stripslashes($_GET['idd']);
?>

    var riwayat_poli = $('#riwayat_poli').on( 'processing.dt', function ( e, settings, processing ) {
        // $('#processingIndicator').css( 'display', processing ? loader('show') : loader('hide') );
    } ).DataTable({
        ajax: {
            url: admin_url+'submit',
            type: 'POST',
            data: {"get_datatable_poli_detail":"", "id_poli":'<?= $id_poli ?>'}
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
                title: 'Riwayat Pemeriksaan Poli - <?= poli($id_poli) ?>',
                messageTop: '<?= poli($id_poli) ?>'
            },
            {
                extend: 'print',
                className: 'btn btn-primary ionicons ion-printer',
                title: 'Riwayat Pemeriksaan Poli',
                messageTop: '<?= poli($id_poli) ?>'
            }
        ]
    });

    $(document).on("change", "#bulan-pemeriksaan", function(e){
      var val_tahun = $("#tahun-pemeriksaan").find(':selected')[0].value;
      var val = val_tahun + "-" + $(this).find(':selected')[0].value;

      riwayat_poli.column(0).search(
        val,
        false, false
      ).draw();
      // global_regex
      // global_smart
      // console.log(val)
    }); 

    $(document).on("change", "#tahun-pemeriksaan", function(e){
      var val_bulan = $("#bulan-pemeriksaan").find(':selected')[0].value;
      var val = $(this).find(':selected')[0].value + "-" + val_bulan;

      riwayat_poli.column(0).search(
        val,
        false, false
      ).draw();
      // global_regex
      // global_smart
      // console.log(val)
    }); 

<? } ?>






    $(document).on("click", "#skip", function(e){

       let okay = confirm("Menghapus Poli berpengaruh terhadap data yang berelasi?");

        if( okay ){
            $.post(admin_url+"submit",
            {
                poli_delete: "",
                id_poli: $(this).data('id')
            },
            function(data, status){
                if(data == 1){
                <? if(isset($_GET['id'])){ ?>
                    window.location.href = admin_url + "poli";
                <? }else{ ?>
                    poli.ajax.reload();
                <? } ?>
                }else{
                    alert("Error: " + data + "\nStatus: " + status);
                }
            });
        }

    }); 

    $(document).on("click", "#oke", function(e){
        var id_poli = $(this).data('id')
        // redirect ke halaman poli by id_poli
        window.location.href = admin_url + "poli?id=" + id_poli;
    }); 
    $(document).on("click", "#detail", function(e){
        var id_poli = $(this).data('id')
        // redirect ke halaman poli by id_poli
        window.location.href = admin_url + "poli?idd=" + id_poli;
    }); 

    $(document).on("click", ".redirect", function(e){
      var page = $(this).attr('data-page')
      var id = $(this).attr('data-id')
      window.location.href = admin_url + page + '?id=' + id
    }); 


    $('#timepicker-buka, #timepicker-tutup').datetimepicker({
      format: 'HH:mm'
    })














  });
</script>


</body>
</html>
