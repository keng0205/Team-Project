<?php 
	require("config.php");        
	$result = mysqli_query($db, 'select * from orphanageHome where pemail="'.$_POST['pemail'].'"');  
	if($result->num_rows > 0){ die("This email address is already registered"); } 
	else{
		// Security measures
		$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
		$password = hash('sha256', $_POST['ppassword'] . $salt); 
		for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
		
		$ohname = $_POST['ohname'];
		$ohadd1 = $_POST['ohadd1'];
		$ohadd2 = $_POST['ohadd2'];
		$ohpostcode = $_POST['ohpostcode'];
		$ohstate = $_POST['ohstate'];
		$ohcity = $_POST['ohcity'];
		$pemail = $_POST['pemail'];
		$ppassword = $password;
		$salt = $salt;
		$pname = $_POST['pname'];
		$pic = $_POST['pic'];
		$pphone = $_POST['pphone1'] . "-" . $_POST['pphone2'];
		
		$query = " 
			INSERT INTO orphanagehome ( 
				ohname,
				ohadd1,
				ohadd2,
				ohpostcode,
				ohstate,
				ohcity,
				pemail,
				ppassword,
				salt, 
				pname,
				pic,
				pphone,
				ohstatus
			) VALUES ( 
				'$ohname',
				'$ohadd1',
				'$ohadd2',
				'$ohpostcode',
				'$ohstate',
				'$ohcity',
				'$pemail',
				'$ppassword',
				'$salt', 
				'$pname',
				'$pic',
				'$pphone',
				'Active'
			) 
		"; 
		
		if($db->query($query)){
			mysqli_close($db);
			echo '<script type="text/javascript">alert("Registration Successful!");
			window.location="/AcademicPointManagement/loginPage.php";</script>';			
		}
		
	}
?>