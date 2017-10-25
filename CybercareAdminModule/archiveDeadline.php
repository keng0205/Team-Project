<?php 
    require("config.php");
		
			$id = $_GET['id'];
			$year =$_GET['year'];
			$query = "SELECT * FROM deadline WHERE id='$id';";
			$result= mysqli_query($db, $query);
			$row = $result->fetch_assoc(); 
			if($row['status']=="Active")
				$statusChanged="Archive";
			else
				$statusChanged="Active";
			
			$query = "UPDATE deadline SET status='$statusChanged' WHERE id='$id'; ";
			
			$db->query($query);
			header("Location: set deadline.php?yearSelected=".$year."&searchBtn="); 
			die("Redirecting to loginpage.php"); 
			
		
?>