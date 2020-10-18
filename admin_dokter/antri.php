<?
  $pagename = "Ambil Nomor Antrian";
  include "header.php";
  include "menubar.php";
?>



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <? include "list-antri.php"; ?>

        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <!-- Custom tabs (Charts with tabs)-->


            <div class="card">

              <!-- form start -->
              <form role="form" action="<?= $admin ?>submit" method="POST">
                <div class="card-body">

                <input type="hidden" name="id_pasien" value="<?= pasien(userid(), "id_pasien") ?>">


                      <div class="form-group">
                        <label for="poli">Poli</label>
                        <select id="poli" class="custom-select" name="id_poli">
                        <?
                          $poli = mysqli_query($conn, "SELECT * FROM poli ORDER BY id_poli DESC");
                          while( $pol = mysqli_fetch_assoc($poli) ){
                            echo '<option value="'.$pol['id_poli'].'">'.$pol['nama_poli'].'</option>';
                          }
                        ?>
                        </select>
                      </div>


                  <div class="form-group">
                    <label for="keluhan">Keluhan</label>
                    <textarea class="form-control" id="keluhan" placeholder="Keluhan" name="keluhan" required=""></textarea>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="ambil_antrian">Ambil Nomor Antri</button>
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
