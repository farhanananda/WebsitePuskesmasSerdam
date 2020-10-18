<?php
session_start();
if(isset($_SESSION['username'])){
    unset($_SESSION);
    session_destroy();
	include "../config/DBconnect.php";
    header("Location: ".$home."admin/");
}