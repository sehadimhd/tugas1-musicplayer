<?php
namespace App;
class sys_login extends controller
{
	public function __construct() {
		parent::__construct();
	}

	public function LoginProcess($user_username, $user_password)
	{
		$sql_load = "SELECT * FROM tb_user WHERE (user_username='$user_username' AND user_password='$user_password') OR (user_email='$user_username' AND user_password='$user_password')";
		$stmt_load = $this->db->prepare($sql_load);
		$stmt_load->execute();
		$data_load = $stmt_load->fetchAll();
		if(count($data_load)==1)
		{
			foreach ($data_load as $row_load) 
			{
				$_SESSION['user_username'] = $row_load['user_username'];
				$_SESSION['user_id'] = $row_load['user_id'];
				$_SESSION['user_role'] = $row_load['user_role'];
				$_SESSION['user_nickname'] = $row_load['user_nickname'];
			}	
		}
		
	}

	public function LoginSessionCheckLogged()
	{	
		if(!isset($_SESSION['user_username']) || !isset($_SESSION['user_id']))
		{
			header('location:index.php?page=index_login');
		}
		else if($_SESSION['user_role']==2)
		{
			header('location:index.php?page=user_index');
		}
		else
		{

		}
	}

	public function LoginSessionCheckUserLogged()
	{	
		if(!isset($_SESSION['user_username']) || !isset($_SESSION['user_id']))
		{
			header('location:index.php?page=index_login');
		}
		else if($_SESSION['user_role']==1)
		{
			header('location:index.php?page=admin_index');
		}
		else
		{
			
		}
	}

	public function LoginSessionCheckUnlogged()
	{	
		if(isset($_SESSION['user_username']) && isset($_SESSION['user_id']))
		{
			header('location:index.php?page=admin_index');
		}
	}

	public function LogoutProcess()
	{
		unset($_SESSION['user_username']);
		unset($_SESSION['user_password']);
	}

}
?>
