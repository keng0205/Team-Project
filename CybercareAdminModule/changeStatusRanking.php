<?php 
    require("config.php");
	$ID=$_GET['ID'];
	$status=$_GET['statusChange'];
	$year=$_GET['year'];
	$category=$_GET['category'];
	
	$query="UPDATE improvementpoint SET status='$status' WHERE impID='$ID'; ";
	$db->query($query);
	mysqli_close($db);
		
	header("Location: viewAcademicRanking.php?year=".$year."&category=".$category.""); 
	die("Redirecting to loginpage.php"); 
			
		
?>