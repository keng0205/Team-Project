<?php
    require("config.php");
    require("includes/checkTimeout.php");
	
	if($_SESSION['user']['pEmail'] != $_POST['pemail']){
		echo '<script type="text/javascript">alert("Incorrect email.");
		window.location="changePasswordPage.php";</script>';
	}
	else{
		if(strlen($_POST['oldpassword']) < 1){
			echo '<script type="text/javascript">alert("Please insert old password.");
			window.location="changePasswordPage.php";</script>';
		}
		elseif(strlen($_POST['newpassword']) < 6){
			echo '<script type="text/javascript">alert("New password must contain\nat least 6 characters.");
			window.location="changePasswordPage.php";</script>';
		}
		else{
			if($_POST['newpassword'] == $_POST['renewpassword']){
				$result = mysqli_query($db, 'select * from orphanageHome where pemail="'.$_SESSION['user']['pEmail'].'"'); 
				$login_ok = false; 
				$row = $result->fetch_assoc(); 
				if($row){ 
					$check_password = hash('sha256', $_POST['oldpassword'] . $row['salt']); 
					for($round = 0; $round < 65536; $round++){
						$check_password = hash('sha256', $check_password . $row['salt']);
					} 
					if($check_password === $row['pPassword']){
						$login_ok = true;
					} 
				} 
				
				if($login_ok){   
					$ohid = $row['oHID'];
					$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
					$password = hash('sha256', $_POST['newpassword'] . $salt); 
					for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
					
					$query = " 
						UPDATE orphanagehome set 
							ppassword = '$password',
							salt = '$salt'
							WHERE ohid = '$ohid'
					"; 
					
					$db->query($query);
					echo '<script type="text/javascript">alert("Password changed successfully.");
					window.location="changePasswordPage.php";</script>';				
				} 
				else{
					echo '<script type="text/javascript">alert("Incorrect Password.");
					window.location="changePasswordPage.php";</script>'; 
				}
			}
			else{
				echo '<script type="text/javascript">alert("New passwords do not match.");
				window.location="changePasswordPage.php";</script>';
			}
			
		}
	}
?>