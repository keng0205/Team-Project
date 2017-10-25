<?php 
	require("config.php");
	
	require("includes/checkTimeout.php");
	
	if(!isset($_SESSION['schoolID'])){
		header("Location: viewSchoolList.php");
		break;
	}
	
	$result = mysqli_query($db, 'select * from school where schoolid="'.$_SESSION['user']['oHID'].'"');  
	
	
	
	$ohid = $_SESSION['user']['oHID'];
	
	$schoolID = $_SESSION['schoolID'];
	
	$schoolName = $_POST['schoolName'];
	$schoolType = $_POST['schoolType'];
	$schoolAddress1 = $_POST['schoolAddress1'];
	$schoolAddress2 = $_POST['schoolAddress2'];
	$schoolState = $_POST['schoolState'];
	$schoolCity = $_POST['schoolCity'];
	$schoolPoscode = $_POST['schoolPoscode'];
	$schoolContact = $_POST['schoolContact1'] ."-". $_POST['schoolContact2'];
	
	$query = " 
		UPDATE school set 
			schoolName = '$schoolName',
			schoolType = '$schoolType',
			schoolAddress1 = '$schoolAddress1',
			schoolAddress2 = '$schoolAddress2',
			schoolState = '$schoolState',
			schoolCity = '$schoolCity',
			schoolPoscode = '$schoolPoscode',
			schoolContact = '$schoolContact'
			WHERE schoolID = '$schoolID'
	"; 

	if(mysqli_query($db, $query)){
		echo '<script type="text/javascript">alert("Changes saved successfully.");
		window.location="viewSchoolList.php";</script>';
	}
	else{
		echo '<script type="text/javascript">alert("Save error.");
		window.location="viewSchoolList.php";</script>';
	}

?>