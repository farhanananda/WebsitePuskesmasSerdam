<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../config/DBconnect.php';

// menangkap data yang dikirim dari form



$nama_dokter = stripslashes($_POST['nama_dokter']);
$nomorhp = stripslashes($_POST['nomorhp']);
$tgl_lahir = stripslashes($_POST['tgl_lahir']);
$jenis_kelamin = stripslashes($_POST['jenis_kelamin']);
$poli = stripslashes($_POST['poli']);
$alamat = stripslashes($_POST['alamat']);

$username = preg_replace(" /\s+/", "", stripslashes($_POST['username']));
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$sql = "INSERT INTO user (username, password, role)
		VALUES ('$username', '$password', '2')";

if ($conn->query($sql) === TRUE) {

	$last_id = $conn->insert_id;
	$dokter = "INSERT INTO dokter (id_user, nama_dokter, nomorhp, tgl_lahir, jenis_kelamin, poli, alamat)
		VALUES ('$last_id', '$nama_dokter', '$nomorhp', '$tgl_lahir', '$jenis_kelamin', '$poli', '$alamat')";
	if ($conn->query($dokter) === TRUE) {
		$_SESSION['username'] = $username;
		$_SESSION['id_user'] = $last_id;
	    $_SESSION['status'] = "login_dokter";
	    header("Location: ".$admin_dokter."dasbor");
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();













// menyeleksi data admin dengan username dan passwordword yang sesuai
// $data = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
// $cek = mysqli_num_rows($data);

// if($cek > 0){
	// $_SESSION['username'] = $username;
 //    $_SESSION['status'] = "login";
 //    header("Location: ".$home."admin/dasbor");

    // echo "<h1>Login berhasil</h1>";
    // echo "<h1>Alhamdulillah</h1>";
    // echo "<h2>Klik <a href='session2.php'> di Sini (SESION2.php)</a> untuk menuju ke 
    // halaman pemeriksaan session";
// }else{
    // header("Location: ".$home."admin/");

	// header("location:index.php?pesan=gagal");
// }
?>