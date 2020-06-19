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
$user_id = $_SESSION['user_id'];
$track_id = $_REQUEST['track_id'];
foreach($sys_played->PlayedRead($user_id, $track_id) as $row_played)
{

}
if(!isset($track_id))
{
	header('location:user_index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Music Player</title>
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
<table id="tb_track">
	<tbody>
		<?php
			foreach($sys_track->TrackRead($track_id) as $row_track)
			echo 
			'
			<tr>
				<td class="first-td">Nama Artist</td>
				<td>'.$row_track['artist_name'].'</td>
			</tr>
			<tr>
				<td class="first-td">Nama Album</td>
				<td>'.$row_track['album_name'].'</td>
			</tr>
			<tr>
				<td class="first-td">Nama Track</td>
				<td>'.$row_track['track_name'].'</td>
			</tr>
			<tr>
				<td class="first-td">Telah Anda Putar sebangak</td>
				<td>'.$row_played['played_count'].' kali</td>
			</tr>
			<tr>
				<td class="first-td">Pertama Kali Diputar</td>
				<td>'.$row_played['first_played'].'</td>
			</tr>
			<tr>
				<td class="first-td">Terakhir Kali Diputar</td>
				<td>'.$row_played['last_played'].'</td>
			</tr>
			<tr>
				<td colspan="2">
				<audio style="width:100%;" src="bigdata/data'.$row_track['artist_id'].'/'.$row_track['track_name'].'.mp3" controls autoplay="true">
					Your browser does not support the audio element.
					</audio>
				</td>
			</tr>
			';
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