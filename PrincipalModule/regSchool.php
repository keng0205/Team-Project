<?php 
	require("config.php"); 
	require("includes/checkTimeout.php");
	
	if(isset($_POST['schoolname'])){
		$result = mysqli_query($db, 'select * from school where schoolname="'.$_POST['schoolname'].'" AND schoolstate="'.$_POST['schoolState'].'"');  
		if($result->num_rows > 0){
			echo '<script type="text/javascript">alert("Registration failed!\nThis school is already registered.");
				window.location="regSchoolPage.php";</script>';	
		} 
		else{
			$name = $_POST['schoolname'];
			$type = $_POST['eduLevel'];
			$address1 = $_POST['schoolAdd1'];
			$address2 = $_POST['schoolAdd2'];
			$state = $_POST['schoolState'];
			$city = $_POST['schoolCity'];
			$postcode = $_POST['schoolPostcode'];
			$contact = $_POST['schoolContact1'] . "-" . $_POST['schoolContact2'];

			$query = " 
				INSERT INTO school ( 
					schoolname,
					schooltype,
					schooladdress1,
					schooladdress2,
					schoolstate,
					schoolcity,
					schoolposcode,
					schoolcontact
				) VALUES ( 
					'$name',
					'$type',
					'$address1',
					'$address2',
					'$state',
					'$city',
					'$postcode',
					'$contact'
				) 
			"; 
			
			if($db->query($query)){
				echo '<script type="text/javascript">alert("Registration successful!\nNew school has been added.");
				window.location="regSchoolPage.php";</script>';			
			}
		}
		mysqli_close($db);
	}else{
		header('Location: regSchoolPage.php');
	}
	
?>