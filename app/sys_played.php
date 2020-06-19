<?php
namespace App;
class sys_played extends controller
{
	public function __construct() {
		parent::__construct();
	}

	public function PlayedReadAll($track_id)
	{
		$sql_read = "SELECT * FROM tb_played WHERE track_id = '$track_id'";
		$stmt_read = $this->db->prepare($sql_read);
		$stmt_read->execute();
		$data = $stmt_read->fetchAll();
		$played_count=0;
		if(count($data)>0)
		{
			foreach($data as $row_played)
			{
			$played_count+=$row_played['played_count'];
			}	
		}
		return $played_count;
	}

	public function PlayedRead($user_id, $track_id)
	{

		$sql_read = "SELECT * FROM tb_played WHERE user_id = '$user_id' AND track_id = '$track_id'";
		$stmt_read = $this->db->prepare($sql_read);
		$stmt_read->execute();
		$data = $stmt_read->fetchAll();
		if(count($data)>0)
		{
			$sql_update = "UPDATE tb_played SET played_count=played_count+1, last_played = CURRENT_TIMESTAMP WHERE user_id = '$user_id' AND track_id = '$track_id'";
			$stmt_update = $this->db->prepare($sql_update);
			$stmt_update->execute();

			$sql_read1 = "SELECT * FROM tb_played WHERE user_id = '$user_id' AND track_id = '$track_id'";
			$stmt_read1 = $this->db->prepare($sql_read1);
			$stmt_read1->execute();
			$data1 = $stmt_read1->fetchAll();
			return $data1;
		}
		else
		{
			$sql_create = "INSERT INTO tb_played(user_id, track_id, played_count) VALUES ('$user_id', '$track_id', '1')";
			$stmt_create = $this->db->prepare($sql_create);
			$stmt_create->execute();

			$sql_read2 = "SELECT * FROM tb_played WHERE user_id = '$user_id' AND track_id = '$track_id'";
			$stmt_read2 = $this->db->prepare($sql_read2);
			$stmt_read2->execute();
			$data2 = $stmt_read2->fetchAll();
			return $data2;
		}
	}
}