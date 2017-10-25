<?php
    require("config.php");
	
	$modifiedSub = $_POST['newName'];
	$category=$_POST['category'];
	
	if($_POST['newName']==""){
		echo '<script type="text/javascript">alert("Please Enter the Subject Name");
		window.location="../CybercareAdminModule/modifySubjectPage.php?category='.$category.'";</script>';
	}else{
	
	$sID=$_POST['id'];
	$query = "SELECT * FROM subject where sName='$modifiedSub' AND category='$category' AND sID!='$sID';";
	$result= mysqli_query($db, $query);
	if($result->num_rows ==0){ 
		$query = "SELECT * FROM subject where sID='$sID';";
		$coreSubject=$_POST['newSubType'];
		$query = "UPDATE subject SET sName='$modifiedSub',coreSubject='$coreSubject'  WHERE sID='$sID'; ";
		$db->query($query);
		header("Location: modifySubjectPage.php?category=".$category.""); 
		}
		else
		{
			echo '<script type="text/javascript">alert("Duplicate Subject Name");
		window.location="../CybercareAdminModule/modifySubjectPage.php?category='.$category.'";</script>';
			
		}
		
		mysqli_close($db);
		die("Redirecting to loginpage.php"); 
	}
?>