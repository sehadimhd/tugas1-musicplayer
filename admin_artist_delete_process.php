<?php
$artist_id = $_REQUEST['artist_id'];
require_once 'App/sys_login.php';
require_once 'App/sys_artist.php';
$sys_login = new App\sys_login();
$sys_artist = new App\sys_artist();
$sys_login->LoginSessionCheckLogged();
$sys_artist->ArtistDelete($artist_id);
header('location:index.php?page=admin_artist');
?>