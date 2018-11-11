<?php
	include('../templates/conn.php');
	$id = $_GET['id'];
	$stmt = $conn->prepare('update registrants set reg_verified = 0 where reg_id = ?');
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$stmt->close();
	header('Location: ' . $base_url . '/admin');
?>