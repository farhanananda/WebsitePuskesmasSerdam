<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../config/DBconnect.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username yang sesuai
$data = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND role='2'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

// mengambil password hash dari DB
$get_password = mysqli_fetch_assoc($data);
	$id_user = $get_password['id_user'];

	// decrypt dan verifikasi password hash
	$hash = $get_password['password'];
	if( password_verify($password, $hash) && ($cek > 0) ) {
		$_SESSION['username'] = $username;
		$_SESSION['id_user'] = $id_user;
	    $_SESSION['status'] = "login_dokter";
	    header("Location: ".$admin_dokter."dasbor");
	} else {
	    header("Location: ".$admin_dokter);
	}

?>