<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: /AcademicPointManagement/loginpage.php");
        die("Redirecting to /AcademicPointManagement/loginpage.php"); 
    }
	$login=$_POST['email'];
	if($_POST['newpassword'] == $_POST['renewpassword'])
	{
			$statement="select * from  children where cIC='$login'";
			$result = mysqli_query($db, $statement); 
			$login_ok = false; 
			$row = $result->fetch_assoc(); 
			if($row){ 
				$check_password = hash('sha256', $_POST['oldpassword'] . $row['salt']); 
				for($round = 0; $round < 65536; $round++){
					$check_password = hash('sha256', $check_password . $row['salt']);
				} 
				if($check_password === $row['password']){
					$login_ok = true;
				} 
			} 
			
			if($login_ok){   
				
				$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
				$password = hash('sha256', $_POST['newpassword'] . $salt); 
				for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
				
				$query = " 
					UPDATE children set 
						Password = '$password',
						salt = '$salt'
						WHERE cIC = '$login'
				"; 
				
				$db->query($query);
				echo '<script type="text/javascript">alert("Password changed successfully.");
				window.location="/AcademicPointManagement/ChildrenModule/changePasswordPage.php";</script>';
			} 
			else{
				echo '<script type="text/javascript">alert("Incorrect Password.");
				window.location="/AcademicPointManagement/ChildrenModule/changePasswordPage.php";</script>'; 
			}
		
	}
	else
		{
		echo '<script type="text/javascript">alert("Incorrect Password.");
		window.location="/AcademicPointManagement/ChildrenModule/changePasswordPage.php";</script>'; 
		}
?>