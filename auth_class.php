<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include './database/DBController.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		$type2 = array("","manager","cashier");
		$qry = $this->db->query("SELECT * FROM `users`, `type` WHERE `users`.`username` = '".$username."' AND `users`.`password` = '".md5($password)."' AND `users`.`type_id` = `type`.`type_id`"); 
			$row= mysqli_fetch_array($qry, MYSQLI_ASSOC);
			$num_row = mysqli_num_rows($qry);
            $_SESSION['employee_id'] = $row['employee_id'];
			$_SESSION['username'] = $row['username'];
            if($row["type_id"] == 2){
                $login = 2;
            }
            if($row["type_id"] == 1){
                $login = 1;
            }
		if($num_row > 0){
			foreach ($row as $key => $value) {
				if($key != 'password' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
					$_SESSION['login_type'] = $login;
					$_SESSION['login_id'] = $row["user_id"];
					$_SESSION['login_view_folder'] = $type2[$login].'/';
			return 1;
		}
		else{
			return 2;
		}
	}
	function logout(){
		session_destroy();
		$_SESSION = array();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
		
	}
}