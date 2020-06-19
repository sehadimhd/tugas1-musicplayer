<?php
$user_id = $_REQUEST['user_id'];
require_once 'App/sys_login.php';
require_once 'App/sys_user.php';
$sys_login = new App\sys_login();
$sys_user = new App\sys_user();
$sys_login->LoginSessionCheckLogged();
$sys_user->UserDelete($user_id);
header('location:index.php?page=admin_user');
?>