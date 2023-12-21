
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin();

include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Formate.php');

?>



<?php


class Adminlogin
{
	
private $db;
private $fm;

	public function __construct()
	{
		
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function adminlogin($adminUser,$adminPassword) 

	


	{

if (empty($adminUser) ||empty($adminPassword) ) {
	
	$loginmsg = "Username or Password must not be empty !";
	return $loginmsg;
		} else{


			$query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser'
			AND adminPassword = '$adminPassword'";
			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();

				Session::set("adminlogin",true);
				Session::set("adminId",$value['adminId']);
				Session::set("adminUser",$value['adminUser']);
				Session::set("adminName",$value['adminName']);
				
				$log  = "Admin Logged in: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
				"User:".$value['adminUser'].PHP_EOL.
				"-------------------------".PHP_EOL;
				file_put_contents('../log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
				header("Location:dashboard.php");
			} else{
				$loginmsg = "Username or Password not match !";
				return $loginmsg;
			}


		}

	}
}


?>