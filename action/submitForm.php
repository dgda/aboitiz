<?php
	include('../templates/conn.php');
	$result = $_POST['text'];
	$options = '';
	for($i = 1; $i < 6; $i++){
		$options .= $result[$i];
	}
	$name = $result[6];
	$email = $result[7];
	$num = $result[8];

	$stmt = $conn->prepare('insert into clients(client_name, client_email, client_number, client_lead, client_options, client_numCalls, client_taken, client_price, client_seller) values (?, ?, ?, ?, ?, ?, "0", ?, 1)');
	$stmt->bind_param('ssssssi', $name, $email, $num, $lead, $options, $numCalls, $rand);
	$lead = 0;
	$numCalls = 0;
	$rand = mt_rand(50000, 150000);
	if($stmt->execute()){
		echo 'y';
	}else{
		echo 'n';
	}
	$stmt->close();
?>