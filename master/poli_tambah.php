        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom tabs (Charts with tabs)-->


            <div class="card">

              <div class="card-header">
                <h3 class="card-title"><b>Tambah</b></h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="<?= $master ?>submit" method="POST">
                <div class="card-body">


                    <div class="form-group">
                        <label for="namapoli">Nama Poli</label>
                        <input type="text" class="form-control" id="namapoli" placeholder="Nama Poli" name="nama_poli">
                    </div>

                    <div class="form-group">
                    <label for="jambuka">Jam Buka</label>
                        <div class="input-group date" id="timepicker-buka" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#timepicker-buka" name="jam_buka">
                        <div class="input-group-append" data-target="#timepicker-buka" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="jambuka">Jam Tutup</label>
                        <div class="input-group date" id="timepicker-tutup" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#timepicker-tutup" name="jam_tutup">
                        <div class="input-group-append" data-target="#timepicker-tutup" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="poli_tambah">Simpan</button>
                </div>
              </form>

            </div>
            <!-- /.card -->
        </div>
        </div>