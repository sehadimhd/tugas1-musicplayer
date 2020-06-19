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
	<title>Tambahkan Data Track</title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/mahadina.css">
	<script type="text/javascript" src="plugins/jquery/jquery.js"></script>
</head>
<body>
<?php
include 'obj_admin_header.php';
?>
<div class="container">
<div class="container-child">
<form method="post" enctype="multipart/form-data">
	Nama Artist (Album)<br>
	<select class="input width-full text-align-center" name="album_id">
		<?php
		$numbering = 0;
		foreach($sys_album->AlbumRead(0) as $row_album)
		{
			$numbering+=1;
			echo
			'
			<option value="'.$row_album['album_id'].'">'.$numbering.'. '.$row_album['artist_name'].' ('.$row_album['album_name'].')</option>
			';
		}
		?>
	</select>
	<p></p>
	Nama Track<br>
	<input class="input width-full text-align-center" type="text" name="track_name" required>
	<p></p>
	File Track<br>
	<input class="input width-full text-align-center" type="file" name="track_file" id="audioselector" required>
	<p></p>
	Pratinjau Musik<br>
	<audio class="input width-full text-align-center" style="padding: 0px;" id="audiosrc" controls>
	Your browser does not support the audio element.
	</audio>
	<p></p>
	<input class="button width-full" type="submit" name="simpan" value="Simpan">
	<p></p>
	<a class="button width-full" href="index.php?page=admin_track">Kembali</a>
</form>
</div>
</div>
<?php
if(isset($_POST['simpan']))
{
	$album_id = $_POST['album_id'];
	// echo "<script>alert(".$album_id.")</script>";
	foreach($sys_album->AlbumRead($album_id) as $row_album2)
		{
			$artist_id = $row_album2['artist_id'];
		}
	$track_name = $_POST['track_name'];
	$track_file = $_FILES['track_file']['tmp_name'];
	// echo $artist_id;
	$sys_track->TrackCreate($artist_id, $album_id, $track_name, $track_file);
	header('location:index.php?page=admin_track');
}
?>
<script type="text/javascript">

	$('#audioselector').on('change', function()
	{
		var blob = window.URL || window.webkitURL;
		// var file = $('#select').val().split('\\').pop();
		var file = this.files[0], fileURL = blob.createObjectURL(file);
		document.getElementById('audiosrc').src = fileURL;
	}
	);
</script>
</body>
</html>