<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../config/DBconnect.php';

// menangkap data yang dikirim dari form



$nama_lengkap = $_POST['nama_lengkap'];
$nik = $_POST['nik'];
$nomor_hp = $_POST['nomor_hp'];
$tgl_lahir = $_POST['tgl_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$golongan_darah = $_POST['golongan_darah'];
$alamat = $_POST['alamat'];

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$sql = "INSERT INTO user (username, password, role)
		VALUES ('$username', '$password', '3')";

if ($conn->query($sql) === TRUE) {

	$last_id = $conn->insert_id;
	$pasien = "INSERT INTO pasien (id_user, nama_lengkap, nik, nomor_hp, tgl_lahir, jenis_kelamin, golongan_darah, alamat)
		VALUES ('$last_id', '$nama_lengkap', '$nik', '$nomor_hp', '$tgl_lahir', '$jenis_kelamin', '$golongan_darah', '$alamat')";
	if ($conn->query($pasien) === TRUE) {
		$_SESSION['username'] = $username;
		$_SESSION['id_user'] = $last_id;
	    $_SESSION['status'] = "login";
	    header("Location: ".$home."admin/dasbor");
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