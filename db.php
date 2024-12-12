<?php

define('SERVERNAME', '127.0.0.1:3306');
define('USERNAME', 'root');
define('PASSWORD', 'mariadb');
define('DBNAME', 'beauty_bliss');
try {
	
	$conn = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);
	if (!$conn) {
		die("connection failed".mysqli_connect_error());
	} 
	else {
		echo "Connected successfully";
	}
} 
catch (Exception $e) {
	die($e->getMessage());
}



?>
