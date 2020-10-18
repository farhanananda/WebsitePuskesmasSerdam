        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom tabs (Charts with tabs)-->


        <div class="card">

            <div class="card-header">
                <h3 class="card-title"><b>Edit Foto</b></h3>
            </div>

            <div class="card-body">

                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?= $master ?>submit">

            <?
                $query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM frontend_galeri WHERE id_galeri = '".stripslashes($_GET['id'])."' "));
            ?>
                    <input type="hidden" name="id_galeri" value="<?= $_GET['id'] ?>">

                    <div class="form-group">
                        <label for="judul_foto" class="col-sm-12 col-form-label">Judul Foto</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="judul_foto" placeholder="Judul Foto" name="title" required value="<?= $query['title'] ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 col-form-label" for="foto">Foto</label>                          
                        <div class="col-sm-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="image">
                            <label class="custom-file-label" for="foto"><?= $query['image'] ?></label>
                        </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="frontend_galeri_edit">Update</button>
                    </div>   
                </form>              

            </div>
        </div>

      </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
