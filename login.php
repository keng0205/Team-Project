<?php 
    require("config.php"); 
	
    $submitted_username = ''; 
    if(!empty($_POST['username']) && !empty($_POST['password'])){ 
	
		$_SESSION['Error'] = "Incorrect email or password.";
		
		$username = $_POST['username'];
		$login_ok = false; 
		
		//principal login
		if(strpos($username, '@')){
			$result = mysqli_query($db, 'select * from orphanageHome where pemail="'.$username.'"'); 
			
			$row = $result->fetch_assoc(); 
			if($row){ 
				$check_password = hash('sha256', $_POST['password'] . $row['salt']); 
				for($round = 0; $round < 65536; $round++){
					$check_password = hash('sha256', $check_password . $row['salt']);
				} 
				if($check_password === $row['pPassword']){
					$login_ok = true;
				} 
			} 
			
			if($login_ok && $row['oHStatus'] != "Active"){
				echo '<script type="text/javascript">alert("Account deactivated.\nPlease contact Cybercare for further instructions.");
				window.location="loginpage.php";</script>'; 
				break;
			}
			elseif($login_ok){  
				$_SESSION['user'] = $row;  
				header("Location: PrincipalModule/oHProfile.php"); 
				break;
			}
		}
		//children login
		if(is_numeric($username)){
			$result = mysqli_query($db, 'select * from children where cIC="'.$username.'"');
			$row = $result->fetch_assoc(); 
			if($row){ 
				$check_password = hash('sha256', $_POST['password'] . $row['salt']); 
				for($round = 0; $round < 65536; $round++){
					$check_password = hash('sha256', $check_password . $row['salt']);
				} 
				if($check_password === $row['password']){
					$login_ok = true;
				} 
			} 
			
			if($login_ok){  
				$_SESSION['user'] = $row['cIC'];
				//header needs to be changed
				header("Location: ChildrenModule/childrenProfilePage.php");
				break;				
			}
		}
		//cybercare login
			
			$result = mysqli_query($db, 'select * from staff where admin_username="'.$username.'"');
			$row = $result->fetch_assoc(); 
			if($row){ 
				$check_password = hash('sha256', $_POST['password'] . $row['salt']); 
				for($round = 0; $round < 65536; $round++){
					$check_password = hash('sha256', $check_password . $row['salt']);
				} 
				if($check_password === $row['admin_password']){
					$login_ok = true;
				} 
			}
			
			if($login_ok && $row['status'] != "Active"){
				echo '<script type="text/javascript">alert("Account deactivated.\nPlease contact Cybercare for further instructions.");
				window.location="loginpage.php";</script>'; 
				break;
			}
			elseif($login_ok){  
				$_SESSION['user'] = $row;
				//header needs to be changed
				header("Location: CybercareAdminModule/viewOrphanageHome.php");
				break;
			} 
			else{
				if(isset($_SESSION['user'])){
					unset($_SESSION['user']);
				}
				echo '<script type="text/javascript">alert("Invalid username or password.");
				window.location="loginpage.php";</script>'; 
			}		 
    }
	else{
		echo '<script type="text/javascript">alert("Please fill in username and password.");
		window.location="loginpage.php";</script>'; 
	}
?> 