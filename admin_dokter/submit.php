<?
  include "../config/DBconnect.php";

  session_start();
  if( $_SESSION['status'] != "login_dokter" ){
      header("Location: ".$admin_dokter);
  }




if( isset($_POST['profil_dokter']) ){

	$id_user = stripslashes($_POST['id_user']);
	$nama_dokter = stripslashes($_POST['nama_dokter']);
	$nomorhp = stripslashes($_POST['nomorhp']);
	$tgl_lahir = stripslashes(date("Y-m-d", strtotime($_POST['tgl_lahir'])));
	$jenis_kelamin = stripslashes($_POST['jenis_kelamin']);
	$poli = stripslashes($_POST['poli']);
	$alamat = stripslashes($_POST['alamat']);

	$sql = "UPDATE dokter SET nama_dokter='$nama_dokter', nomorhp='$nomorhp', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', poli='$poli', alamat='$alamat' WHERE id_user='$id_user'";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$admin_dokter."profil_dokter");
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


if( isset($_POST['pemeriksaan_pasien']) ){

	$id_pemeriksaan = stripslashes($_POST['id_pemeriksaan']);
	$catatan = stripslashes(trim($_POST['catatan']));
	$resep_obat = stripslashes(trim($_POST['resep_obat']));

	$sql = "UPDATE pemeriksaan SET catatan='$catatan', resep_obat='$resep_obat' WHERE id_pemeriksaan='$id_pemeriksaan'";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$admin_dokter."dasbor");
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}






// AJAX
if( isset($_POST['pasien_skip']) ){
	$sql = "UPDATE antrian SET `status`='1' WHERE id_antrian='".$_POST['id_antrian']."'";
	if ($conn->query($sql) === TRUE) {
		echo "1";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if( isset($_POST['pasien_oke']) ){

	$id_antrian = stripslashes($_POST['id_antrian']);
	$id_dokter = stripslashes($_POST['id_dokter']);
	    $antrian = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM antrian WHERE id_antrian='$id_antrian' "));
		$id_pasien = $antrian['id_pasien'];
		$id_poli = $antrian['id_poli'];
	$insert = "INSERT INTO pemeriksaan (id_pasien, id_dokter, id_antrian, id_poli)
				VALUES ('$id_pasien', '$id_dokter', '$id_antrian', '$id_poli')";
	if ($conn->query($insert) === TRUE) {
		$id_pemeriksaan = $conn->insert_id;
		$sql = "UPDATE antrian SET `status`='1' WHERE id_antrian='".$_POST['id_antrian']."'";
		if ($conn->query($sql) === TRUE) {
			echo "1,".$id_pemeriksaan;
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

	if( isset($_POST['get_datatable_pemeriksaan']) ){
		$data = [];
		$index = 0;
		$id_poli = $_POST['id_poli'];
	    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE id_poli='$id_poli' AND `status`='0' ");
	    while($ant = mysqli_fetch_assoc($antrian)){
	    	$index++;
	        $data[] = 
	        	array(
		        	$ant['no_antrian'],
		        	datapasien($ant['id_pasien'], "nama_lengkap"),
		        	$ant['keluhan'],
		        	usia_pasien($ant['id_pasien']),
		        	'<button class="custom" id="oke" data-id="'.$ant['id_antrian'].'">Periksa</button>
		        	 <button class="custom" id="skip" data-id="'.$ant['id_antrian'].'">Lewati</button>'
	        	);
	    }
		$json = array("draw"=> 1, "recordsTotal"=> count($data), "recordsFiltered"=> count($data), "data"=> $data);
		header('content-type:application/json');
		echo json_encode($json);
	}


	if( isset($_POST['get_datatable_riwayat']) ){
		$data = [];
		$index = 0;
		$id_dokter = $_POST['id_dokter'];
        $pemeriksaan = mysqli_query($conn, "SELECT * FROM pemeriksaan WHERE id_dokter='$id_dokter'");
        while($pem = mysqli_fetch_assoc($pemeriksaan)){
	    	$index++;
	        $data[] = 
	        	array(
		        	$pem['tgl_pemeriksaan'],
		        	datapasien($pem['id_pasien'], "nama_lengkap"),
		        	keluhan($pem['id_antrian']),
		        	nl2br($pem['catatan']),
		        	nl2br($pem['resep_obat']),
		        	$pem['id_pemeriksaan']
	        	);
        }
		$json = array("draw"=> 1, "recordsTotal"=> count($data), "recordsFiltered"=> count($data), "data"=> $data);
		header('content-type:application/json');
		echo json_encode($json);
	}
























// if( isset($_POST['ambil_antrian']) ){

// 	$id_poli = stripslashes($_POST['id_poli']);

// 	// cek nomor antri terakhir / no_antrian
// 	$cek_nomor_antrian = mysqli_fetch_assoc(mysqli_query($conn, "SELECT no_antrian FROM antrian WHERE id_poli='$id_poli' ORDER BY id_antrian DESC"));

// 	// mengecek nomor antrian
// 	if( empty($cek_nomor_antrian['no_antrian']) ){
// 		$nomor = 1;
// 	}else{
// 		// echo 'ada';
// 		$nomor = $cek_nomor_antrian['no_antrian'] + 1;
// 	}
// 		$no_antrian = str_pad($nomor, 4, '0', STR_PAD_LEFT);

// 	$id_pasien = stripslashes($_POST['id_pasien']);
// 	$keluhan = stripslashes($_POST['keluhan']);

// 	$sql = "INSERT INTO antrian (id_poli, id_pasien, keluhan, no_antrian)
// 			VALUES ('$id_poli', '$id_pasien', '$keluhan', '$no_antrian')";
// 	if ($conn->query($sql) === TRUE) {
// 		header("Location: ".$admin_dokter."dasbor");
// 	}else{
// 	  echo "Error: " . $sql . "<br>" . $conn->error;
// 	}
// }













?>
