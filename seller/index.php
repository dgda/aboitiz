<?php include('../templates/header.php'); ?>
	
	<?php if(!isset($_GET['login'])): ?>
		
			<div id='index-banner' class='parallax-container'>
			  <div class='section no-pad-bot'>
				<div class='container'>
				  <br><br>
				  <h1 class='header center teal-text text-lighten-2'>Seller Login</h1>
				  <div class='row center'>
					<h5 class='header col s12 light'><a href="<?= $base_url ?>/seller?login=y">Click here to login</a></h5>
				  </div>
				  <br><br>
		  
				</div>
			  </div>
			</div>
<?php else:
		$stmt = $conn->prepare('insert into sellers(seller_password) values (?)');
		$stmt->bind_param('s', md5('password'));
		$stmt->execute();
		$stmt->close();
		session_start();
		$_SESSION['sid'] = $conn->query('select max(seller_id) as max from sellers')->fetch_object()->max;
?>
<div class='container'>
	<div class='row'>
		<div class='col s12 m6'>
		<div class="card">
			<div class="card-image">
			<img src="<?= $base_url ?>/templates/pics/1.jpg" height="250">
			<span class="card-title">Potential Leads</span>
			</div>
			<div class="card-action">
			<a href="<?= $base_url ?>/potential">View them!</a>
			</div>
		</div>
		</div>

		<div class='col s12 m6'>
		<div class="card">
			<div class="card-image">
			<img src="<?= $base_url ?>/templates/pics/2.jpg" height="250">
			<span class="card-title">Current Clients</span>
			</div>
			<div class="card-action">
			<a href="<?= $base_url ?>/current">Nurture them!</a>
			</div>
		</div>
		</div>
	</div>
</div>

<?php endif; ?>
	</div>
<?php include('../templates/footer.php'); ?>