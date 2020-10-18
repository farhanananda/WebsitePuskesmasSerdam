<?php
	// error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');

	$home = "http://localhost/puskesmas/";
	$admin = $home."admin/";
	$admin_dokter = $home."admin_dokter/";
	$master = $home."master/";
	$image_dir = $home."image/";
	$galeri_dir = $home."image/galeri/";

function userid(){
	return $_SESSION['id_user'];
}

function userlevel($username){
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$username'");
	$user = mysqli_fetch_assoc($data);
	return $user['role'];
	// role 1 = Admin
	// role 2 = Dokter
	// role 3 = Pasien
}


// PASIEN
function nama_lengkap($username){
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM pasien WHERE id_user='$username'");
	$nama = mysqli_fetch_assoc($data);
	return $nama['nama_lengkap'];
}

function pasien($id, $row){
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM pasien WHERE id_user='$id'");
	$nama = mysqli_fetch_assoc($data);
	return $nama[$row];
}

function datapasien($id, $row){
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM pasien WHERE id_pasien='$id'");
	$nama = mysqli_fetch_assoc($data);
	return $nama[$row];
}

function usia_pasien($id){
	global $conn;

	// tahun dan bulan sekarang dikurang tahun dan bulan di tanggal_lahir
	// format mmddyyyy

	$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pasien WHERE id_pasien='$id'"));
	$lahir = date("m/d/Y", strtotime($data['tgl_lahir']));


	// $lahir = "12/17/1992";
	$lahir = explode("/", $lahir);
	$umur = (date("md", date("U", mktime(0, 0, 0, $lahir[0], $lahir[1], $lahir[2]))) > date("md") ? ((date("Y") - $lahir[2]) - 1) : (date("Y") - $lahir[2]));
	return $umur." tahun";

	// $data = mysqli_query($conn, "SELECT * FROM pasien WHERE id_user='$id'");
	// $nama = mysqli_fetch_assoc($data);
	// return $nama[$row];	
}

// DOKTER
function dokter($id){
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM dokter WHERE id_user='$id'");
	$nama = mysqli_fetch_assoc($data);
	return $nama['nama_dokter'];
}

function datadokter($id, $row){
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM dokter WHERE id_user='$id'");
	$nama = mysqli_fetch_assoc($data);
	return $nama[$row];
}

function datadokter_id($id, $row){
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM dokter WHERE id_dokter='$id'");
	$nama = mysqli_fetch_assoc($data);
	return $nama[$row];
}

function nama_dokter($username){
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM dokter WHERE id_user='$username'");
	$nama = mysqli_fetch_assoc($data);
	return $nama['nama_dokter'];
}


function id_poli_dokter($id){
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM dokter WHERE id_user='$id'");
	$nama = mysqli_fetch_assoc($data);
	return $nama['poli'];
}

function poli($id){
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM poli WHERE id_poli='$id'");
	$nama = mysqli_fetch_assoc($data);
	return $nama['nama_poli'];	
}

function keluhan($id){
	global $conn;
	$data = mysqli_query($conn, "SELECT * FROM antrian WHERE id_antrian='$id'");
	$nama = mysqli_fetch_assoc($data);
	return $nama['keluhan'];
}

function kode_poli($id){
	switch ($id) {
		case '6':
			$kode = 'A'; // Poli Umum
			break;
		case '5':
			$kode = 'B'; // Poli Anak
			break;		
		case '4':
			$kode = 'C'; // Poli Gizi
			break;		
		case '3':
			$kode = 'D'; // Poli Gigi
			break;		
		default:
			$kode = '0';
			break;
	}
	return $kode;
}

function antrian_sekarang($id_poli){
	global $conn;
	$antrian_sekarang = mysqli_query($conn, "SELECT * FROM antrian WHERE id_poli='$id_poli' AND `status` = '0' ORDER BY id_antrian ASC");
	$antrian_pasien = mysqli_num_rows($antrian_sekarang);
	$sekarang = mysqli_fetch_assoc($antrian_sekarang);
	return (!$antrian_pasien ? '0000' : $sekarang['no_antrian']);
}

function dokters_by_poli($id_poli){
	global $conn;
	$poli = [];
	$query = mysqli_query($conn, "SELECT * FROM dokter WHERE poli='$id_poli'");
	while($qry = mysqli_fetch_assoc($query)){
		array_push($poli, $qry['nama_dokter']  );
	}
	return implode("<br>", $poli);
}


	function clean_name($string, $ext='.jpg'){
		//get file type
		$exp = explode('.', strtolower($string));
		$count_char = substr_count(strtolower($string), '.');
		$ext = $exp[$count_char];

		$replace = '-';         
		$string = strtolower($string);     
		//replace / and . with white space     
		$string = preg_replace("/[\/\.]/", " ", $string);     
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
		//remove multiple dashes or whitespaces     
		$string = preg_replace("/[\s-]+/", " ", $string);     
		//convert whitespaces and underscore to $replace     
		$string = preg_replace("/[\s_]/", $replace, $string);     
		//limit the slug size     
		$string = substr($string, 0, 100);     
		//text is generated
		// return ($ext) ? date("His")."-".substr($string, 0, -4).".".$ext : date("His")."-".$string; 
		return ($ext) ? "puskesmas-".substr($string, 0, -4).".".$ext : date("His")."-".$string; 
	}

	function clean_name_datetime($string, $ext='.jpg'){
		//get file type
		$exp = explode('.', strtolower($string));
		$count_char = substr_count(strtolower($string), '.');
		$ext = $exp[$count_char];

		$replace = '-';         
		$string = strtolower($string);     
		//replace / and . with white space     
		$string = preg_replace("/[\/\.]/", " ", $string);     
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     
		//remove multiple dashes or whitespaces     
		$string = preg_replace("/[\s-]+/", " ", $string);     
		//convert whitespaces and underscore to $replace     
		$string = preg_replace("/[\s_]/", $replace, $string);     
		//limit the slug size     
		$string = substr($string, 0, 100);     
		//text is generated
		// return ($ext) ? date("His")."-".substr($string, 0, -4).".".$ext : date("His")."-".$string; 
		return ($ext) ? "puskesmas-".date('Ymdhis')."-".substr($string, 0, -4).".".$ext : date("His")."-".$string; 
	}

	// Correct Image Orientation
	// Usually Image From Mobile Phone
	function correctImageOrientation($filename) {
		if (function_exists('exif_read_data')) {
			$exif = exif_read_data($filename);
			if(is_array($exif) && isset($exif['Orientation'])) {
			$orientation = $exif['Orientation'];
			if($orientation != 1){
				$img = imagecreatefromjpeg($filename);
				$deg = 0;
				switch ($orientation) {
				case 3:
					$deg = 180;
					break;
				case 6:
					$deg = 270;
					break;
				case 8:
					$deg = 90;
					break;
				}
				if ($deg) {
				$img = imagerotate($img, $deg, 0);        
				}
				// then rewrite the rotated image back to the disk as $filename 
				imagejpeg($img, $filename, 95);
			} // if there is some rotation necessary
			} // if have the exif orientation info
		} // if function exists      
	}
	// check exif online: http://exif.regex.info/exif.cgi
	// function source: https://obrienmedia.co.uk/blog/fixing-photo-orientation-on-images-uploaded-via-php-from-ios-devices

		function statistik(){
			global $conn;
			$datetime = date('Y-m-d H:i:s');
			$sql = "INSERT INTO statistik (`datetime`) VALUES ('$datetime') ";
			if ($conn->query($sql) === TRUE) {
				// sukses
			}else{
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}

		function stats($cond = 'all'){
			global $conn;
			if($cond == 'd'){
				$stats = mysqli_num_rows(mysqli_query($conn, "SELECT id_stats FROM statistik WHERE DAY(datetime) = DAY(NOW()) AND MONTH(datetime) = MONTH(NOW()) AND YEAR(datetime) = YEAR(NOW()) "));
			}else if($cond == 'm'){
				$stats = mysqli_num_rows(mysqli_query($conn, "SELECT id_stats FROM statistik WHERE MONTH(datetime) = MONTH(NOW()) AND YEAR(datetime) = YEAR(NOW()) "));
			}else if($cond == 'y'){
				$stats = mysqli_num_rows(mysqli_query($conn, "SELECT id_stats FROM statistik WHERE YEAR(datetime) = YEAR(NOW()) "));
			}else{
				$stats = mysqli_num_rows(mysqli_query($conn, "SELECT id_stats FROM statistik "));
			}
			return $stats;
		}

?>