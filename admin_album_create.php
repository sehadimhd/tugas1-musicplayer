<?php
require_once 'app/sys_login.php';
require_once 'app/sys_artist.php';
require_once 'app/sys_album.php';
$sys_login = new App\sys_login();
$sys_artist = new App\sys_artist();
$sys_album = new App\sys_album();
$sys_login->LoginSessionCheckLogged();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambahkan Album</title>
	<link rel="stylesheet" type="text/css" href="layout/assets/css/mahadina.css">
</head>
<body>
<?php
include 'obj_admin_header.php';
?>
<div class="container">
<div class="container-child">
<form method="post">
	Nama Artist<br>
	<select class="input width-full text-align-center" name="artist_id">
		<?php
		$numbering = 0;
		foreach($sys_artist->ArtistRead(0) as $row_artist)
		{
			$numbering+=1;
			echo
			'
			<option value="'.$row_artist['artist_id'].'">'.$numbering.'. '.$row_artist['artist_name'].'</option>
			';
		}
		?>
	</select>
	<p></p>
	Nama Album<br>
	<input class="input width-full text-align-center" type="text" name="album_name" required>
	<p></p>
	<input class="button width-full" type="submit" name="simpan" value="Simpan">
	<p></p>
	<a class="button width-full" href="index.php?page=admin_album">Kembali</a>
</form>
</div>
</div>
<?php
if(isset($_POST['simpan']))
{
	$artist_id = $_POST['artist_id'];
	$album_name = $_POST['album_name'];
	$sys_album->AlbumCreate($artist_id, $album_name);
	header('location:index.php?page=admin_album');
}
?>
</body>
</html>