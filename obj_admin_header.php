<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.mainheader
		{
			width: 100%;
			background: #090909;
			text-align: center;
			user-select: none;
			height: auto;
		}

		.mainheader img
		{
			user-select: none;
			width: 64px;
			height: auto;
		}

		.menuheader
		{
			width: 100%;
			background: #090909;
			display: inline-block;
			border-bottom: black 2px solid;
		}
		.menuheader a
		{
			display: block;
			float: left;
			padding: 8px 16px;
			text-decoration: none;
			color: white;
		}

		.menuheader a:hover
		{
			background: white;
			color: #090909;
		}

		.footer
		{
			position: fixed;
			width: 100%;
			text-align: center;
			font-size: 14px;
			z-index: 20;
			bottom: 0px;
			left: 0px;
			padding: 2px 4px;
			user-select: none;
			background: #090909;
		}
	</style>
</head>
<body>
<div class="mainheader">
	<img src="layout/assets/images/sekarmila.png">
	<p></p>
	<span style="font-family: homeday; font-size: 24px; text-shadow: 0px 0px 4px white;">Sekarmila</span>
	<br>
	<span style="font-weight: normal; font-size: 12px; font-family: roboto;">Sebuah Karya Musik & Lagu</span>
</div>
<div class="menuheader">
	<a href="index.php?page=admin_index">Beranda</a>
	<a href="index.php?page=admin_artist">Artist</a>
	<a href="index.php?page=admin_album">Album</a>
	<a href="index.php?page=admin_track">Track</a>
	<a href="index.php?page=admin_user">Pengguna</a>
	<a href="index.php?page=info">Info</a>
	<form method="post">
	<input class="button" type="submit" name="logout" value="Logout" style="padding: 4px 8px; float: right; border:0px; margin-right: 8px;">
	</form>
</div>
<div class="footer">Not Right Reserved 2020 @Sekarmila.Music Preview :)</div>
<?php
if(isset($_POST['logout']))
{
	$sys_login->LogoutProcess();
	header('location:index.php?page=index_login');
}
?>
</body>
</html>