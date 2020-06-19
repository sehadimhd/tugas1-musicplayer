<?php
require_once 'App/sys_login.php';
require_once 'App/sys_user.php';
$sys_login = new App\sys_login();
$sys_user = new App\sys_user();
$sys_login->LoginSessionCheckLogged();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambahkan Pengguna</title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/mahadina.css">
	<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
</head>
<body>
<?php
include 'obj_admin_header.php';
?>
<div class="container">
<div class="container-child">
<form method="post">
	Username<br>
	<input class="input width-full" type="text" name="user_username" required>
	<p></p>
	Email<br>
	<input class="input width-full" type="email" name="user_email" required>
	<p></p>
	Password<br>
	<input id="passwd1" class="input width-full" type="password" name="user_password" required>
	<br>
	<input type="checkbox" id="cb_passwd1"> <label for="cb_passwd1">Tampilkan password</label>
	<p></p>
	Nama Lengkap<br>
	<input class="input width-full" type="text" name="user_nickname" required>
	<p></p>
	Tingkatan<br>
	<select name="user_role" class="input width-full" >
		<option value="1">Admin</option>
		<option selected="true" value="2">User</option>
	</select>
	<p></p>
	<input class="button width-full" type="submit" name="simpan" value="Simpan">
	<p></p>
	<a class="button width-full" href="index.php?page=admin_user">Kembali</a>
</form>
</div>
</div>
<?php
if(isset($_POST['simpan']))
{
	$user_username = $_POST['user_username'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$user_nickname = $_POST['user_nickname'];
	$user_role = $_POST['user_role'];
	$sys_user->UserCreate($user_username, $user_email, $user_password, $user_nickname, $user_role);
	header('location:index.php?page=admin_user');
}
?>
<script type="text/javascript">

function PasswordVisibilityChecker()
{
	if($('#cb_passwd1').prop('checked')==true)
	{
		$('#passwd1').attr('type','text');
	}
	else if($('#cb_passwd1').prop('checked')==false)
	{
		$('#passwd1').attr('type','password');	
	}
}

$('#cb_passwd1').on('change click', function()
{
	PasswordVisibilityChecker();
}
);
</script>
</body>
</html>