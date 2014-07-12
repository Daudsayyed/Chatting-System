<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_DATABASE','chat');
define('DB_USERDB','register');

// Inialize session
if(!isset($_SESSION)){
	session_start();
}
?>