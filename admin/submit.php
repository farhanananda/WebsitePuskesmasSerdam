<?
  include "../config/DBconnect.php";

  session_start();
  if(!isset($_SESSION['username'])){
      header("Location: ".$home."admin/");
  }




if( isset($_POST['profil_pasien']) ){

	$id_user = stripslashes($_POST['id_user']);
	$nama_lengkap = stripslashes($_POST['nama_lengkap']);
	$nik = stripslashes($_POST['nik']);
	$nomor_hp = stripslashes($_POST['nomor_hp']);
	$tgl_lahir = stripslashes(date("Y-m-d", strtotime($_POST['tgl_lahir'])));
	$jenis_kelamin = stripslashes($_POST['jenis_kelamin']);
	$golongan_darah = stripslashes($_POST['golongan_darah']);
	$alamat = stripslashes($_POST['alamat']);

	$sql = "UPDATE pasien SET nama_lengkap='$nama_lengkap', nik='$nik', nomor_hp='$nomor_hp', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', golongan_darah='$golongan_darah', alamat='$alamat' WHERE id_user='$id_user'";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$admin."profil_pasien");
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if( isset($_POST['ambil_antrian']) ){

	$id_poli = stripslashes($_POST['id_poli']);

	// cek nomor antri terakhir / no_antrian
	$cek_nomor_antrian = mysqli_fetch_assoc(mysqli_query($conn, "SELECT no_antrian FROM antrian WHERE id_poli='$id_poli' ORDER BY id_antrian DESC"));

	// mengecek nomor antrian
	if( empty($cek_nomor_antrian['no_antrian']) ){
		$nomor = 1;
	}else{
		if( date('Ymd', strtotime($cek_nomor_antrian['tgl_antrian'])) < date('Ymd') ){
			$sql = "UPDATE antrian SET `status` = '1' WHERE id_antrian!='0'";
			if ($conn->query($sql) === TRUE) {
				$nomor = 1;
			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
				$nomor = $cek_nomor_antrian['no_antrian'] + 1;
		}
	}
		$no_antrian = str_pad($nomor, 4, '0', STR_PAD_LEFT);

	$id_pasien = stripslashes($_POST['id_pasien']);
	$keluhan = stripslashes($_POST['keluhan']);

	$sql = "INSERT INTO antrian (id_poli, id_pasien, keluhan, no_antrian)
			VALUES ('$id_poli', '$id_pasien', '$keluhan', '$no_antrian')";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$admin."dasbor");
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


	if( isset($_POST['get_datatable_pasien']) ){
		$data = [];
		$index = 0;
		$id_pasien = $_POST['id_pasien'];
        $pemeriksaan = mysqli_query($conn, "SELECT * FROM pemeriksaan WHERE id_pasien='$id_pasien'");
	    while($pem = mysqli_fetch_assoc($pemeriksaan)){
	    	$index++;
	        $data[] = 
	        	array(
		        	$pem['tgl_pemeriksaan'],
					datadokter_id($pem['id_dokter'], 'nama_dokter')."<br>(".poli($pem['id_poli']).")",
		        	keluhan($pem['id_antrian']),
					nl2br($pem['catatan']),
					nl2br($pem['resep_obat'])
	        	);
	    }
		$json = array("draw"=> 1, "recordsTotal"=> count($data), "recordsFiltered"=> count($data), "data"=> $data);
		header('content-type:application/json');
		echo json_encode($json);
	}












?>
