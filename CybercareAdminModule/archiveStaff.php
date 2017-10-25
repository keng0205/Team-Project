<?php 
    require("config.php");
	require("includes/checkTimeout.php");	
			$username = $_GET['username'];
			$query = "SELECT * FROM staff WHERE admin_username='$username';";
			$result= mysqli_query($db, $query);
			$row = $result->fetch_assoc(); 
			if($row['status']=="Active")
				$statusChanged="Archive";
			else
				$statusChanged="Active";
			
			$query = "UPDATE staff SET status='$statusChanged' WHERE admin_username='$username'; ";
			
			$db->query($query);
			header("Location: staffList.php?"); 
			
		
?>