<?php include('../templates/header.php'); 
$cid = $_GET['id']; ?>
<?php
	$query = 'select * from clients where client_id = ' . $cid;
	$result = $conn->query($query);
	$row = $result->fetch_object();
?>
<div class="container">
	<div class="row center">
		<h4 class="light"><?php if($row->client_taken == '1') echo 'Client'; else echo 'Potential Lead'; ?> No. <?= $cid ?></h4>
	</div>
	<div class="row center">
		<div class="col s8 offset-s2">
			<form id="form1" action="<?= $base_url ?>/action/editClient.php?id=<?=$cid?>" method="post">
				<div class="row">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" value="<?= $row->client_name ?>">
				</div>
				
				<div class="row">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" value="<?= $row->client_email ?>">
				</div>
				
				<div class="row">
					<label for="number">Contact Number</label>
					<input type="number" name="number" id="number" value="<?= $row->client_number ?>">
				</div>
				<div class="row">
					<?php
						$a1 = $row->client_options[0];
						$str = '';
						if($a1 == '1') $str = 'batangas';
						if($a1 == '2') $str = 'tarlac';
						if($a1 == '3') $str = 'nueva';
					?>
					<h5>Preferred Location: <?= $str ?></h5>
				</div>
				<div class="row">
					<?php
						$a1 = $row->client_options[1];
						if($a1 == '1') $str = '1 bedroom';
						if($a1 == '2') $str = '2 bedroom';
						if($a1 == '3') $str = 'townhouse';
					?>
					<h5>Preferred House: <?= $str ?></h5>
				</div>
				<div class="row">
					<?php
						$a1 = $row->client_options[2];
						if($a1 == '1') $str = '1st home';
						if($a1 == '2') $str = '2nd home';
						if($a1 == '3') $str = 'Vacation House';
					?>
					<h5>Buyer Type: <?= $str ?></h5>
				</div>
				<div class="row">
					<?php
						$a1 = $row->client_options[4];
						if($a1 == '1') $str = 'pool';
						if($a1 == '2') $str = 'clubhouse';
						if($a1 == '3') $str = 'park';
					?>
					<h5>Amenities: <?= $str ?></h5>
				</div>
				<div class="row">
					<label for="lead">Lead Management</label>
					<select name="lead" id="lead">
						<option value="0" disabled selected></option>
						<option value="1" <?php if($row->client_lead == '1') echo 'selected'; ?>>Warm</option>
						<option value="2" <?php if($row->client_lead == '2') echo 'selected'; ?>>Cold</option>
						<option value="3" <?php if($row->client_lead == '3') echo 'selected'; ?>>Lost Opportunity</option>
					</select>
				</div>
				
				<div class="row">
					<div class="col s12 m4">
						<input form="form1" type="hidden" name="fi" value="<?= $row->client_prestosite ?>">
						<div class="card red white-text">
							<span class="large material-icons">timelapse</span><p class="d"><?= $row->client_prestosite ?></p>
							<p class="light"><small>Presentation to Site</small></p>
						</div>
					</div>
					<div class="col s12 m4">
						<input form="form1" type="hidden" name="se" value="<?= $row->client_sitetonego ?>">
						<div class="card red white-text">
							<span class="large material-icons">access_time</span><p class="d"><?= $row->client_sitetonego ?></p>
							<p class="light"><small>Site to Negotiate</small></p>
						</div>
					</div>
					<div class="col s12 m4">
						<input form="form1" type="hidden" name="thi" value="<?= $row->client_negotoclos ?>">
						<div class="card red white-text">
							<span class="large material-icons">timeline</span><p class="d"><?= $row->client_negotoclos ?></p>
							<p class="light"><small>Negotiate to Reserve</small></p>
						</div>
					</div>
				</div>
				<div class="row">
					<label>
						<input type="checkbox" name="conf" value="1" <?php if($row->client_taken == '1') echo 'checked' ?>>
						<span>Confirmed Buyer?</span>
					</label>
				</div>
				<div class="row">
					<!--
					<div class="col s12 m6">
						<a id="call" class="btn">Call this client.</a>
					</div>
-->
					<div class="col s6">
						<a href="<?= $base_url ?>/seller" class="btn">Logout</a>
					</div>
					<div class="col s6">
						<button id="submit" name="submit" type="submit" class="btn">Update details.</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	window.onload = function(){
		$('select').formSelect();
		$a = $('.card');
		$a.each(function(index){
			$(this).click(async function(){
				let text = '';
				let min = '1';
				let max = '100';
				let val = 10;
				if(index == 0) text = 'Presentation stage to site tripping';
				else if(index == 1) text = 'Site tripping to negotation';
				else text = 'Negotiation to reservation';
				const {'value': asd} = await swal({
					title: '# of days from',
					type: 'question',
					text: text,
					input: 'range',
					inputAttributes: {
						min: min,
						max: max,
						step: 1
					},
					inputValue: val
				});
				let $input = $(this).first();
				$input.val(asd);
				//alert($input.val());
				$(this).find('p.d').html(asd);
			});
		});
	};
</script>
<?php include('../templates/footer.php'); ?>