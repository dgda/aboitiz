<?php
	include('../templates/conn.php');
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$num = $_POST['number'];
		$lead = $_POST['lead'];
		$prestosite = $_POST['fi'];
		$sitetonego = $_POST['se'];
		$negotoclos = $_POST['thi'];
		$bool = '1';
		$cid = $_GET['id'];
		$sid = $_SESSION['sid'];
		if(!isset($_POST['conf'])) {
			$bool = '0';
			$sid = 0;
		}
		$stmt = $conn->prepare('update clients set client_name=?, client_email=?,client_number=?,client_lead=?,client_prestosite=?,client_sitetonego=?,client_negotoclos=?,client_taken=?, client_seller=? where client_id = ?');
		$stmt->bind_param('ssssiiisii', $name, $email, $num, $lead, $prestosite, $sitetonego, $negotoclos, $bool, $sid, $cid);
		$stmt->execute();
		$stmt->close();
		header('Location: ' . $base_url . '/viewClient?id='.$cid);
	}
?>