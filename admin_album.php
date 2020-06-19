<?php
require_once 'app/sys_login.php';
require_once 'app/sys_artist.php';
require_once 'app/sys_album.php';
require_once 'app/sys_track.php';
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
<a class="button" style="margin-left: 16px; float: left; margin-bottom: 16px;" href="index.php?page=admin_album_create">+Album</a>
<p></p>
<input id="search_text" class="input" placeholder="cari album" style="margin:0% 1%; width:98%;" type="text" name="">
<p></p>
<table id="tb_album">
	<tbody>
		<tr>
			<th class="text-align-center">No.</th>
			<th class="text-align-center">ID Album</th>
			<th class="text-align-center">Nama Artist</th>
			<th class="text-align-center">Nama Album</th>
			<th  class="text-align-center" colspan="2">Pilihan</th>
		</tr>
		<?php
			$numbering = 0;
			foreach($sys_album->AlbumRead(0) as $row_album)
			{
				$numbering+=1;
				echo
				'
					<tr>
					<td class="text-align-center">'.$numbering.'</td>
					<td class="text-align-center">'.$row_album['album_id'].'</td>
					<td class="text-align-center">'.$row_album['artist_name'].'</td>
					<td class="text-align-center search_index">'.$row_album['album_name'].'</td>
					<td class="text-align-center">
					<a class="button width-full" href="index.php?page=admin_album_update&album_id='.$row_album['album_id'].'">Ubah</a>
					</td>
					<td class="text-align-center">
					<a class="button width-full" href="index.php?page=admin_album_delete_process&album_id='.$row_album['album_id'].'">Hapus</a>
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
		var menucount = $('#tb_album tbody tr').length;
		for (i=1;i<menucount;i++)
		{
			// dicari = $('#menu .menu-item:eq('+i+')').html();
			if ($('#tb_album tbody tr:eq('+i+')').find('.search_index').text().toUpperCase().indexOf(mencari)>-1)
			{
				$('#tb_album tbody tr:eq('+i+')').removeClass('display-none');
			}
			else
			{
				$('#tb_album tbody tr:eq('+i+')').addClass('display-none');
			}
		}
}
);
</script>
</body>
</html>