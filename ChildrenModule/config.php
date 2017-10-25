<?php
	require("dbcredentials.php");
     
	$db = mysqli_connect($host, $username, $password, $db) or die("Unable to connect to database");
	
	if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
	}	
	session_start();
?>