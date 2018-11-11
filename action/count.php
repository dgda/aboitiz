<?php
	include('../templates/conn.php');
	$query = 'select count(reg_id) as count from registrants';
	$count = $conn->query($query)->fetch_object()->count;
	echo $count;
?>