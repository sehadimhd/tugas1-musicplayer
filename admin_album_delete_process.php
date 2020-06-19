<?php
$album_id = $_REQUEST['album_id'];
require_once 'App/sys_login.php';
require_once 'App/sys_album.php';
$sys_login = new App\sys_login();
$sys_album = new App\sys_album();
$sys_login->LoginSessionCheckLogged();
$sys_album->AlbumDelete($album_id);
header('location:index.php?page=admin_album');
?>