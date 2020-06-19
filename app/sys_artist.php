<?php
namespace App;
class sys_artist extends controller
{
	public function __construct() {
		parent::__construct();
	}

	public function ArtistCreate($artist_name)
	{
		$sql_create = "INSERT INTO tb_artist (artist_name) VALUES ('$artist_name')";
		$stmt_create = $this->db->prepare($sql_create);
		$stmt_create->execute();
	}

	public function ArtistRead($artist_id)
	{
		if($artist_id == 0)
		{
			$sql_read = "SELECT * FROM tb_artist ORDER BY artist_name ASC";	
		}
		else
		{
			$sql_read = "SELECT * FROM tb_artist WHERE artist_id = '$artist_id' ORDER BY artist_name ASC";
		}
		$stmt_read = $this->db->prepare($sql_read);
		$stmt_read->execute();
		$data_read = $stmt_read->fetchAll();
		return $data_read;
	}

	public function ArtistUpdate($artist_id, $artist_name)
	{
		$sql_update = "UPDATE tb_artist SET artist_name = '$artist_name' WHERE artist_id = '$artist_id'";
		$stmt_update = $this->db->prepare($sql_update);
		$stmt_update->execute();
	}

	public function ArtistDelete($artist_id)
	{
		$sql_delete = "DELETE FROM tb_artist WHERE artist_id = '$artist_id'";
		$stmt_delete = $this->db->prepare($sql_delete);
		$stmt_delete->execute();
	}
}