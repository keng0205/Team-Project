<?php 
	require("config.php"); 
	require("includes/checkTimeout.php");
	
	$result = mysqli_query($db, 'select * from orphanagehome where ohid="'.$_SESSION['user']['oHID'].'"');  
	
	$ohid = $_SESSION['user']['oHID'];
	
	$ohname = $_POST['ohname'];
	$ohadd1 = $_POST['ohadd1'];
	$ohadd2 = $_POST['ohadd2'];
	$ohpostcode = $_POST['ohpostcode'];
	$ohstate = $_POST['ohstate'];
	$ohcity = $_POST['ohcity'];
	$pemail = $_POST['pemail'];
	$pname = $_POST['pname'];
	$pic = $_POST['pic'];
	$pphone = $_POST['pphone1'] . "-" . $_POST['pphone2'];
	
	$query = " 
		UPDATE orphanagehome set 
			ohname = '$ohname',
			ohadd1 = '$ohadd1',
			ohadd2 = '$ohadd2',
			ohpostcode = '$ohpostcode',
			ohstate = '$ohstate',
			ohcity = '$ohcity',
			pemail = '$pemail',
			pname = '$pname',
			pic = '$pic',
			pphone = '$pphone'
			WHERE ohid = '$ohid'
	"; 

	$db->query($query);
	
	if($pemail != $_SESSION['user']['pEmail']){
		if(isset($_SESSION['user'])){
			unset($_SESSION['user']);
		}
		echo '<script type="text/javascript">alert("Email Address has been changed, please log in again with the new Email Address.");
		window.location="../loginpage.php";</script>';
	}
	else{
		echo '<script type="text/javascript">alert("Changes saved successfully.");
		window.location="oHProfile.php";</script>';
		
	}
	

?>