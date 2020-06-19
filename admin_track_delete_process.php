<?php
$track_id = $_REQUEST['track_id'];
$artist_id = $_REQUEST['artist_id'];
$track_name = $_REQUEST['track_name'];
require_once 'App/sys_login.php';
require_once 'App/sys_track.php';
$sys_login = new App\sys_login();
$sys_track = new App\sys_track();
$sys_login->LoginSessionCheckLogged();
$sys_track->TrackDelete($track_id, $artist_id, $track_name);
header('location:index.php?page=admin_track');
?>