<?php
require_once 'App/sys_login.php';
require_once 'App/sys_artist.php';
$sys_login = new App\sys_login();
$sys_artist = new App\sys_artist();
$sys_login->LoginSessionCheckLogged();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambahkan Data Artist</title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/mahadina.css">
</head>
<body>
<?php
include 'obj_admin_header.php';
?>
<div class="container">
<div class="container-child">
<form method="post">
	Nama Artist<br>
	<input class="input width-full text-align-center" type="text" name="artist_name" required>
	<p></p>
	<input class="button width-full" type="submit" name="simpan" value="Simpan">
	<p></p>
	<a class="button width-full" href="index.php?page=admin_artist">Kembali</a>
</form>
</div>
</div>
<?php
if(isset($_POST['simpan']))
{
	$artist_name = $_POST['artist_name'];
	$sys_artist->ArtistCreate($artist_name);
	header('location:index.php?page=admin_artist');
}
?>
</body>
</html>