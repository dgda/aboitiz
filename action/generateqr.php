<?php
	include('../templates/conn.php');
	include('../templates/phpqrcode/qrlib.php');
	$dir = '../files';
	$did = '../files/';
	$files = scandir($did);
	$query = 'select reg_id as id from registrants';
	$result = $conn->query($query);
	$bool = false;
	while($row = $result->fetch_object()){
		$filename = $row->id . '.png';
		if(!in_array($filename, $files)){
			$q = 'select reg_firstName as fname, reg_lastName as lname, reg_email as email, reg_verificationCode as verif_code, reg_college as college, reg_stud_id as id from registrants where reg_id = ' . $row->id;
			$qr = $conn->query($q);
			$qrow = $qr->fetch_object();
			$name = $qrow->fname . ' ' . $qrow->lname;
			$id = $qrow->id;
			$email = $qrow->email;
			$verifcode = $qrow->verif_code;
			$college = $qrow->college;
			$content = '!!! ' . crypt($row->id) . ' !!!
@@@ ' . crypt($name) . ' @@@
### ' . crypt($id) . ' ###
$$$ ' . crypt($email) . ' $$$
~~~ ' . $verifcode . ' ~~~
::: ' . crypt($college) . ' :::';
			$filename = $row->id . '.png';
			$filepath = $dir.'/'.$filename;
			QRcode::png($content, $filepath);
			$bool = true;
		}
	}
	if(!$bool) echo 'Successful<br/><a href="'.$base_url.'/admin">Go Back</a>';
?>