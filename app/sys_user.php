<?php
namespace App;
class sys_user extends controller
{
	public function __construct() {
		parent::__construct();
	}

	public function UserCreate($user_username, $user_email, $user_password, $user_nickname, $user_role)
	{
		$sql_create = "INSERT INTO tb_user (user_username, user_email, user_password, user_nickname, user_role) VALUES('$user_username', '$user_email', '$user_password', '$user_nickname', '$user_role')";
		$stmt_create = $this->db->prepare($sql_create);
		$stmt_create->execute();
	}

	public function UserRead($user_id)
	{
		if($user_id == 0)
		{
			$sql_read = "SELECT * FROM tb_user ORDER BY user_nickname";
		}
		else
		{
			$sql_read = "SELECT * FROM tb_user WHERE user_id = '$user_id' ORDER BY user_nickname";
		}
		$stmt_read = $this->db->prepare($sql_read);
		$stmt_read->execute();
		$data = $stmt_read->fetchAll();
		return $data;
	}

	public function UserChangeProfle($user_id, $user_nickname, $user_password)
	{
		$sql_update = "UPDATE tb_user SET user_nickname = '$user_nickname', user_password = '$user_password' WHERE user_id = '$user_id'";
		$stmt_update = $this->db->prepare($sql_update);
		$stmt_update->execute();
	}

	public function AdminChangeUserProfle($user_id, $user_username, $user_email, $user_nickname, $user_password, $user_role)
	{
		$sql_update = "UPDATE tb_user SET user_username = '$user_username', user_email = '$user_email', user_nickname = '$user_nickname', user_password = '$user_password', user_role = '$user_role' WHERE user_id = '$user_id'";
		$stmt_update = $this->db->prepare($sql_update);
		$stmt_update->execute();
	}

	public function UserDelete($user_id)
	{
		$sql_delete = "DELETE FROM tb_user WHERE user_id = '$user_id'";
		$stmt_delete = $this->db->prepare($sql_delete);
		$stmt_delete->execute();
	}
}