<?php 
	require("config.php"); 
	
	$user = $_SESSION['user'];
	$childrenEmail=$_POST['childrenEmail'];
	 $statement = "UPDATE children set
					cEmail='$childrenEmail'
					WHERE cIC='$user'";
	$db->query($statement);
	

		header("Location: childrenProfilePage.php"); 
		die("Redirecting to Homepage.php"); 
	
	
?>