<?php
    require("config.php");
    require("includes/checkTimeout.php");
	
	if($_SESSION['user']['admin_username'] != $_POST['username']){
		echo '<script type="text/javascript">alert("Incorrect username.");
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
				$result = mysqli_query($db, 'select * from staff where admin_username="'.$_SESSION['user']['admin_username'].'"'); 
				$login_ok = false; 
				$row = $result->fetch_assoc(); 
				if($row){ 
					$check_password = hash('sha256', $_POST['oldpassword'] . $row['salt']); 
					for($round = 0; $round < 65536; $round++){
						$check_password = hash('sha256', $check_password . $row['salt']);
					} 
					if($check_password === $row['admin_password']){
						$login_ok = true;
					} 
				} 
				
				if($login_ok){   
					$username = $row['admin_username'];
					$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
					$password = hash('sha256', $_POST['newpassword'] . $salt); 
					for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
					
					$query = " 
						UPDATE staff SET 
							admin_password = '$password',
							salt = '$salt'
							WHERE admin_username = '$username'
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