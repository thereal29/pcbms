<?php
ob_start();

$action = $_GET['action'];
include './auth_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'switch'){
	$switch = $crud->switchPOS();
	if($switch)
		echo $switch;
}
if($action == 'admin'){
	$admin = $crud->switchAdmin();
	if($admin)
		echo $admin;
}
ob_end_flush();
?>