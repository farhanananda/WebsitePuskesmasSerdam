        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom tabs (Charts with tabs)-->


        <div class="card">

            <div class="card-header">
                <h3 class="card-title"><b>Tambah Foto</b></h3>
                <h3 class="card-title" style="float: right"><a href="#" id="tambah"><b><i class="fas fa-plus"></i> Tambah</b></a></h3>
            </div>

            <div class="card-body">

                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?= $master ?>submit">

                    <div class="form-group">
                        <label for="judul_foto" class="col-sm-12 col-form-label">Judul Foto</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="judul_foto" placeholder="Judul Foto" name="title[]" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 col-form-label" for="foto">Foto</label>                          
                        <div class="col-sm-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="image[]" required>
                            <label class="custom-file-label" for="foto">Upload Foto</label>
                        </div>
                        </div>
                    </div>

                    <div id="tambah-foto"></div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="frontend_galeri">Simpan</button>
                    </div>   
                </form>              

            </div>
        </div>

      </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
