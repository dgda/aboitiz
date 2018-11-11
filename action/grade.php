<?php
	include('../templates/header.php');
	$thesisGrade = $_POST['fifth'];
	$presentorGrade = $_POST['ffourth'];
	$posterGrade = $_POST['fffourth'];

	$stmt = $conn->prepare('insert into thesisGrade(tg_grade) values(?)');
	$stmt->bind_param('s', $grade);
	for($i = 0; $i < count($thesisGrade); $i++){
		$grade = $thesisGrade[$i];
		$stmt->execute();
	}
	$stmt->close();
	$stmt = $conn->prepare('insert into presentorGrade(pg_grade) values(?)');
	$stmt->bind_param('s', $grade);
	for($i = 0; $i < count($presentorGrade); $i++){
		$grade = $presentorGrade[$i];
		$stmt->execute();
	}
	$stmt->close();
	$stmt = $conn->prepare('insert into posterGrade(posg_grade) values(?)');
	$stmt->bind_param('s', $grade);
	for($i = 0; $i < count($posterGrade); $i++){
		$grade = $posterGrade[$i];
		$stmt->execute();
	}
	$stmt->close();
?>
<div class="container">
	<div class="row">
		<div class="col s10 offset-s1 center">
			<h3>Successfully graded the students. Thank you for grading and have a good day.</h3>
		</div>
	</div>
</div>
<?php include('../templates/footer.php'); ?>