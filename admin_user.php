<?php
require_once 'App/sys_login.php';
require_once 'App/sys_user.php';
require_once 'App/sys_album.php';
require_once 'App/sys_track.php';
require_once 'App/sys_user.php';
$sys_login = new App\sys_login();
$sys_user = new App\sys_user();
$sys_album = new App\sys_album();
$sys_track = new App\sys_track();
$sys_track = new App\sys_user();
$sys_login->LoginSessionCheckLogged();
?>
<!DOCTYPE html>
<html>
<head>
	<title>user</title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/mahadina.css">
	<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
</head>
<body>
<?php
include 'obj_admin_header.php';
?>
<a class="button" style="margin-left: 16px; float: left; margin-bottom: 16px;" href="index.php?page=admin_user_create">+user</a>
<p></p>
<input id="search_text" class="input" placeholder="cari user" style="margin:0% 1%; width:98%;" type="text" name="">
<p></p>
<table id="tb_user">
	<tbody>
		<tr>
			<th class="text-align-center">No.</th>
			<th class="text-align-center">ID user</th>
			<th class="text-align-center">Username</th>
			<th class="text-align-center">Email</th>
			<th class="text-align-center">Password</th>
			<th class="text-align-center">Nama Lengkap</th>
			<th class="text-align-center">Tingkatan</th>
			<th  class="text-align-center" colspan="2">Pilihan</th>
		</tr>
		<?php
			$numbering = 0;
			foreach($sys_user->userRead(0) as $row_user)
			{
				if($row_user['user_role']==1)
				{
					$role = 'Admin';
				}
				else if($row_user['user_role']==2)
				{
					$role = 'User';
				}
				
				$numbering+=1;
				echo
				'
					<tr>
					<td class="text-align-center">'.$numbering.'</td>
					<td class="text-align-center">'.$row_user['user_id'].'</td>
					<td class="text-align-center">'.$row_user['user_username'].'</td>
					<td class="text-align-center">'.$row_user['user_email'].'</td>
					<td class="text-align-center">'.$row_user['user_password'].'</td>
					<td class="text-align-center search_index">'.$row_user['user_nickname'].'</td>
					<td class="text-align-center search_index">'.$role.'</td>
					<td class="text-align-center">
					<a class="button" href="index.php?page=admin_user_update&user_id='.$row_user['user_id'].'">Ubah</a>
					</td>
					<td class="text-align-center">
					<a class="button" href="index.php?page=admin_user_delete_process&user_id='.$row_user['user_id'].'">Hapus</a>
					</td>
					</tr>
				';
			}
		?>
	</tbody>
</table>
<script type="text/javascript">
$('#search_text').on('input change', function()
{
	var i;
		var mencari = $('#search_text').val().toUpperCase();
		var menucount = $('#tb_user tbody tr').length;
		for (i=1;i<menucount;i++)
		{
			// dicari = $('#menu .menu-item:eq('+i+')').html();
			if ($('#tb_user tbody tr:eq('+i+')').find('.search_index').text().toUpperCase().indexOf(mencari)>-1)
			{
				$('#tb_user tbody tr:eq('+i+')').removeClass('display-none');
			}
			else
			{
				$('#tb_user tbody tr:eq('+i+')').addClass('display-none');
			}
		}
}
);
</script>
</body>
</html>