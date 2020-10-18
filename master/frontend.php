<?
  $pagename = "Frontend Puskesmas";
  include "header.php";
  include "menubar.php";
?>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom tabs (Charts with tabs)-->


            <div class="card">

                <div class="card-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?= $master ?>submit">

                <?
                        $puskesmas = mysqli_query($conn, "SELECT * FROM frontend");
                        $pus = mysqli_fetch_assoc($puskesmas);
                        $num = mysqli_num_rows($puskesmas);
                ?>

                        <div class="form-group">
                        <label for="nama_puskesmas" class="col-sm-12 col-form-label">Nama Puskesmas</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_puskesmas" placeholder="Nama Puskesmas" name="judul" value="<?= $pus['judul'] ?>">
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="deskripsi" class="col-sm-12 col-form-label">Deskripsi</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" id="deskripsi" placeholder="Deskripsi" name="deskripsi"><?= $pus['deskripsi'] ?></textarea>
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="col-sm-12 col-form-label" for="customFile">Foto Puskesmas</label>                          
                        <div class="col-sm-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="foto_puskesmas">
                            <label class="custom-file-label" for="customFile"><?= (empty($pus['foto_puskesmas']) ? 'Upload Foto' : $pus['foto_puskesmas']) ?></label>
                        </div>
                        </div>
                        </div>                  


                        <div class="form-group">
                        <label for="profil" class="col-sm-12 col-form-label">Profil Puskesmas</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" id="profil" placeholder="Profil Puskesmas" rows="4" name="profil"><?= $pus['profil'] ?></textarea>
                        </div>
                        </div>                  
                        
                        <div class="form-group">
                        <label class="col-sm-12 col-form-label" for="customFile">Profil Image</label>                          
                        <div class="col-sm-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="profil_image">
                            <label class="custom-file-label" for="customFile"><?= (empty($pus['profil_image']) ? 'Upload Image' : $pus['profil_image']) ?></label>
                        </div>
                        </div>
                        </div>                  


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" <?= ($num > 0 ? 'name="frontend_profil_edit">Update':'name="frontend_profil">Simpan') ?></button>
                        </div>                  

                    </form>
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
</script>


</body>
</html>

