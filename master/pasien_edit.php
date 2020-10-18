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
                $query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pasien WHERE id_pasien = '".stripslashes($_GET['id'])."' "));
              ?>

              <!-- form start -->
              <form role="form" action="<?= $master ?>submit" method="POST">
                <div class="card-body">

                <input type="hidden" name="id_pasien" value="<?= $_GET['id'] ?>">

                <div class="form-group">
                    <label for="namalengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namalengkap" placeholder="Nama Lengkap" name="nama_lengkap" value="<?= $query['nama_lengkap'] ?>">
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
                        <label for="golongandarah">Golongan Darah</label>
                        <select id="golongandarah" class="custom-select" name="golongan_darah">
                          <option value="A" <?= ($query['golongan_darah'] == 'A' ? ' selected':''); ?>>A</option>
                          <option value="B" <?= ($query['golongan_darah'] == 'B' ? ' selected':''); ?>>B</option>
                          <option value="O" <?= ($query['golongan_darah'] == 'O' ? ' selected':''); ?>>O</option>
                          <option value="AB" <?= ($query['golongan_darah'] == 'AB' ? ' selected':''); ?>>AB</option>
                        </select>
                      </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat"><?= $query['alamat'] ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="nomorhp">No. Handphone</label>
                    <input type="text" class="form-control" id="nomorhp" placeholder="No. Handphone" name="nomor_hp" value="<?= $query['nomor_hp'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" value="<?= $query['nik'] ?>">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="pasien_edit">Simpan</button>
                </div>
              </form>

            </div>
            <!-- /.card -->
        </div>
        </div>