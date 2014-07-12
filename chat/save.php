<?php
include_once('config.php');
if (isset($_POST['text'])) {

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("chat", $con);

$message=$_POST['text'];
		$sender=$_SESSION['username'];
	$query = "INSERT INTO message (message,sender) VALUES ('$message','$sender')";
	mysql_query($query);
	
}

?>