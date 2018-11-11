<?php
	include('../templates/conn.php');
	if(!isset($_SESSION['login'])) header('Location: ' . $base_url . '/login');
	$query = 'select reg_stud_id as id, reg_lastName as lname, reg_firstName as fname, reg_college as c from registrants order by reg_lastName';
	$result = $conn->query($query);
	header("Content-type: application/vnd.ms-word");
	header("Content-Disposition: attachment;Filename=list.doc");    
	echo "<html>";
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
	echo "<body>";
	echo '<table>';
	echo '<thead>
		<tr>
			<td><b>ID</b></td>
			<td><b>Last Name</b></td>
			<td><b>First Name</b></td>
			<td><b>School or Company</b></td>
		</tr>
	</thead>
	<tbody>';
	while($row = $result->fetch_object()){
		//id, lname, fname, c
		echo '<tr>';
		echo '<td>'.$row->id.'</td>';
		echo '<td>'.$row->lname.'</td>';
		echo '<td>'.$row->fname.'</td>';
		echo '<td>'.$row->c.'</td>';
		echo '</tr>';
	}
	echo '</tbody></table>';
	echo $tableContent;
	echo "</body>";
	echo "</html>";
?>