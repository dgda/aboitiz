<?php include('../templates/header.php'); ?>
<div class="container">
	<div class="row center">
		<h4 class="light">Potential Leads List</h4>
	</div>
	<div class="row" id="r">
		<?php
			$query = 'select client_id as id, client_name as name from clients where client_taken = "0" order by client_id desc';
			$result = $conn->query($query);
			while($row = $result->fetch_object()):
		?>
		<div class="row">
			<div class="col s9"><p class="light"><strong><?= $row->name ?></strong></p></div>
			<div class="col s3"><a href="<?= $base_url ?>/viewClient?id=<?= $row->id ?>"><i class="material-icons">pageview</i></a></div>
		</div>
		<hr>
		<?php endwhile; ?>
	</div>
</div>
<script>
	window.onload = function(){
		setTimeout(() => {
			$.ajax({
				url: 'pot.php',
				success: function(data){
					$('#r').html(data);
				}
			});
		}, 2000);
	};
</script>
<?php include('../templates/footer.php'); ?>