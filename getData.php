<?php
//constant variable
define('SERVERNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'students');
try {
	//connect with database
	$connect = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DBNAME);
	if (!$connect) {
		die("connection failed".mysqli_connect_error());
	} 
	else {
		//echo "Connected successfully";
	}
} 
catch (Exception $e) {
	die($e->getMessage());
}



?>
