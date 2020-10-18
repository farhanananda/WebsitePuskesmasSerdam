<?
  $pagename = "Dokter";
  include "header.php";
  include "menubar.php";
?>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


<?
    if(isset($_GET['id'])){
        include_once "dokter_edit.php";
    }else if(isset($_GET['idd'])){
        include_once "dokter_detail.php";
    }
?>


        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom tabs (Charts with tabs)-->


            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Tabel Dokter</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dokter" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>Nama Lengkap</th>
                    <th>Poli</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th>Action</th>
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
   var dokter = $('#dokter').on( 'processing.dt', function ( e, settings, processing ) {
        // $('#processingIndicator').css( 'display', processing ? loader('show') : loader('hide') );
    } ).DataTable({
        ajax: {
            url: admin_url+'submit',
            type: 'POST',
            data: {"get_datatable_dokter":""}
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
                title: 'Daftar Nama Dokter',
                messageTop: ''
            },
            {
                extend: 'print',
                className: 'btn btn-primary ionicons ion-printer',
                title: 'Daftar Nama Dokter',
                messageTop: ''
            }
        ]


    });

<? if(isset($_GET['idd'])){
    $id_dokter = stripslashes($_GET['idd']);
?>
    var riwayat_dokter = $('#riwayat_dokter').on( 'processing.dt', function ( e, settings, processing ) {
        // $('#processingIndicator').css( 'display', processing ? loader('show') : loader('hide') );
    } ).DataTable({
        ajax: {
            url: admin_url+'submit',
            type: 'POST',
            data: {"get_datatable_dokter_detail":"", "id_dokter":'<?= $id_dokter ?>'}
        },
        // "columnDefs": [
        //     { className: "table-config", "targets": [5] }
        // ],
        "language": {
            "emptyTable": "Maaf, tidak ada data yang ditampilkan :'(",
            "zeroRecords": "Maaf, tidak menemukan data yang cocok :'("
        },
        "createdRow": function( row, data, dataIndex ) {
            $(row).addClass('redirect').attr({'data-id':data[5], 'data-page':'pemeriksaan', 'title':'Klik untuk melihat detail'});
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
                title: 'Riwayat Pemeriksaan Dokter - <?= datadokter_id($id_dokter, "nama_dokter") ?>',
                messageTop: '<?= poli(datadokter_id($id_dokter, "poli")) ?>'
            },
            {
                extend: 'print',
                className: 'btn btn-primary ionicons ion-printer',
                title: 'Riwayat Pemeriksaan Dokter - <?= datadokter_id($id_dokter, "nama_dokter") ?>',
                messageTop: '<?= poli(datadokter_id($id_dokter, "poli")) ?>'
            }
        ]

    });
<? } ?>


    $(document).on("click", "#skip", function(e){

       let okay = confirm("Menghapus Dokter berpengaruh terhadap data yang berelasi?");

        if( okay ){
            $.post(admin_url+"submit",
            {
                dokter_delete: "",
                id_dokter: $(this).data('id')
            },
            function(data, status){
                if(data == 1){
                <? if(isset($_GET['id'])){ ?>
                    window.location.href = admin_url + "dokter";
                <? }else{ ?>
                    pasien.ajax.reload();
                <? } ?>
                }else{
                    alert("Error: " + data + "\nStatus: " + status);
                }
            });
        }

    }); 

    $(document).on("click", "#oke", function(e){
        var id_dokter = $(this).data('id')
        // redirect ke halaman dokter by id_dokter
        window.location.href = admin_url + "dokter?id=" + id_dokter;
    }); 

    $(document).on("click", "#detail", function(e){
        var id_dokter = $(this).data('id')
        // redirect ke halaman dokter by id_dokter
        window.location.href = admin_url + "dokter?idd=" + id_dokter;
    }); 

    $(document).on("click", ".redirect", function(e){
      var page = $(this).attr('data-page')
      var id = $(this).attr('data-id')
      window.location.href = admin_url + page + '?id=' + id
    }); 

















  });
</script>


</body>
</html>
