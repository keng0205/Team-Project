<?php 
	require("config.php"); 
	require("includes/checkTimeout.php");
	
	if(isset($_POST['cIC'])){
		$result = mysqli_query($db, 'select * from children where cic="'.$_POST['cIC'].'"');  
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			$result = mysqli_query($db, 'select * from orphanagehome where ohid = "'.$row['oHID'].'"'); 
			$row = $result->fetch_assoc();
			$oHName = $row['oHName'];
			
			echo '<script type="text/javascript">alert("Registration failed!\nThis child is already registered under :\n\n'.$oHName.'");
				window.location="regChildPage.php";</script>';	
		} 
		else{
			$cIC = $_POST['cIC'];
			$cName = $_POST['cName'];
			
			if(empty($_POST['cEmail'])){
				$cEmail = $_SESSION['user']['pEmail'];
			}else{
				$cEmail = $_POST['cEmail'];
			}
			
			$password = substr($cIC, 0, 6);
			
			$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
			$password = hash('sha256', $password . $salt); 
			for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
			
			$year = $_POST['year'];
			
			if(strpos($year, "Standard") !== false){
				$category = "primary";
			}
			elseif(strpos($year, "Form 4") !== false || strpos($year, "Form 5") !== false){
				$category = "upperSecondary";
			}
			else{
				$category = "lowerSecondary";
			}
			
			$schoolID = $_POST['school'];
			$oHID = $_SESSION['user']['oHID'];

			$query = " 
				INSERT INTO children ( 
					cIC,
					cName,
					cEmail,
					year,
					category,
					schoolID,
					oHID,
					password,
					salt
				) VALUES ( 
					'$cIC',
					'$cName',
					'$cEmail',
					'$year',
					'$category',
					'$schoolID',
					'$oHID',
					'$password',
					'$salt'
				) 
			"; 
			
			if($db->query($query)){
				mysqli_close($db);
				echo '<script type="text/javascript">alert("Registration successful!\nNew child has been added.");
				window.location="regChildPage.php";</script>';			
			}
		}
	}else{
		header('Location: regChildPage.php');
	}
	
?>