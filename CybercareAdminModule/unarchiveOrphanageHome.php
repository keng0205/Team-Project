<?php
require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: loginpage.php");
        die("Redirecting to loginpage.php"); 
    }
	$oHID = $_GET['id'];
	
	$result = mysqli_query($db,"SELECT * FROM orphanagehome WHERE oHID='".$oHID."'");
	$row = $result->fetch_assoc(); 
	$statusChanged="Active";	
	
	$update = "UPDATE orphanagehome SET oHStatus='$statusChanged' WHERE oHID='$oHID'; ";
	
	mysqli_query($db,$update);
	
	mysqli_close($db);
	echo '<script type="text/javascript">alert("Record(s) archived successfully.");
		window.location="orphanageHomeArchiveList.php";</script>';
	?>