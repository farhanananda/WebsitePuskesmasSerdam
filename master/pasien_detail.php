    <div class="row">
        <div class="col-12">
        <div class="card">



            <div class="card-header">
                <h3 class="card-title"><b>Riwayat Pemeriksaan (<?= datapasien(stripslashes($_GET['idd']), 'nama_lengkap') ?>)</b></h3>
            </div>
              <!-- /.card-header -->
            <div class="card-body">
                <table id="riwayat_pasien" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Dokter</th>
                    <th>Keluhan</th>
                    <th>Diagnosa</th>
                    <th>Resep Obat</th>
                  </tr>
                  </thead>
                  <tbody><tr><td colspan="5" class="text-center">Memuat data...</td></tr></tbody>
                </table>
            </div>





        </div>
        </div>
    </div>