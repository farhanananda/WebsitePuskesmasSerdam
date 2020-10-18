<?
  $pagename = "Profil Dokter";
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
                $query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM dokter WHERE id_user = '".userid()."' "));
              ?>

              <!-- form start -->
              <form role="form" action="<?= $admin_dokter ?>submit" method="POST">
                <div class="card-body">

                <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">

                  <div class="form-group">
                    <label for="namalengkap">Nama Lengkap Dokter</label>
                    <input type="text" class="form-control" id="namalengkap" placeholder="Nama Lengkap Dokter" name="nama_dokter" value="<?= $query['nama_dokter'] ?>">
                  </div>

                <div class="form-group">
                  <label for="tanggallahir">Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" id="tanggallahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?= date("d/m/Y", strtotime($query['tgl_lahir'])) ?>" name="tgl_lahir">
                  </div>
                </div>

                      <div class="form-group">
                        <label for="jeniskelamin">Jenis Kelamin</label>
                        <select id="jeniskelamin" class="custom-select" name="jenis_kelamin">
                          <option value="Laki-laki" <?= ($query['jenis_kelamin'] == 'Laki-laki' ? ' selected':''); ?>>Laki-laki</option>
                          <option value="Perempuan" <?= ($query['jenis_kelamin'] == 'Perempuan' ? ' selected':''); ?>>Perempuan</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="golongandarah">Poli</label>
                        <select id="golongandarah" class="custom-select" name="poli">
                        <?
                            $datapoli = mysqli_query($conn, "SELECT * FROM poli ORDER BY id_poli DESC");
                            while($poli = mysqli_fetch_assoc($datapoli)){
                              echo '<option value="'.$poli['id_poli'].'"  '.($query['poli'] == $poli['id_poli'] ? ' selected':'').' >'.$poli['nama_poli'].'</option>';    
                            }
                        ?>
                        </select>
                      </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat"><?= $query['alamat'] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="nomorhp">No. Handphone</label>
                    <input type="text" class="form-control" id="nomorhp" placeholder="No. Handphone" name="nomorhp" value="<?= $query['nomorhp'] ?>">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="profil_dokter">Simpan</button>
                </div>
              </form>

            </div>
            <!-- /.card -->
        </div>
        </div>

          <!-- right col -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->




<? include "footer.php"; ?>


<script>
  $(function () {

    //Datemask dd/mm/yyyy
    $('[data-mask]').inputmask()

    // $('[datemask]').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })


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
  });
</script>


</body>
</html>
