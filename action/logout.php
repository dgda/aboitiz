<?php
	include('../templates/conn.php');
	session_start();
	session_destroy();
	header('Location: ' . $base_url . '/login');
?>