<?php 
    require("config.php");
		
			$id = $_GET['id'];
			$query = "SELECT * FROM subject WHERE sID='$id';";
			$result= mysqli_query($db, $query);
			$row = $result->fetch_assoc(); 
			if($row['status']=="Active")
				$statusChanged="Archive";
			else
				$statusChanged="Active";
			
			$query = "UPDATE subject SET status='$statusChanged' WHERE sID='$id'; ";
			
			$db->query($query);
			header("Location: modifySubjectPage.php?category=".$row['category'].""); 
			die("Redirecting to loginpage.php"); 
			
		
?>