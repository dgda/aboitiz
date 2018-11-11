<?php
	include('../templates/conn.php');
	$query = 'select client_name, client_price from clients where client_seller != 0 order by client_id desc';
	$result = $conn->query($query);
	echo '<div class="row">';
	echo '<div class="col s6"><strong>Name</strong>';
	echo '</div>';
	echo '<div class="col s6"><strong>Price</strong>';
	echo '</div>';
	echo '</div>';
	while($row = $result->fetch_object()){
		echo '<div class="row">';
		echo '<div class="col s6">';
		echo $row->client_name;
		echo '</div>';
		echo '<div class="col s6">';
		echo $row->client_price;
		echo '</div>';
		echo '</div><hr/>';
	}
?>