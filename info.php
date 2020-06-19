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
<embed src="phpinfo.php" style="width:100%; height:640px; overflow: hidden;"></embed>
</body>
</html>