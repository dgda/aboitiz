<?php
	include('../templates/conn.php');
	$query = 'select max(client_id) as max from clients where client_taken != "0"';
	$max = $conn->query($query)->fetch_object()->max;
	$ans = $conn->query('select client_price from clients where client_id = ' . $max)->fetch_object()->client_price;
	$result = array();
	$result['id'] = $max;
	#array_push($result, $max);
	$result['price'] = $ans;
	#array_push($result, $ans);
	echo json_encode($result);
?>