<?php
namespace App;
class sys_track extends controller
{
	public function __construct() {
		parent::__construct();
	}

	public function TrackCreate($artist_id, $album_id, $track_name, $track_file)
	{
		if (!file_exists('bigdata')) 
		{
    		mkdir('bigdata');
		}
		if (!file_exists('bigdata/data'.$artist_id)) 
		{
    		mkdir('bigdata/data'.$artist_id);
		}
		$dir_upload = 'bigdata/data'.$artist_id.'/';
		move_uploaded_file($track_file, $dir_upload.$track_name.'.mp3');
		$sql_create = "INSERT INTO tb_track (album_id, track_name) VALUES ('$album_id', '$track_name')";
		$stmt_create = $this->db->prepare($sql_create);
		$stmt_create->execute();
	}

	public function TrackRead($track_id)
	{
		if($track_id==0)
		{
			$sql_read = "SELECT tb_track.track_id, tb_track.album_id, tb_artist.artist_name, tb_album.artist_id, tb_track.track_name, tb_album.album_name FROM tb_track JOIN tb_album ON tb_track.album_id = tb_album.album_id JOIN tb_artist ON tb_album.artist_id = tb_artist.artist_id ORDER BY artist_name";
		}
		else
		{
			$sql_read = "SELECT tb_track.track_id, tb_track.album_id, tb_artist.artist_name, tb_album.artist_id, tb_track.track_name, tb_album.album_name FROM tb_track JOIN tb_album ON tb_track.album_id = tb_album.album_id JOIN tb_artist ON tb_album.artist_id = tb_artist.artist_id WHERE track_id = '$track_id' ORDER BY artist_name";
		}
		$stmt_read = $this->db->prepare($sql_read);
		$stmt_read->execute();
		$data_read = $stmt_read->fetchAll();
		return $data_read;
	}

	public function TrackUpdate($track_id, $album_id, $artist_id, $track_name, $track_file, $temp_track_name)
	{
		$sql_read = "SELECT * FROM tb_track WHERE track_id = '$track_id'";
			$stmt_read = $this->db->prepare($sql_read);
			$stmt_read->execute();
			$data_read = $stmt_read->fetchAll();
			foreach($data_read as $row_track)
			{
				$readen_track_name = $row_track['track_name'];
			}
		if($temp_track_name!=='')
		{
			
			if (!file_exists('bigdata')) 
			{
	    		mkdir('bigdata');
			}
			if (!file_exists('bigdata/data'.$artist_id)) 
			{
	    		mkdir('bigdata/data'.$artist_id);
			}
			unlink('bigdata/data'.$artist_id.'/'.$readen_track_name.'.mp3');
			$dir_upload = 'bigdata/data'.$artist_id.'/';
			move_uploaded_file($track_file, $dir_upload.$track_name.'.mp3');
		}
		else if($temp_track_name==='')
		{
			rename('bigdata/data'.$artist_id.'/'.$readen_track_name.'.mp3', 'bigdata/data'.$artist_id.'/'.$track_name.'.mp3');
		}
		
		$sql_update = "UPDATE tb_track SET album_id = '$album_id', track_name = '$track_name' WHERE track_id = '$track_id'";
		$stmt_update = $this->db->prepare($sql_update);
		$stmt_update->execute();
	}

	public function TrackDelete($track_id, $artist_id, $track_name)
	{
		unlink('bigdata/data'.$artist_id.'/'.$track_name.'.mp3');
		$sql_delete = "DELETE FROM tb_track WHERE track_id = '$track_id'";
		$stmt_delete = $this->db->prepare($sql_delete);
		$stmt_delete->execute();
	}

}