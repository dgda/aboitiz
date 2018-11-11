<?php
session_start();
$uname = $_SESSION['username'];
$msg = $_REQUEST['msg'];

$id = mysql_query('select max(id) from logs');
$date = mysql_query('select Date/Time from logs where id == "$id"');

$con = mysql_connect('localhost','root','');
mysql_select_db('chatbox', $con);

mysql_query("INSERT INTO logs (`username`, `msg`, 
	'Date/Time') VALUES ('$uname', '$msg' , now()");

$result1 = mysql_query("SELECT * FROM logs ORDER BY id DESC");

while($extract = mysql_fetch_array($result1)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
}