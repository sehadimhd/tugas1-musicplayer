<?php
namespace App;
class sys_album extends controller
{
	public function __construct() {
		parent::__construct();
	}

	public function AlbumCreate($artist_id, $album_name)
	{
		$sql_create = "INSERT INTO tb_album (artist_id, album_name) VALUES ('$artist_id', '$album_name')";
		$stmt_create = $this->db->prepare($sql_create);
		$stmt_create->execute();
	}

	public function AlbumRead($album_id)
	{
		if($album_id == 0)
		{
			$sql_read = "SELECT tb_album.album_id, tb_album.artist_id, tb_artist.artist_name, tb_album.album_name FROM tb_album JOIN tb_artist ON tb_album.artist_id = tb_artist.artist_id ORDER BY tb_artist.artist_name ASC, tb_album.album_name ASC";	
		}
		else
		{
			$sql_read = "SELECT tb_album.album_id, tb_album.artist_id, tb_artist.artist_name, tb_album.album_name FROM tb_album JOIN tb_artist ON tb_album.artist_id = tb_artist.artist_id  WHERE album_id='$album_id' ORDER BY tb_artist.artist_name ASC, tb_album.album_name ASC";
		}
		$stmt_read = $this->db->prepare($sql_read);
		$stmt_read->execute();
		$data_read = $stmt_read->fetchAll();
		return $data_read;
	}

	public function AlbumUpdate($album_id, $artist_id, $album_name)
	{
		$sql_update = "UPDATE tb_album SET artist_id = '$artist_id', album_name = '$album_name' WHERE album_id = '$album_id'";
		$stmt_update = $this->db->prepare($sql_update);
		$stmt_update->execute();
	}

	public function AlbumDelete($album_id)
	{
		$sql_delete = "DELETE FROM tb_album WHERE album_id = '$album_id'";
		$stmt_delete = $this->db->prepare($sql_delete);
		$stmt_delete->execute();
	}
}