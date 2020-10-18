<?
  include "../config/DBconnect.php";

  session_start();
  if( $_SESSION['status'] != "master" ){
      header("Location: ".$master);
  }


  if( isset($_POST['pemeriksaan_pasien']) ){

	$id_pemeriksaan = stripslashes($_POST['id_pemeriksaan']);
	$catatan = stripslashes(trim($_POST['catatan']));
	$resep_obat = stripslashes(trim($_POST['resep_obat']));

	$sql = "UPDATE pemeriksaan SET catatan='$catatan', resep_obat='$resep_obat' WHERE id_pemeriksaan='$id_pemeriksaan'";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$master."dasbor");
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


if( isset($_POST['pasien_edit']) ){
	$id_pasien = stripslashes($_POST['id_pasien']);
	$nama_lengkap = stripslashes($_POST['nama_lengkap']);
	$nik = stripslashes($_POST['nik']);
	$nomor_hp = stripslashes($_POST['nomor_hp']);
	$tgl_lahir = stripslashes(date("Y-m-d", strtotime($_POST['tgl_lahir'])));
	$jenis_kelamin = stripslashes($_POST['jenis_kelamin']);
	$golongan_darah = stripslashes($_POST['golongan_darah']);
	$alamat = stripslashes($_POST['alamat']);

	$sql = "UPDATE pasien SET nama_lengkap='$nama_lengkap', nik='$nik', nomor_hp='$nomor_hp', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', golongan_darah='$golongan_darah', alamat='$alamat' WHERE id_pasien='$id_pasien'";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$master."pasien?id=".$id_pasien);
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if( isset($_POST['dokter_edit']) ){
	$id_dokter = stripslashes($_POST['id_dokter']);
	$nama_dokter = stripslashes($_POST['nama_dokter']);
	$nomorhp = stripslashes($_POST['nomorhp']);
	$tgl_lahir = stripslashes(date("Y-m-d", strtotime($_POST['tgl_lahir'])));
	$jenis_kelamin = stripslashes($_POST['jenis_kelamin']);
	$poli = stripslashes($_POST['poli']);
	$alamat = stripslashes($_POST['alamat']);

	$sql = "UPDATE dokter SET nama_dokter='$nama_dokter', nomorhp='$nomorhp', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', poli='$poli', alamat='$alamat' WHERE id_dokter='$id_dokter'";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$master."dokter?id=".$id_dokter);
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if( isset($_POST['poli_edit']) ){
	$id_poli = stripslashes($_POST['id_poli']);
	$nama_poli = stripslashes($_POST['nama_poli']);
	$jam_buka = stripslashes($_POST['jam_buka']);
	$jam_tutup = stripslashes($_POST['jam_tutup']);

	$sql = "UPDATE poli SET nama_poli='$nama_poli', jam_buka='$jam_buka', jam_tutup='$jam_tutup' WHERE id_poli='$id_poli'";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$master."poli?id=".$id_poli);
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if( isset($_POST['poli_tambah']) ){
	$nama_poli = stripslashes($_POST['nama_poli']);
	$jam_buka = stripslashes($_POST['jam_buka']);
	$jam_tutup = stripslashes($_POST['jam_tutup']);

	$sql = "INSERT INTO poli (nama_poli,jam_buka,jam_tutup) VALUES
	('$nama_poli','$jam_buka','$jam_tutup')";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$master."poli");
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if( isset($_POST['frontend_profil']) ){
	$judul = stripslashes($_POST['judul']);
	$deskripsi = stripslashes($_POST['deskripsi']);
	$profil = stripslashes($_POST['profil']);
    $foto = $_FILES['profil_image'];
	if( !empty($foto['name']) ){
		$upload_dir = '../image';
		if( move_uploaded_file($foto['tmp_name'], $upload_dir.'/'.clean_name($foto['name'])) && is_writable($upload_dir) ){
			correctImageOrientation($upload_dir.'/'.clean_name($foto['name']));
		}
		$profil_image = clean_name($foto['name']);
	}else{
		$profil_image = '';
	}

    $foto_puskesmas = $_FILES['foto_puskesmas'];
	if( !empty($foto_puskesmas['name']) ){
		$upload_dir = '../image';
		if( move_uploaded_file($foto_puskesmas['tmp_name'], $upload_dir.'/'.clean_name($foto_puskesmas['name'])) && is_writable($upload_dir) ){
			correctImageOrientation($upload_dir.'/'.clean_name($foto_puskesmas['name']));
		}
		$puskesmas_foto = clean_name($foto_puskesmas['name']);
	}else{
		$puskesmas_foto = '';
	}

	$sql = "INSERT INTO frontend (judul,deskripsi,profil,profil_image,foto_puskesmas) VALUES ('$judul','$deskripsi','$profil','$profil_image','$puskesmas_foto')";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$master."frontend");
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if( isset($_POST['frontend_profil_edit']) ){
	$judul = stripslashes($_POST['judul']);
	$deskripsi = stripslashes($_POST['deskripsi']);
	$profil = stripslashes($_POST['profil']);

	$get_old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT profil_image, foto_puskesmas FROM frontend WHERE id_frontend!='0' "));
    $foto = $_FILES['profil_image'];
	if( clean_name($foto['name']) != $get_old['profil_image'] ){
		if( !empty($foto['name']) ){
			$upload_dir = '../image';
			$uploads_foto = $upload_dir.'/'.$get_old['profil_image'];
            if (file_exists($uploads_foto)) {
                unlink($uploads_foto);
            }
			if( move_uploaded_file($foto['tmp_name'], $upload_dir.'/'.clean_name($foto['name'])) && is_writable($upload_dir) ){
				correctImageOrientation($upload_dir.'/'.clean_name($foto['name']));
			}
			$profil_image = clean_name($foto['name']);
		}else{
			$profil_image = (empty($get_old['profil_image']) ? '':$get_old['profil_image']);
		}
	}else{
		$profil_image = $foto['name'];
	}

    $foto_pus = $_FILES['foto_puskesmas'];
	if( clean_name($foto_pus['name']) != $get_old['foto_puskesmas'] ){
		if( !empty($foto_pus['name']) ){
			$upload_dir = '../image';
			$uploads_foto = $upload_dir.'/'.$get_old['foto_puskesmas'];
            if (file_exists($uploads_foto)) {
                unlink($uploads_foto);
            }
			if( move_uploaded_file($foto_pus['tmp_name'], $upload_dir.'/'.clean_name($foto_pus['name'])) && is_writable($upload_dir) ){
				correctImageOrientation($upload_dir.'/'.clean_name($foto_pus['name']));
			}
			$foto_puskesmas = clean_name($foto_pus['name']);
		}else{
			$foto_puskesmas = (empty($get_old['foto_puskesmas']) ? '':$get_old['foto_puskesmas']);
		}
	}else{
		$foto_puskesmas = $foto_pus['name'];
	}


	$sql = "UPDATE frontend SET judul='$judul',deskripsi='$deskripsi',profil='$profil',profil_image='$profil_image',foto_puskesmas='$foto_puskesmas' WHERE id_frontend!=0";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$master."frontend");
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


if( isset($_POST['frontend_galeri']) ){
	$title = $_POST['title'];
    $foto = $_FILES['image'];
	$values = [];
	if( !empty($foto['name']) ){
		$upload_dir = '../image/galeri';
		foreach( $foto['name'] as $n => $fotos ){
			if( move_uploaded_file($foto['tmp_name'][$n], $upload_dir.'/'.clean_name_datetime($foto['name'][$n])) && is_writable($upload_dir) ){
				correctImageOrientation($upload_dir.'/'.clean_name_datetime($foto['name'][$n]));
				array_push( $values, '(\''.clean_name_datetime($fotos).'\',\''.$title[$n].'\')' );
			}
		}
	}else{
		$values = '';
	}
	$value = implode(',',$values);
	$sql = "INSERT INTO frontend_galeri (`image`, title) VALUES $value";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$master."frontend_galeri?tambah");
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


if( isset($_POST['frontend_galeri_edit']) ){
	$id = $_POST['id_galeri'];
	$title = $_POST['title'];
    $foto = $_FILES['image'];

	$get_old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `image` FROM frontend_galeri WHERE id_galeri='$id' "));

	if( !empty($foto['name']) ){
		$upload_dir = '../image/galeri';
		$uploads_foto = $upload_dir.'/'.$get_old['image'];
		if (file_exists($uploads_foto)) {
			unlink($uploads_foto);
		}
		if( move_uploaded_file($foto['tmp_name'], $upload_dir.'/'.clean_name_datetime($foto['name'])) && is_writable($upload_dir) ){
			correctImageOrientation($upload_dir.'/'.clean_name_datetime($foto['name']));
		}
		$image = clean_name_datetime($foto['name']);
	}else{
		$image = $get_old['image'];
	}

	$sql = "UPDATE frontend_galeri SET title='$title',`image`='$image' WHERE id_galeri='$id'";
	if ($conn->query($sql) === TRUE) {
		header("Location: ".$master."frontend_galeri?id=".$id);
	}else{
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
}






// AJAX
if( isset($_POST['pasien_delete']) ){
	$sql = "DELETE FROM pasien WHERE id_pasien='".$_POST['id_pasien']."'";
	if ($conn->query($sql) === TRUE) {
		echo "1";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if( isset($_POST['dokter_delete']) ){
	$sql = "DELETE FROM dokter WHERE id_dokter='".$_POST['id_dokter']."'";
	if ($conn->query($sql) === TRUE) {
		echo "1";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if( isset($_POST['poli_delete']) ){
	$sql = "DELETE FROM poli WHERE id_poli='".$_POST['id_poli']."'";
	if ($conn->query($sql) === TRUE) {
		echo "1";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

if( isset($_POST['galeri_delete']) ){
	$id = $_POST['id_galeri'];
	$get_old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `image` FROM frontend_galeri WHERE id_galeri='$id' "));

	$photoname = '../image/galeri/'.$get_old['image'];
	if (file_exists($photoname)) {
		unlink($photoname);
	}

	$sql = "DELETE FROM frontend_galeri WHERE id_galeri='$id'";
	if ($conn->query($sql) === TRUE) {
		echo "1";
	}else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}




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
	    $antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE `status`='0' ");
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
        $pemeriksaan = mysqli_query($conn, "SELECT * FROM pemeriksaan");
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

	if( isset($_POST['get_datatable_pasien']) ){
		$data = [];
		$index = 0;
	    $antrian = mysqli_query($conn, "SELECT * FROM pasien ");
	    while($ant = mysqli_fetch_assoc($antrian)){
	    	$index++;
	        $data[] = 
	        	array(
		        	$ant['nama_lengkap'],
		        	$ant['jenis_kelamin']." / ".$ant['golongan_darah'],
		        	date('d/m/Y', strtotime($ant['tgl_lahir']))." (".usia_pasien($ant['id_pasien']).")",
		        	$ant['nomor_hp'],
					'<button class="custom" id="detail" data-id="'.$ant['id_pasien'].'">Detail</button>
					 <button class="custom" id="oke" data-id="'.$ant['id_pasien'].'">Edit</button>
		        	 <button class="custom" id="skip" data-id="'.$ant['id_pasien'].'">Hapus</button>'
	        	);
	    }
		$json = array("draw"=> 1, "recordsTotal"=> count($data), "recordsFiltered"=> count($data), "data"=> $data);
		header('content-type:application/json');
		echo json_encode($json);
	}

	if( isset($_POST['get_datatable_dokter']) ){
		$data = [];
		$index = 0;
	    $antrian = mysqli_query($conn, "SELECT * FROM dokter ");
	    while($ant = mysqli_fetch_assoc($antrian)){
	    	$index++;
	        $data[] = 
	        	array(
		        	$ant['nama_dokter'],
		        	poli($ant['poli']),
		        	$ant['jenis_kelamin'],
		        	$ant['nomorhp'],
					'<button class="custom" id="detail" data-id="'.$ant['id_dokter'].'">Detail</button>
		        	 <button class="custom" id="oke" data-id="'.$ant['id_dokter'].'">Edit</button>
		        	 <button class="custom" id="skip" data-id="'.$ant['id_dokter'].'">Hapus</button>'
	        	);
	    }
		$json = array("draw"=> 1, "recordsTotal"=> count($data), "recordsFiltered"=> count($data), "data"=> $data);
		header('content-type:application/json');
		echo json_encode($json);
	}

	if( isset($_POST['get_datatable_pasien_detail']) ){
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

	if( isset($_POST['get_datatable_dokter_detail']) ){
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


	if( isset($_POST['get_datatable_poli']) ){
		$data = [];
		$index = 0;
	    $antrian = mysqli_query($conn, "SELECT * FROM poli ");
	    while($ant = mysqli_fetch_assoc($antrian)){
	    	$index++;
	        $data[] = 
	        	array(
		        	$ant['nama_poli'],
		        	dokters_by_poli($ant['id_poli']),
		        	date('H:i', strtotime($ant['jam_buka'])),
		        	date('H:i', strtotime($ant['jam_tutup'])),
					'<button class="custom" id="detail" data-id="'.$ant['id_poli'].'">Detail</button>
		        	 <button class="custom" id="oke" data-id="'.$ant['id_poli'].'">Edit</button>
		        	 <button class="custom" id="skip" data-id="'.$ant['id_poli'].'">Hapus</button>'
	        	);
	    }
		$json = array("draw"=> 1, "recordsTotal"=> count($data), "recordsFiltered"=> count($data), "data"=> $data);
		header('content-type:application/json');
		echo json_encode($json);
	}

	if( isset($_POST['get_datatable_poli_detail']) ){
		$data = [];
		$index = 0;
		$id_poli = $_POST['id_poli'];
        $pemeriksaan = mysqli_query($conn, "SELECT * FROM pemeriksaan WHERE id_poli='$id_poli'");
        while($pem = mysqli_fetch_assoc($pemeriksaan)){
	    	$index++;
	        $data[] = 
	        	array(
		        	$pem['tgl_pemeriksaan'],
		        	datapasien($pem['id_pasien'], "nama_lengkap"),
		        	datadokter_id($pem['id_pasien'], "nama_dokter"),
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

	if( isset($_POST['get_datatable_galeri']) ){
		$data = [];
		$index = 0;
        $galeri = mysqli_query($conn, "SELECT * FROM frontend_galeri");
        while($pem = mysqli_fetch_assoc($galeri)){
	    	$index++;
	        $data[] = 
	        	array(
					$index,
					$pem['title'],
					$pem['image'],
					date('d/m/Y H:i:s', strtotime($pem['tanggal_upload'])),
		        	'<button class="custom" id="oke" data-id="'.$pem['id_galeri'].'">Edit</button>
		        	 <button class="custom" id="skip" data-id="'.$pem['id_galeri'].'">Hapus</button>'					
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
