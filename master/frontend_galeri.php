<?
  $pagename = "Frontend Galeri Puskesmas";
  include "header.php";
  include "menubar.php";
?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


<?
    if(isset($_GET['id'])){
        include_once "frontend_galeri_edit.php";
    }else if(isset($_GET['tambah'])){
        include_once "frontend_galeri_tambah.php";
    }
?>


        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Tabel Galeri</b></h3>
                <h3 class="card-title" style="float: right;"><a href="<?= $master ?>frontend_galeri?tambah"><b>Tambah</b></a></h3>
              </div>
              <div class="card-body">
                <table id="galeri" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Filename</th>
                    <th>Datetime</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody><tr><td colspan="5" class="text-center">Memuat data...</td></tr></tbody>
                </table>
              </div>
            </div>

          </div>
        </div>





        </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->




<? include "footer.php"; ?>

<script src="<?= $master ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

  $(function () {


  // DATATABLE AJAX
   var galeri = $('#galeri').on( 'processing.dt', function ( e, settings, processing ) {
        // $('#processingIndicator').css( 'display', processing ? loader('show') : loader('hide') );
    } ).DataTable({
        ajax: {
            url: admin_url+'submit',
            type: 'POST',
            data: {"get_datatable_galeri":""}
        },
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
        "responsive": true
    });

<? if(isset($_GET['tambah'])){ ?>

    $(document).on("click", "#tambah", function(e){
        e.preventDefault()
        $('#tambah-foto').append('\
        <div class="box-tambah"> \
        <hr> \
        <div class="form-group">\
        <button class="custom" id="hapus" style="background-color: #ce0000;color: #fff;"><i class="fas fa-times-circle"></i> Delete</button>\
        </div>\
        \
        <div class="form-group">\
            <label for="judul_foto" class="col-sm-12 col-form-label">Judul Foto</label>\
            <div class="col-sm-12">\
                <input type="text" class="form-control" id="judul_foto" placeholder="Judul Foto" name="title[]" required>\
            </div>\
        </div>\
        \
        <div class="form-group">\
            <label class="col-sm-12 col-form-label" for="foto">Foto</label>\
            <div class="col-sm-12">\
            <div class="custom-file">\
                <input type="file" class="custom-file-input" id="foto" name="image[]" required>\
                <label class="custom-file-label" for="foto">Upload Foto</label>\
            </div>\
            </div>\
        </div>\
        </div>\
        ');

        bsCustomFileInput.init();

    }); 

    $(document).on("click", "#hapus", function(e){
        $(e.currentTarget).closest('.box-tambah').remove()
    }); 

<? } ?>


    $(document).on("click", "#skip", function(e){

       let okay = confirm("Yakin menghapus Foto ini?");

        if( okay ){
            $.post(admin_url+"submit",
            {
                galeri_delete: "",
                id_galeri: $(this).data('id')
            },
            function(data, status){
                if(data == 1){
                <? if(isset($_GET['id'])){ ?>
                    window.location.href = admin_url + "frontend_galeri";
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
        var id_galeri = $(this).data('id')
        // redirect ke halaman dokter by id_dokter
        window.location.href = admin_url + "frontend_galeri?id=" + id_galeri;
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

