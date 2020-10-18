<?
  $pagename = "Pemeriksaan Pasien";
  include "header.php";
  include "menubar.php";
?>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom tabs (Charts with tabs)-->


            <div class="card">
<!--               <div class="card-header">
                <h3 class="card-title"><b>Riwayat Pemeriksaan</b></h3>
              </div>
 -->              <!-- /.card-header -->

              <?
                $query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pemeriksaan WHERE id_pemeriksaan = '".stripslashes($_GET['id'])."' "));

              ?>

              <!-- form start -->
              <form role="form" action="<?= $admin_dokter ?>submit" method="POST">
                <div class="card-body">

                <input type="hidden" name="id_pemeriksaan" value="<?= stripslashes($_GET['id']) ?>">

                  <div class="form-group">
                    <label for="namalengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" value="<?= datapasien($query['id_pasien'], 'nama_lengkap') ?>" disabled>
                  </div>

                  <div class="form-group">
                    <label for="namalengkap">Tanggal Lahir</label>
                    <input type="text" class="form-control" value="<?= date('d M Y', strtotime(datapasien($query['id_pasien'], 'tgl_lahir'))) ?>" disabled>
                  </div>

                  <div class="form-group">
                    <label for="namalengkap">Jenis Kelamin</label>
                    <input type="text" class="form-control" value="<?= datapasien($query['id_pasien'], 'jenis_kelamin') ?>" disabled>
                  </div>

                  <div class="form-group">
                    <label for="namalengkap">Alamat</label>
                    <input type="text" class="form-control" value="<?= datapasien($query['id_pasien'], 'alamat') ?>" disabled>
                  </div>


                  <div class="form-group">
                    <label for="namalengkap">Keluhan</label>
                    <input type="text" class="form-control" value="<?= keluhan($query['id_antrian']) ?>" disabled>
                  </div>

                  <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea class="form-control" id="catatan" placeholder="Catatan" name="catatan"><?= $query['catatan'] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="resepobat">Resep Obat</label>
                    <textarea class="form-control" id="resepobat" placeholder="Resep Obat" name="resep_obat"><?= $query['resep_obat'] ?></textarea>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="pemeriksaan_pasien">Simpan</button>
                </div>
              </form>

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

  });
</script>


</body>
</html>
