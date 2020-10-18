<? include "config/DBconnect.php"; ?>
<?= statistik() ?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Puskesmas Sungai Raya Dalam</title>
  <!-- Plugins CSS -->
  <link rel="stylesheet" href="<?= $home ?>plugins/bootstrap-4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $home ?>plugins/meanmenu/meanmenu.css">
  <link rel="stylesheet" href="<?= $home ?>plugins/slick-1.8.1/slick.css">
  <link rel="stylesheet" href="<?= $home ?>plugins/fancybox-master/jquery.fancybox.min.css">
  <link rel="stylesheet" href="<?= $home ?>plugins/aos-animation/aos.css">
  <!-- fonts -->
  <link rel="stylesheet" href="<?= $home ?>fonts/ep-icon-fonts/css/style.css">
  <link rel="stylesheet" href="<?= $home ?>fonts/fontawesome-5/css/all.min.css">
  <!-- Custom Stylesheet -->
  <link rel="stylesheet" href="<?= $home ?>css/settings.css">
  <link rel="stylesheet" href="<?= $home ?>css/style.css">
</head>

<?
  $pro = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM frontend"));
?>

<body>
<div class="site-wrapper">
<!-- Header Starts -->
  <header class="site-header position-relative">
        <div class="container">
            <div class="row justify-content-center align-items-center position-relative">
                <div class="col-sm-3 col-6 col-lg-2 col-xl-2 order-lg-1">
                  <!-- Brand Logo -->
                    <div class="brand-logo">
                        <a href="<?= $home ?>"><img src="<?= $home ?>image/main-logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8 col-lg-2 col-xl-2 d-none d-sm-block order-lg-3">
                    <div class="header-btns justify-content-end">
                        <a href="<?php echo $admin ?>" class="btn btn-link">Pendaftaran</a>
                    </div>
                </div>
                <!-- Menu Block -->
                <div class="col-sm-1 col-6 col-lg-6 col-xl-6 offset-lg-2  position-static order-lg-2">
                  <div class="mobile-menu"></div>
                </div> 
                <!--     <div class="main-navigation">
                        <ul class="main-menu">
                          
                            <li class="menu-item "><a href="#features">Profil</a></li>

                        </ul>
                    </div>
                    <div class="mobile-menu"></div>-->
            </div>
        </div>
        <div class="shape-holder header-shape" data-aos="fade-down" data-aos-once="true"><img src="<?= $home ?>image/header-shape.svg" alt=""></div>
  </header>

<!-- Hero-Area -->
<div class="hero-area position-relative">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-7 col-12">
        <div class="hero-content">
          <h1><?= $pro['judul'] ?></h1>
          <p>"<?= $pro['deskripsi'] ?>"</p>
        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-5 col-12">
        <div class="hero-media">
          <img src="<?= $image_dir.$pro['foto_puskesmas'] ?>" alt="">
        </div>
      </div>
    </div>
  </div>
  <div class="shape-holder hero-shape" data-aos="fade-right" data-aos-once="true"><img src="<?= $home ?>image/hero-orange-shape.svg" alt=""></div>
</div>





<!-- Facts Section -->
<section class="facts-section">
  <div class="container">
    <div class="position-relative">
      <div class="fact-absolute">
          <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-8 mb--35  text-center">
                <h2>Antrian Layanan</h2>
              </div>
            </div>
            <div class="row justify-content-center space-db--30">
                <div class="col-md-6 col-lg-3 mb--30" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                        <div class="fact-card" >
                          <div class="card-content">
                            <span class="number" id="poli-umum"><?= kode_poli(6).antrian_sekarang(6) ?></span>
                            <p class="info">POLI UMUM</p>
                          </div>
                
                          <div class="card-icon">
                            <img src="<?= $home ?>image/users-wm.png" alt="">
                          </div>
                        </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb--30" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true" data-aos-delay="200">
                        <div class="fact-card" >
                          <div class="card-content">
                            <span class="number" id="poli-anak"><?= kode_poli(5).antrian_sekarang(5) ?></span>
                            <p class="info">POLI ANAK</p>
                          </div>
                
                          <div class="card-icon">
                            <img src="<?= $home ?>image/fact-2.png" alt="">
                          </div>
                        </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb--30" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true" data-aos-delay="400">
                        <div class="fact-card" >
                          <div class="card-content">
                            <span class="number" id="poli-gizi"><?= kode_poli(4).antrian_sekarang(4) ?></span>
                            <p class="info">POLI GIZI</p>
                          </div>
                
                          <div class="card-icon">
                            <img src="<?= $home ?>image/fact-3.png" alt="">
                          </div>
                        </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb--30" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true" data-aos-delay="600">
                        <div class="fact-card" >
                          <div class="card-content">
                            <span class="number" id="poli-gigi"><?= kode_poli(3).antrian_sekarang(3) ?></span>
                            <p class="info">POLI GIGI</p>
                          </div>
                
                          <div class="card-icon">
                            <img src="<?= $home ?>image/fact-4.png" alt="">
                          </div>
                        </div>
                </div>
            </div>
      </div>
    </div>
  </div>


</section>





<!-- Course section -->
<section class="course-section position-relative">
  <div class="shape-holder">
    <img src="<?= $home ?>image/section-2-shape-bg.svg" alt="">
  </div>
  <div class="shape-holder" data-aos="zoom-in"  data-aos-once="true">
    <img src="<?= $home ?>image/section-2-shape.svg" alt="">
  </div>
  <div class="shape-holder course-shape-3" data-aos="zoom-in-left" data-aos-once="true">
    <img src="<?= $home ?>image/course-yelloow-svg.svg" alt="">
  </div>
  <div class="container pt-lg--85">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title section-black">
          <h2>Apa Yang Bisa Kami Bantu?</h2>
          <p>Silahkan lakukan pendaftaran layanan online, melalui menu <a href="<?php echo $admin ?>" class="btn btn-link">Pendaftaran Pasien</a></p>
        </div>
      </div>
    </div>
  </div>
</section>





<section class="facts-section">


  <div class="container">
    <div class="position-relative">
      <div class="fact-absolute">
          <div class="row justify-content-center">
              <div class="col-xl-7 col-lg-8 mb--35  text-center">
                <span class="fact-text">STATISTIK PENGUNJUNG PUSKESMAS</span>
              </div>
            </div>
            <div class="row justify-content-center space-db--30">
                <div class="col-md-6 col-lg-3 mb--30" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                        <div class="fact-card" >
                          <div class="card-content">
                            <span class="number"><?= stats('d') ?></span>
                            <p class="info">Hari Ini</p>
                          </div>
                
                          <div class="card-icon">
                            <img src="<?= $home ?>image/users-wm.png" alt="">
                          </div>
                        </div>
                </div>
                                
                <div class="col-md-6 col-lg-3 mb--30" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true" data-aos-delay="200">
                        <div class="fact-card" >
                          <div class="card-content">
                            <span class="number"><?= stats('m') ?></span>
                            <p class="info">Bulan Ini</p>
                          </div>
                
                          <div class="card-icon">
                            <img src="<?= $home ?>image/users-wm.png" alt="">
                          </div>
                        </div>
                </div>
                
                <div class="col-md-6 col-lg-3 mb--30" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true" data-aos-delay="400">
                        <div class="fact-card" >
                          <div class="card-content">
                            <span class="number"><?= stats('y') ?></span>
                            <p class="info">Tahun Ini</p>
                          </div>
                
                          <div class="card-icon">
                            <img src="<?= $home ?>image/users-wm.png" alt="">
                          </div>
                        </div>
                </div>

                <div class="col-md-6 col-lg-3 mb--30" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true" data-aos-delay="600">
                        <div class="fact-card" >
                          <div class="card-content">
                            <span class="number"><?= stats() ?></span>
                            <p class="info">Selamanya</p>
                          </div>
                
                          <div class="card-icon">
                            <img src="<?= $home ?>image/users-wm.png" alt="">
                          </div>
                        </div>
                </div>


            </div>
      </div>
    </div>
  </div>

</section>







<!-- Aurthor Starts -->
<div class="aurthor-section">
  <div class="container">
    <div class="row  spacing-bottom mb--10">
      <div class=" col-lg-5 col-md-4" data-aos="zoom-in-right"  data-aos-once="true" data-aos-delay="55" data-aos-duration="1500">
        <div class="aurthor-image">
          <img src="<?= $image_dir.$pro['profil_image'] ?>" alt="">
        </div>
      </div>

      <div class="col-lg-6 offset-md-1 col-md-6" data-aos="zoom-in-left"  data-aos-once="true" data-aos-delay="55" data-aos-duration="1500">
        <div class="aurthor-content">
          <h2>Profil Puskesmas</h2>
          <p><?= $pro['profil'] ?></p>
        </div>
      </div>
    </div>
    <span class="section-devider"></span>
  </div>
</div>

<!-- Testimonial Starts -->
<section class="testimonial-section position-relative">
  <div class="container">
      <div class="row">
          <div class="col-lg-7 col-xl-6">
              <h2 class="">Galeri Foto</h2>
          </div>
      </div>


      <div class="testimonial-slider-wrapper">
          <div class="slider-btns"></div>
          <div class="testimonial-slider">

<?
  $index = 0;
  $galeri = mysqli_query($conn, "SELECT * FROM frontend_galeri ORDER BY id_galeri DESC");
  while($gal = mysqli_fetch_assoc($galeri)){
    $index++;
    if( $index > 1 ){
      $delay = 200*$index;
      echo '   <div class="single-slide" data-aos="fade-up" data-aos-duration="2000" data-aos-once="true" data-aos-delay="'.$delay.'">';
    }else{
      echo '   <div class="single-slide" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">';
    }
?>
                  <div class="testimonial-card">
                      <div class="image">
                          <img src="<?= $galeri_dir.$gal['image'] ?>" alt="">
                      </div>
                      <div class="content">
                          <h4><?= $gal['title'] ?></h4>
                          <span class="d-block"><?= date('d M Y', strtotime($gal['tanggal_upload'])) ?></span>
                      </div>
                  </div>
              </div>
<? } ?>

          </div>
      
      </div>
  </div>
  <div class="shape-holder testimonial-shape" data-aos="zoom-in-left" data-aos-once="true"><img src="<?= $home ?>image/testimonial-shape.svg" alt=""></div>
</section>


<!-- FAQ Section -->
<section class="faq-section position-relative">
  <div class="container">
  <!-- faq accordionExample -->
  <div class="faq-accordion">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="section-title"><h2>Persyaratan Pelayanan</h2></div>
  
        <div class="accordion faq-accordion space-db--10" id="accordionExample2">
          <div class="single-faq mb--10" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
            <button class="faq-head" type="button" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="faq1">
              <h2>Syarat Pelayanan Umum</h2>
              <i class="icon icon-minimal-down"></i>
            </button>
        
            <div id="faq1" class="collapse show" aria-labelledby="faq-heading1" data-parent="#accordionExample2">
              <div class="faq-body">
                <p>1. Membawa Kartu Identitas KTP/KK (Asli / Foto Copy)</p>
                <p>2. Membawa Kartu Berobat Puskesmas</p>
                <p>3. Mengambil Nomor Antrian  Sesuai jenis Layanan Yang Dibutuhkan (Poli Umum, Poli Gigi, Imunisasi, KIA/KB, Lansia)</p>
                <p>4. Menyerahkan Nomor Antrian Dan Identitas Di Tempat Yang Telah Disediakan Setelah dipanggil Oleh Petugas</p>
              </div>
            </div>
          </div>
          <div class="single-faq mb--10" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" data-aos-delay="200" data-aos-once="true">
                <button class="faq-head collapsed" type="button" data-toggle="collapse" data-target="#faq2" aria-expanded="true" aria-controls="faq2">
                  <h2>Syarat Pelayanan BPJS</h2>
                  <i class="icon icon-minimal-down"></i>
                </button>
        
            <div id="faq2" class="collapse" aria-labelledby="faq-heading2" data-parent="#accordionExample2">
              <div class="faq-body">
                <p>1. Membawa Kartu Identitas KTP/KK (Asli / Foto Copy)</p>
                <p>2. Membawa Kartu BPJS</p>
                <p>3. Mengambil Nomor Antrian  Sesuai jenis Layanan Yang Dibutuhkan (Poli Umum, Poli Gigi, Imunisasi, KIA/KB, Lansia)</p>
                <p>4. Menyerahkan Nomor Antrian Dan Identitas Di Tempat Yang Telah Disediakan Setelah dipanggil Oleh Petugas</p>
              </div>
              
            </div>
          </div>
          <div class="single-faq mb--10" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" data-aos-delay="400">
                <button class="faq-head collapsed" type="button" data-toggle="collapse" data-target="#faq3" aria-expanded="true" aria-controls="faq3">
                  <h2>Syarat Pembuatan Surat Keterangan Dokter</h2>
                  <i class="icon icon-minimal-down"></i>
                </button>
        
            <div id="faq3" class="collapse" aria-labelledby="faq-heading3" data-parent="#accordionExample2">
              <div class="faq-body">
                <p>1. Membawa Kartu Identitas KTP/KK (Asli / Foto Copy)</p>
                <p>2. Membawa Pas Foto Ukuran 3x4 Sebanyak 2 Lembar</p>
                <p>3. Mengambil Nomor Antrian Warna Hijau (poli Umum)</p>
                <p>4. Tidak Dapat Di Wakilkan</p>
              </div>
              
            </div>
          </div>
          <div class="single-faq mb--10" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" data-aos-delay="600">
                <button class="faq-head collapsed" type="button" data-toggle="collapse" data-target="#faq4" aria-expanded="true" aria-controls="faq4">
                  <h2>Persyaratan Mendapatkan Pelayanan Online</h2>
                  <i class="icon icon-minimal-down"></i>
                </button>
        
            <div id="faq4" class="collapse" aria-labelledby="faq-heading4" data-parent="#accordionExample2">
              <div class="faq-body">
                <p>1. KTP/KK Masyarakat Kubu Raya</p>
                <p>2. Bagi Anak Di Bawah Umur < 17 Tahun Dapat Menunjukkan Akte Lahir, KK, Kartu Identitas</p>
                <p>3. Anak (KIA) Dan Kartu Pelajar. Bayi Yang Baru Lahir Dapat Menunjukkan Surat Keterangan Lahir Di Sertai KK/KTP Ibu</p>
                <p>4. Bagi Pasien Gangguan Jiwa / Penduduk Yang Sedang Dalam Proses Pemindahan Alamat / Domisili Dapat Menunjukkan Surat keterangan Domisili Dari Kantor Desa Setempat </p>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>



<!-- Footer Section -->
<div class="footer-section position-relative" style="padding-top: 0;">
  <div class="container margin-decrese">
  
      <div class="row mt--70">
          <div class="col-lg-4 col-xl-4 col-sm-6 col-margin">
              <span class="ft-title-sm">Waktu Layanan</span>
              <div class="row">
                <div class="col-lg-12 col-12">
                    <ul class="footer-list">
<?
  $poli = mysqli_query($conn, "SELECT * FROM poli ORDER BY id_poli DESC");
  while($pol = mysqli_fetch_assoc($poli)){
    echo '<li><a href=""><b>'.$pol['nama_poli'].'</b>: '.date('H:i', strtotime($pol['jam_buka'])).'-'.date('H:i', strtotime($pol['jam_tutup'])).' '.( date('Hi') > date('Hi', strtotime($pol['jam_buka'])) && date('Hi') < date('Hi', strtotime($pol['jam_tutup'])) ? '':'<b>(Tutup)</b>').'</a></li>';
  }
?>
                      </ul>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-xl-3 col-sm-6 col-margin">
              <!-- <span class="ft-title-sm">Product</span>
              <ul class="footer-list">
                <li><a href="">Essential Landing Page</a></li>
                <li><a href="">Alpha Dashboard Pro</a></li>
                <li><a href="">Karnel Admin Dashboard</a></li>
                <li><a href="">Gray UI Kit</a></li>
              </ul> -->
          </div>
          <div class="col-lg-5 col-xl-5 col-margin">
            <div class="ft-newsletter-box">
                <span class="ft-title-sm"><?= $pro['judul'] ?></span>
                <p>"<?= $pro['deskripsi'] ?>"</p>
                <p>Copyright (c) 2020. All rights reserved.</p>
            </div>
          </div>
        </div>
  </div>
  <div class="shape-holder footer-shape-1" data-aos="zoom-in-left" data-aos-once="true"><img src="<?= $home ?>image/cta-shape.svg" alt=""></div>
  <div class="shape-holder footer-shape-2" data-aos="zoom-in-right" data-aos-once="true"><img src="<?= $home ?>image/footer-shape.svg" alt=""></div>
</div>
</div>
  <!-- Vendor JS-->
  <script src="<?= $home ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?= $home ?>plugins/jquery/jquery-migrate.min.js"></script>
  <script src="<?= $home ?>plugins/bootstrap-4.3.1/js/bootstrap.bundle.js"></script>

  <!-- Plugins JS -->
  <script src="<?= $home ?>plugins/meanmenu/jquery.meanmenu.js"></script>
  <script src="<?= $home ?>plugins/slick-1.8.1/slick.min.js"></script>
  <script src="<?= $home ?>plugins/fancybox-master/jquery.fancybox.min.js"></script>
  <script src="<?= $home ?>plugins/aos-animation/aos.js"></script>

  <script src="<?= $admin ?>plugins/moment/moment.min.js"></script>
  <script src="<?= $admin ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

  <!-- Custom JS -->
  <script src="<?= $home ?>js/active.js?v=<?= rand() ?>"></script>

<script>
url = '<?= $home ?>';
$(function () {
  // window.setTimeout("waktu()", 1000);
  window.setTimeout("allpoli()", 1000);
  

})
  function waktu(){
    let current = moment();
    let currenttime = current.format("DD MMMM YYYY HH:mm:ss");
    setTimeout( "waktu()", 1000 )
    $('.sekarang').html(currenttime);
  }

  function allpoli(){
    setTimeout( "allpoli()", 1000 )
    // $('.sekarang').html(currenttime);
    poli_umum()
    poli_anak()
    poli_gizi()
    poli_gigi()
  }


  function poli_umum(id_poli=6){
    // $('#poli-umum').html('Load..')
    $.post(url+"ajax",
    {
      get_poli: "",
      id_poli: id_poli
    },
    function(data, status){
      $('#poli-umum').html(data)
      //   alert("Error: " + data + "\nStatus: " + status);
    });
  }

  function poli_anak(id_poli=5){
    // $('#poli-anak').html('Load..')
    $.post(url+"ajax",
    {
      get_poli: "",
      id_poli: id_poli
    },
    function(data, status){
      $('#poli-anak').html(data)
      //   alert("Error: " + data + "\nStatus: " + status);
    });
  }

  function poli_gizi(id_poli=4){
    // $('#poli-gizi').html('Load..')
    $.post(url+"ajax",
    {
      get_poli: "",
      id_poli: id_poli
    },
    function(data, status){
      $('#poli-gizi').html(data)
      //   alert("Error: " + data + "\nStatus: " + status);
    });
  }

  function poli_gigi(id_poli=3){
    // $('#poli-gigi').html('Load..')
    $.post(url+"ajax",
    {
      get_poli: "",
      id_poli: id_poli
    },
    function(data, status){
      $('#poli-gigi').html(data)
      //   alert("Error: " + data + "\nStatus: " + status);
    });
  }


</script>
</body>

</html>
