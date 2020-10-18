<?
  include "config/DBconnect.php";

  if(isset($_POST['poli_umum'])){
  	if(!empty($_POST['id_poli'])){
  		echo kode_poli(6).antrian_sekarang(6);
  	}else{
  		echo kode_poli($_POST['id_poli']).antrian_sekarang($_POST['id_poli']);
  	}
  }

  if(isset($_POST['poli_anak'])){
  	if(!empty($_POST['id_poli'])){
  		echo kode_poli(5).antrian_sekarang(5);
  	}else{
  		echo kode_poli($_POST['id_poli']).antrian_sekarang($_POST['id_poli']);
  	}
  }

  if(isset($_POST['poli_gizi'])){
  	if(!empty($_POST['id_poli'])){
  		echo kode_poli(4).antrian_sekarang(4);
  	}else{
  		echo kode_poli($_POST['id_poli']).antrian_sekarang($_POST['id_poli']);
  	}
  }

  if(isset($_POST['poli_gigi'])){
  	if(!empty($_POST['id_poli'])){
  		echo kode_poli(3).antrian_sekarang(3);
  	}else{
  		echo kode_poli($_POST['id_poli']).antrian_sekarang($_POST['id_poli']);
  	}
  }

  if(isset($_POST['get_poli'])){
	echo kode_poli($_POST['id_poli']).antrian_sekarang($_POST['id_poli']);
  }