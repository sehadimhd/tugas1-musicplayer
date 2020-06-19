<?php
require_once 'App/sys_login.php';
require_once 'App/sys_artist.php';
require_once 'App/sys_album.php';
require_once 'App/sys_user.php';
$sys_login = new App\sys_login();
$sys_artist = new App\sys_artist();
$sys_album = new App\sys_album();
$sys_user = new App\sys_user();
$sys_login->LoginSessionCheckUserLogged();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil Saya</title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/mahadina.css">
	<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
	<style type="text/css">
		table
		{
			width: 80%;
			margin: 2% 10%;
		}

		table tr td
		{
			text-align: left;
		}

		.first-td
		{
			font-weight: bold;
		}
	</style>
</head>
<body>
<?php
include 'obj_user_header.php';
?>
<table id="tb_user">
	<tbody>
		<?php
			foreach($sys_user->UserRead($user_id) as $row_user)
			echo 
			'
			<tr>
				<td class="first-td">Username</td>
				<td>'.$row_user['user_username'].'</td>
			</tr>
			<tr>
				<td class="first-td">Email</td>
				<td>'.$row_user['user_email'].'</td>
			</tr>
			<tr>
				<td class="first-td">Nama Penguna</td>
				<td>'.$row_user['user_nickname'].'</td>
			</tr>
			<tr>
				<td class="first-td">Password</td>
				<td>
				<input id="passwd1" type="password" style="color:white; background:#181818; border:0px;" readonly="true" value="'.$row_user['user_password'].'">
				<p></p>
				<input type="checkbox" id="cb_passwd1"> <label for="cb_passwd1">Tampilkan password</label>
				</td>
			</tr>
			';
		?>
		<tr>
			<td colspan="2" style="text-align: center;">
				<div style="width:50%; margin: auto;">
				<form method="post">
					<h1>Ubah Profil</h1>
					<p></p>
					Nama Pengguna<br>
					<input class="input width-full text-align-center" type="text" value="<?php echo $row_user['user_nickname'];?>" name="user_nickname">
					<p></p>
					Password<br>
					<input id="passwd2" class="input width-full text-align-center" value="<?php echo $row_user['user_password'];?>" type="password" name="user_password">
					<br>
					<input type="checkbox" id="cb_passwd2"> <label for="cb_passwd2">Tampilkan password</label>
					<p></p>
					<input class="button width-full" type="submit" name="ubah" value="Ubah">
				</form>
			</td>
		</tr>
	</tbody>
</table>
<?php
if(isset($_POST['ubah']))
{
	$user_id = $_SESSION['user_id'];
	$user_nickname = $_POST['user_nickname'];
	$user_password = $_POST['user_password'];
	$sys_user->UserChangeProfle($user_id, $user_nickname, $user_password);
	header('location:index.php?page=user_profile');
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

	if($('#cb_passwd2').prop('checked')==true)
	{
		$('#passwd2').attr('type','text');
	}
	else if($('#cb_passwd2').prop('checked')==false)
	{
		$('#passwd2').attr('type','password');	
	}
}

$('#cb_passwd1').on('change click', function()
{
	PasswordVisibilityChecker();
}
);

$('#cb_passwd2').on('change click', function()
{
	PasswordVisibilityChecker();
}
);
</script>
</body>
</html>