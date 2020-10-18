<?php 
error_reporting(0);
include "../config/DBconnect.php";

session_start();
if( $_SESSION['status'] == "master" ){
    header("Location: ".$master."dasbor");

// }else {
    // die("Anda Belum Login Silahkan Login Terlebih Dahulu.<a href ='index.php'>Login</a>");
    // header("Location: ".$home."admin/");
// die();
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Puskesmas Sungai Raya Dalam</title>
      <!-- Meta tags -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="Grass login & Sign up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
         />
      <script>
         addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
      </script>
      <!-- Meta tags -->
      <!-- font-awesome icons -->
      <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
      <!-- //font-awesome icons -->
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//style sheet end here-->
      <link href="//fonts.googleapis.com/css?family=Barlow:300,400,500" rel="stylesheet">
   </head>
   <body>
      <h1 class="header-w3ls">
         Puskesmas Sungai Raya Dalam
      </h1>
      <div class="art-bothside">
         <div class="sap_tabs">
            <div id="horizontalTab">
               <ul class="resp-tabs-list">
                  <li class="resp-tab-item"><span>Login</span></li>
                  <!-- <li class="resp-tab-item"><span>Daftar</span></li> -->
               </ul>
               <div class="clearfix"> </div>
               <div class="resp-tabs-container">
                  <div class="tab-1 resp-tab-content">
                     <div class="swm-right-w3ls">
                        <form action="<?= $master ?>login" method="post">
                           <div class="main">
                              <div class="icon-head-wthree">
                                 <h2>Login</h2>
                              </div>
                              <div class="form-left-to-w3l">
                                 <input type="text" name="username" placeholder="Username" required="">
                              </div>
                              <div class="form-right-w3ls">
                                 <input type="password" name="password" placeholder="Password" required="">
                              </div>
                              <div class="btnn">
                                 <button type="submit">Login</button><br>
                                 <a href="#" class="for">Lupa Password?</a>  
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
<!--       <div class="social-icons">
         <ul>
            <li>
               <a href="#">
               <span class="fab fa-facebook-f"></span>
               </a>
            </li>
            <li>
               <a href="#">
               <span class="fab fa-google-plus-g"></span>
               </a>
            </li>
            <li>
               <a href="#">
               <span class="fab fa-twitter"></span>
               </a>
            </li>
         </ul>
      </div> -->
      <div class="copy">
      </div>
      <!--js working-->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!--//js working-->
      <script src="js/easyResponsiveTabs.js"></script>
      <script>
         $(document).ready(function () {
         	$('#horizontalTab').easyResponsiveTabs({
         		type: 'default', //Types: default, vertical, accordion           
         		width: 'auto', //auto or any width like 600px
         		fit: true // 100% fit in a container
         	});
         });
      </script>
   </body>
</html>