<?
  include "../config/DBconnect.php";

  session_start();
  if( $_SESSION['status'] != "login" ){
      header("Location: ".$admin);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Puskesmas Sungai Raya Dalam | <?= $pagename ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $admin ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= $admin ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= $admin ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= $admin ?>plugins/jqvmap/jqvmap.min.css">

  <link rel="stylesheet" href="<?= $admin ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= $admin ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $admin ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= $admin ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= $admin ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= $admin ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<style type="text/css">
  .dt-button{font-family: "Source Sans Pro";}
  .dt-button span{margin-left: 5px;}
  .card-body{max-width: 100%;overflow: auto;}
</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    <? if( userlevel($_SESSION['id_user']) == "3" ){ ?>
<?
  $cek_antrian = mysqli_query($conn, "SELECT * FROM antrian WHERE id_pasien='".pasien(userid(), 'id_pasien')."' AND `status` = '0' ORDER BY id_antrian DESC");
  $antrian = mysqli_num_rows($cek_antrian);
  $nomor_antrian_pasien = mysqli_fetch_assoc($cek_antrian);


  if($antrian){
    echo '
      <li class="nav-item d-sm-inline-block">
        <b class="nav-link">'.poli($nomor_antrian_pasien['id_poli']).': '.kode_poli($nomor_antrian_pasien['id_poli']).$nomor_antrian_pasien['no_antrian'].'</b>
      </li>';
  }else{
    echo '
      <li class="nav-item d-sm-inline-block">
        <a href="'.$admin.'antri" class="nav-link">Ambil Nomor Antrian</a>
      </li>';
  }
?>
    <? } ?>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link sekarang">Loading...</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= $admin ?>logout">Logout</a>
      </li>
    </ul>
  </nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><b><?= $pagename ?></b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= $admin ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $pagename ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
