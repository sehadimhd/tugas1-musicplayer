<?php
require_once 'app/sys_login.php';
$sys_login = new App\sys_login();
$sys_login->LoginSessionCheckUnlogged();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/mahadina.css">
	<style type="text/css">
		.mainheader
		{
			top: 0px;
			user-select: none;
			text-align: center;
			height: 64px;
			background: #090909;
			display: block;
			width: 100%;
			font-weight: bold;
			position: fixed;
			z-index: 20;
			border-bottom: solid 2px black;
		}
	</style>
</head>
<body>
<div class="mainheader">
<span style="font-weight: normal; font-size: 24px; font-family: homeday; text-shadow: 0px 0px 8px white;">Sekarmila</span>
<br>
<span style="font-weight: normal; font-size: 12px; font-family: roboto;">Sebuah Karya Musik & Lagu</span>
</div>
<div class="container" style="margin-top: 96px;">
<div class="container-center" style="width: 50%;">
<form method="post">
	Username/Email<br>
	<input class="input width-full text-align-center" type="text" name="user_username">
	<p></p>
	Password<br>
	<input class="input width-full text-align-center" type="password" name="user_password">
	<p></p>
	<input class="button width-full" type="submit" name="login" value="login">
	<p></p>
	<!-- <a href="daftar" class="button width-full">Daftar</a> -->
</form>
</div>
</div>
<?php
if(isset($_POST['login']))
{
	$user_username = $_POST['user_username'];
	$user_password = $_POST['user_password'];
	$sys_login->LoginProcess($user_username, $user_password);
	header('location:index.php?page=admin_index');	
}
?>
</body>
</html>