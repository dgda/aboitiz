<?php
	include('../templates/conn.php');
	session_start();
	if(!isset($_POST['submit'])){
		header('Location: ' . $base_url);
	}
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	if($username == $default_username && $password == $default_password){
		$_SESSION['login'] = true;
		header('Location: ' . $base_url . '/admin');
	}else{
		header('Location: ' . $base_url . '/login');
	}
?>