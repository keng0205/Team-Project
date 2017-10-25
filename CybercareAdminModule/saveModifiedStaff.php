<?php 

	$nameErr=$rightErr="";
	
        // Ensure that the user fills out fields 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$username=$_POST["username"];
		
		if(empty($_POST["name"])){
			$nameErr = " *Name is required";
			$name="";
		}else{
			$name = test_input($_POST["name"]);
		}
		
		if($_POST["total"]==0)
			$rightErr=" *Please choose at least ONE right";
			$sRights = $_POST['total'];
	
	}
	if(!empty($_POST["name"])&&($_POST["total"]!=0)){
		// Security measures
		
		
		$query = "UPDATE staff SET admin_Name='$name', rights='$sRights' WHERE admin_username='$username';";
		
		if($db->query($query)){
			echo '<script type="text/javascript">alert("Staff Modified Successful!");
			window.location="staffList.php";</script>';
		}else{
			echo '<script type="text/javascript">alert("Staff Modified Unsuccessful!");
			window.location="staffList.php";</script>';
		}
	}
	
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
		
		
?>