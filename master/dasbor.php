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
                <h3 class="card-title"><b>Tabel Pemeriksaan Pasien</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="pemeriksaan_pasien" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>No. Antri</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan</th>
                    <th>Usia</th>
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
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    <!-- /.content -->




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

               <div class="sort-date">
                  <select class="custom-select" id="tahun-pemeriksaan">
                    <option value="">All</option>
                  <?
                    $sql = mysqli_query($conn, "SELECT tgl_pemeriksaan FROM pemeriksaan GROUP BY YEAR(tgl_pemeriksaan) ORDER BY tgl_pemeriksaan DESC");
                    while($arr = mysqli_fetch_assoc($sql)){
                      echo '<option value="'.date('Y', strtotime($arr['tgl_pemeriksaan'])).'">'.date('Y', strtotime($arr['tgl_pemeriksaan'])).'</option>';
                    }
                  ?>
                  </select>

                  <select class="custom-select" id="bulan-pemeriksaan">
                    <option value="">All</option>
                  <?
                    $sql = mysqli_query($conn, "SELECT tgl_pemeriksaan FROM pemeriksaan GROUP BY MONTH(tgl_pemeriksaan)");
                    while($arr = mysqli_fetch_assoc($sql)){
                      echo '<option value="'.date('m', strtotime($arr['tgl_pemeriksaan'])).'">'.date('F', strtotime($arr['tgl_pemeriksaan'])).'</option>';
                    }
                  ?>
                  </select>
                  <p>Sort by: </p>
                </div>


                <table id="riwayat_pasien" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Pasien</th>
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

    // $(window).on('load', function(){
    //   pemeriksaan_pasien()
    // })
    // $("#example1").DataTable({
    //   "responsive": true,
    //   "autoWidth": false,
    // });
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

    // var pemeriksaan_pasien = $('#pemeriksaan_pasien').DataTable({
    //   "processing": true,
    //   "serverSide": true,
    //   "ajax": admin_url + "submit?datatable",
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": true,
    //   "ordering": true,
    //   "order": [[0, "asc"]],
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });


  // DATATABLE AJAX
   var pemeriksaan_pasien = $('#pemeriksaan_pasien').on( 'processing.dt', function ( e, settings, processing ) {
        // $('#processingIndicator').css( 'display', processing ? loader('show') : loader('hide') );
    } ).DataTable({
        ajax: {
            url: admin_url+'submit',
            type: 'POST',
            data: {"get_datatable_pemeriksaan":""}
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
    });

   var riwayat_pasien = $('#riwayat_pasien').on( 'processing.dt', function ( e, settings, processing ) {
        // $('#processingIndicator').css( 'display', processing ? loader('show') : loader('hide') );
    } ).DataTable({
        ajax: {
            url: admin_url+'submit',
            type: 'POST',
            data: {"get_datatable_riwayat":""}
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
                title: 'Riwayat Pemeriksaan Dokter',
                messageTop: ''
            },
            {
                extend: 'print',
                className: 'btn btn-primary ionicons ion-printer',
                title: 'Riwayat Pemeriksaan Dokter',
                messageTop: ''
            }
        ]


    });





    // var pemeriksaan_pasien = $('#pemeriksaan_pasien').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": true,
    //   "ordering": true,
    //   "order": [[0, "asc"]],
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });

    $(document).on("click", "#skip", function(e){
      $.post(admin_url+"submit",
      {
        pasien_skip: "",
        id_antrian: $(this).data('id')
      },
      function(data, status){
        if(data == 1){
          pemeriksaan_pasien.ajax.reload();
          allpoli()
        }else{
          alert("Error: " + data + "\nStatus: " + status);
        }
      });
    }); 

    $(document).on("click", "#oke", function(e){
      $.post(admin_url+"submit",
      {
        pasien_oke: "",
        id_antrian: $(this).data('id'),
        id_dokter: '<?= datadokter(userid(), "id_dokter"); ?>'
      },
      function(data, status){
        var cond = data.split(',') 
        if(cond[0] == 1){
          pemeriksaan_pasien.ajax.reload();
          allpoli()

          // redirect ke halaman pemeriksaan by id_pemeriksaan
          window.location.href = admin_url + "pemeriksaan?id=" + cond[1];
        }else{
          alert("Error: " + data + "\nStatus: " + status);
        }
      });
    }); 

    $(document).on("click", ".redirect", function(e){
      var page = $(this).attr('data-page')
      var id = $(this).attr('data-id')
      window.location.href = admin_url + page + '?id=' + id
    }); 




    $(document).on("change", "#bulan-pemeriksaan", function(e){
      var val_tahun = $("#tahun-pemeriksaan").find(':selected')[0].value;
      var val = val_tahun + "-" + $(this).find(':selected')[0].value;

      riwayat_pasien.column(0).search(
        val,
        false, false
      ).draw();
      // global_regex
      // global_smart
      console.log(val)
    }); 

    $(document).on("change", "#tahun-pemeriksaan", function(e){
      var val_bulan = $("#bulan-pemeriksaan").find(':selected')[0].value;
      var val = $(this).find(':selected')[0].value + "-" + val_bulan;

      riwayat_pasien.column(0).search(
        val,
        false, false
      ).draw();
      // global_regex
      // global_smart
      console.log(val)
    }); 













  });
</script>


</body>
</html>
