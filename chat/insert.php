<?php
include_once('config.php');

/// Connect
$link = mysql_connect(DB_HOST,DB_USER,DB_PASS);

mysql_select_db(DB_DATABASE) or die( "Unable to select database");


//query
$query = "INSERT INTO ".DB_USERDB."(username,password) 
                                 VALUES ('".$_POST['username']."','".$_POST['password']."')";

$data = mysql_query($query);

if($data){
    header('Location: login.php');
}else{
    echo "Error";
}


mysql_close($link);

?>