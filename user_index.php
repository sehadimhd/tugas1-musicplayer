<?php
require_once 'App/sys_login.php';
require_once 'App/sys_artist.php';
require_once 'App/sys_album.php';
require_once 'App/sys_track.php';
require_once 'App/sys_played.php';
$sys_login = new App\sys_login();
$sys_artist = new App\sys_artist();
$sys_album = new App\sys_album();
$sys_track = new App\sys_track();
$sys_played = new App\sys_played();
$sys_login->LoginSessionCheckUserLogged();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Lagu</title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/mahadina.css">
	<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
</head>
<body>
<?php
include 'obj_user_header.php';
?>
<span style="text-align: center; width:100%; display:block;" >Selamat datang, <span style="font-weight: bold"><?php echo $_SESSION['user_nickname'];?></span></span>
	<p></p>
<input id="search_text" class="input" placeholder="cari lagu" style="margin:0% 1%; width:98%;" type="text" name="">
<p></p>
<table id="tb_track">
	<tbody>
		<tr>
			<th class="text-align-center">No.</th>
			<th class="text-align-center">Nama Artist</th>
			<th class="text-align-center"> </th>
			<th class="text-align-center">Nama Track</th>
			<th class="text-align-center">Nama Album</th>
			<th class="text-align-center">Diputar Sebanyak</th>
			<th class="text-align-center">Pilihan</th>
		</tr>
		<?php
			$numbering = 0;
			foreach($sys_track->TrackRead(0) as $row_track)
			{
				$numbering+=1;
				echo
				'
					<tr>
					<td class="text-align-center">'.$numbering.'</td>
					<td class="text-align-center">'.$row_track['artist_name'].'</td>
					<td class="text-align-center"> - </td>
					<td class="text-align-center search_index"> '.$row_track['track_name'].'</td>
					<td class="text-align-center">'.$row_track['album_name'].'</td>
					<td class="text-align-center">
					'.$sys_played->PlayedReadAll($row_track['track_id']).' kali
					</td>
					<td>
					<a class="button width-full" href="index.php?page=user_music_player&track_id='.$row_track['track_id'].'">Mainkan</a>
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
		var menucount = $('#tb_track tbody tr').length;
		for (i=1;i<menucount;i++)
		{
			// dicari = $('#menu .menu-item:eq('+i+')').html();
			if ($('#tb_track tbody tr:eq('+i+')').find('.search_index').text().toUpperCase().indexOf(mencari)>-1)
			{
				$('#tb_track tbody tr:eq('+i+')').removeClass('display-none');
			}
			else
			{
				$('#tb_track tbody tr:eq('+i+')').addClass('display-none');
			}
		}
}
);
</script>
</body>
</html>