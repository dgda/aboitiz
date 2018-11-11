<?php
	include('../templates/conn.php');
	$query = 'select client_id as id, client_name as name from clients where client_taken = "0" order by client_id desc';
	$result = $conn->query($query);
	while($row = $result->fetch_object()): ?>
		<div class="row">
			<div class="col s9">
				<p class="light"><strong><?= $row->name ?></strong></p>
			</div>
			<div class="col s3">
				<a href="<?= $base_url ?>/viewClient?id=<?= $row->id ?>"><i class="material-icons">pageview</i></a>
			</div>
		</div><hr/>
	<?php endwhile;
	
?>