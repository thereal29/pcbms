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
			$_SESSION['password'] = $row['password'];
			$uid = $row['user_id'];
			$user = $_SESSION['username'];
            if($row["type_id"] == 2){
                $login = 2;
				$insert	= "INSERT INTO dtr (user_id,username,purpose) VALUES('$uid','$user','User $user login')";
 				$logs = mysqli_query($this->db,$insert);
            }
            if($row["type_id"] == 1){
                $login = 1;
				$insert	= "INSERT INTO dtr (user_id,username,purpose) VALUES('$uid','$user','Admin $user login')";
 				$logs = mysqli_query($this->db,$insert);
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
		$user = $_SESSION['username'];
		$uid = $_SESSION['login_id'];
		if($_SESSION['login_type'] == 2){
			$login = 2;
			$insert	= "INSERT INTO dtr (user_id,username,purpose) VALUES('$uid','$user','User $user logout')";
			$logs = mysqli_query($this->db,$insert);
		}
		if($_SESSION['login_type'] == 1){
			$login = 1;
			$insert	= "INSERT INTO dtr (user_id,username,purpose) VALUES('$uid','$user','Admin $user logout')";
			$logs = mysqli_query($this->db,$insert);
		}
		session_destroy();
		$_SESSION = array();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
		
	}
	function switchPOS(){
		$type2 = array("","manager","cashier");
		$qry = $this->db->query("SELECT * FROM `users`, `type` WHERE `users`.`username` = '".$_SESSION['username']."' AND `users`.`type_id` = `type`.`type_id`"); 
			$row= mysqli_fetch_array($qry, MYSQLI_ASSOC);
			$num_row = mysqli_num_rows($qry);
            $_SESSION['employee_id'] = $row['employee_id'];
			$_SESSION['username'] = $row['username'];
			$uid = $row['user_id'];
			$user = $_SESSION['username'];
            if($row["type_id"] == 1){
                $login = 2;
				$insert	= "INSERT INTO dtr (user_id,username,purpose) VALUES('$uid','$user','Admin $user switch to POS')";
 				$logs = mysqli_query($this->db,$insert);
            }
		if($num_row > 0){
			$_SESSION['login_view_folder'] = $type2[$login].'/';
			header('location: ./index.php?page=home');
			
		}
		else{
			echo 'false';
		}

	}
	function switchAdmin(){
		$type2 = array("","manager","cashier");
		$qry = $this->db->query("SELECT * FROM `users`, `type` WHERE `users`.`username` = '".$_SESSION['username']."' AND `users`.`type_id` = `type`.`type_id`"); 
			$row= mysqli_fetch_array($qry, MYSQLI_ASSOC);
			$num_row = mysqli_num_rows($qry);
			$_SESSION['employee_id'] = $row['employee_id'];
			$_SESSION['username'] = $row['username'];
			$uid = $row['user_id'];
			$user = $_SESSION['username'];
			if($row["type_id"] == 1){
				$login = 1;
				$insert	= "INSERT INTO dtr (user_id,username,purpose) VALUES('$uid','$user','Admin $user switch to Store Management')";
				 $logs = mysqli_query($this->db,$insert);
			}
		if($num_row > 0){
			$_SESSION['login_view_folder'] = $type2[$login].'/';
			header('location: ./index.php?page=home');
			
		}
		else{
			echo 'false';
		}
	}
}