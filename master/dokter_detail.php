<div class="row">
        <div class="col-12">
        <div class="card">



            <div class="card-header">
                <h3 class="card-title"><b>Riwayat Pemeriksaan (<?= datadokter_id(stripslashes($_GET['idd']), "nama_dokter")." - ".poli(datadokter_id(stripslashes($_GET['idd']), "poli")) ?>)</b></h3>
            </div>

            <div class="card-body">

                <div class="sort-date">
                    <select class="custom-select" id="tahun-pemeriksaan">
                        <option value="">All</option>
                    <?
                        $sql = mysqli_query($conn, "SELECT tgl_pemeriksaan FROM pemeriksaan GROUP BY YEAR(tgl_pemeriksaan) ORDER BY tgl_pemeriksaan DESC");
                        while($arr = mysqli_fetch_assoc($sql)){
                        echo '<option value="'.date('Y', strtotime($arr['tgl_pemeriksaan'])).'">'.date('Y', strtotime($arr['tgl_pemeriksaan'])).'</option>';
                        }
                    ?>
                    </select>

                    <select class="custom-select" id="bulan-pemeriksaan">
                        <option value="">All</option>
                    <?
                        $sql = mysqli_query($conn, "SELECT tgl_pemeriksaan FROM pemeriksaan GROUP BY MONTH(tgl_pemeriksaan)");
                        while($arr = mysqli_fetch_assoc($sql)){
                        echo '<option value="'.date('m', strtotime($arr['tgl_pemeriksaan'])).'">'.date('F', strtotime($arr['tgl_pemeriksaan'])).'</option>';
                        }
                    ?>
                    </select>
                    <p>Sort by: </p>
                    </div>

                    <table id="riwayat_dokter" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Pasien</th>
                            <th>Keluhan</th>
                            <th>Catatan</th>
                            <th>Resep Obat</th>
                        </tr>
                        </thead>
                        <tbody><tr><td colspan="5" class="text-center">Memuat data...</td></tr></tbody>
                    </table>
                </div>





        </div>
        </div>
    </div>