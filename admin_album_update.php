<?php
require_once 'app/sys_login.php';
require_once 'app/sys_artist.php';
require_once 'app/sys_album.php';
$sys_login = new App\sys_login();
$sys_artist = new App\sys_artist();
$sys_album = new App\sys_album();
$sys_login->LoginSessionCheckLogged();
$album_id = $_REQUEST['album_id'];
foreach($sys_album->AlbumRead($album_id) as $row_album)
{

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Artist</title>
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
			if($row_artist['artist_id'] == $row_album['artist_id'])
			{
				echo
			'
			<option selected="true" value="'.$row_artist['artist_id'].'">'.$numbering.'. '.$row_artist['artist_name'].'</option>
			';
			}
			else
			{
				echo
			'
			<option value="'.$row_artist['artist_id'].'">'.$numbering.'. '.$row_artist['artist_name'].'</option>
			';
			}
		}
		?>
	</select>
	<p></p>
	Nama Album<br>
	<input class="input width-full text-align-center" type="text" value="<?php echo $row_album['album_name'];?>" name="album_name" required>
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
	$album_id = $row_album['album_id'];
	$artist_id = $_POST['artist_id'];
	$album_name = $_POST['album_name'];
	$sys_album->AlbumUpdate($album_id, $artist_id, $album_name);
	header('location:index.php?page=admin_album');
}
?>
</body>
</html>