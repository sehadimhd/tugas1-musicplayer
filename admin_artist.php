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
	<title>Artist</title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/mahadina.css">
	<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
</head>
<body>
<?php
include 'obj_admin_header.php';
?>
<a class="button" style="margin-left: 16px; float: left; margin-bottom: 16px;" href="index.php?page=admin_artist_create">+Artist</a>
<p></p>
<input id="search_text" class="input" placeholder="cari artist" style="margin:0% 1%; width:98%;" type="text" name="">
<p></p>
<table id="tb_artist">
	<tbody>
		<tr>
			<th class="text-align-center">No.</th>
			<th class="text-align-center">ID Artist</th>
			<th class="text-align-center">Nama Artist</th>
			<th  class="text-align-center" colspan="2">Pilihan</th>
		</tr>
		<?php
			$numbering = 0;
			foreach($sys_artist->ArtistRead(0) as $row_artist)
			{
				$numbering+=1;
				echo
				'
					<tr>
					<td class="text-align-center">'.$numbering.'</td>
					<td class="text-align-center">'.$row_artist['artist_id'].'</td>
					<td class="text-align-center search_index">'.$row_artist['artist_name'].'</td>
					<td class="text-align-center">
					<a class="button" href="index.php?page=admin_artist_update&artist_id='.$row_artist['artist_id'].'">Ubah</a>
					</td>
					<td class="text-align-center">
					<a class="button" href="index.php?page=admin_artist_delete_process&artist_id='.$row_artist['artist_id'].'">Hapus</a>
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
		var menucount = $('#tb_artist tbody tr').length;
		for (i=1;i<menucount;i++)
		{
			// dicari = $('#menu .menu-item:eq('+i+')').html();
			if ($('#tb_artist tbody tr:eq('+i+')').find('.search_index').text().toUpperCase().indexOf(mencari)>-1)
			{
				$('#tb_artist tbody tr:eq('+i+')').removeClass('display-none');
			}
			else
			{
				$('#tb_artist tbody tr:eq('+i+')').addClass('display-none');
			}
		}
}
);
</script>
</body>
</html>