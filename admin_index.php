<?php
require_once 'App/sys_login.php';
require_once 'App/sys_artist.php';
require_once 'App/sys_album.php';
require_once 'App/sys_track.php';
$sys_login = new App\sys_login();
$sys_artist = new App\sys_artist();
$sys_album = new App\sys_album();
$sys_track = new App\sys_track();
$sys_login->LoginSessionCheckLogged();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/mahadina.css">
</head>
<body>
<?php
include 'obj_admin_header.php';
?>
<div class="container" style="text-align: center; background: black; max-width: 80%; margin-bottom: 64px;">
	Selamat datang, <span style="font-weight: bold"><?php echo $_SESSION['user_nickname'];?></span>
	<p></p>
	<img src="layout/assets/images/projectsekar.png" style="width: 256px; height: auto;">
	<p></p>
	<h1>Sebuah Karya Musik dan Lagu</h1>
	Hanya sebuah situs streaming musik yang masih berkembang.
	<p></p>
	Diciptakan Oleh: Muhammad Hadi Senoadji<br>
	Ditulis Dalam Bahasa Pemrograman: HTML, PHP, JavaScript
</div>
</body>
</html>