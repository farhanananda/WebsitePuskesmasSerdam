<?
  $pagename = "Pasien";
  include "header.php";
  include "menubar.php";
?>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


<?
    if(isset($_GET['id'])){
        include_once "pasien_edit.php";
    }else if(isset($_GET['idd'])){
        include_once "pasien_detail.php";
    }
?>
  
  
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom tabs (Charts with tabs)-->


            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Tabel Pasien</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="pasien" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin /<br>Gol. Darah</th>
                    <th>Tanggal Lahir</th>
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
   var pasien = $('#pasien').on( 'processing.dt', function ( e, settings, processing ) {
        // $('#processingIndicator').css( 'display', processing ? loader('show') : loader('hide') );
    } ).DataTable({
        ajax: {
            url: admin_url+'submit',
            type: 'POST',
            data: {"get_datatable_pasien":""}
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
                title: 'Daftar Nama Pasien',
                messageTop: ''
            },
            {
                extend: 'print',
                className: 'btn btn-primary ionicons ion-printer',
                title: 'Daftar Nama Pasien',
                messageTop: ''
            }
        ]


    });


<? if(isset($_GET['idd'])){
    $id_pasien = stripslashes($_GET['idd']);
?>

    var riwayat_pasien = $('#riwayat_pasien').on( 'processing.dt', function ( e, settings, processing ) {
        // $('#processingIndicator').css( 'display', processing ? loader('show') : loader('hide') );
    } ).DataTable({
        ajax: {
            url: admin_url+'submit',
            type: 'POST',
            data: {"get_datatable_pasien_detail":"", "id_pasien":'<?= $id_pasien ?>'}
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
                title: 'Riwayat Pemeriksaan Pasien - <?= datapasien($id_pasien, 'nama_lengkap') ?>',
                messageTop: '<?= datapasien($id_pasien, 'nama_lengkap') ?>'
            },
            {
                extend: 'print',
                className: 'btn btn-primary ionicons ion-printer',
                title: 'Riwayat Pemeriksaan Pasien',
                messageTop: '<?= datapasien($id_pasien, 'nama_lengkap') ?>'
            }
        ]
    });
<? } ?>






    $(document).on("click", "#skip", function(e){

       let okay = confirm("Menghapus Pasien berpengaruh terhadap data yang berelasi?");

        if( okay ){
            $.post(admin_url+"submit",
            {
                pasien_delete: "",
                id_pasien: $(this).data('id')
            },
            function(data, status){
                if(data == 1){
                <? if(isset($_GET['id'])){ ?>
                    window.location.href = admin_url + "pasien";
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
        var id_pasien = $(this).data('id')
        // redirect ke halaman pasien by id_pasien
        window.location.href = admin_url + "pasien?id=" + id_pasien;
    }); 
    $(document).on("click", "#detail", function(e){
        var id_pasien = $(this).data('id')
        // redirect ke halaman pasien by id_pasien
        window.location.href = admin_url + "pasien?idd=" + id_pasien;
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
