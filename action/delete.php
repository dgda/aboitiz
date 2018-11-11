<?php
	include('../templates/conn.php');
	session_start();
	if(!isset($_SESSION['login'])) header('Location: '.$base_url . '/admin');
	$id = $_GET['id'];
	$stmt = $conn->prepare('delete from registrants where reg_id = ?');
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->close();
	header('Location: ' . $base_url . '/admin');
?>