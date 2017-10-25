<?php 
	
	$userErr=$nameErr=$passwordErr=$rightErr="";
	$username=$name=$sRights="";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		if(empty($_POST["username"])){
			$userErr = " *Username is required";
		}else{
			$username = test_input($_POST["username"]);
		}
		
		if(empty($_POST["name"])){
			$nameErr = " *Name is required";
		}else{
			$name = test_input($_POST["name"]);
		}
		
		if(empty($_POST["spassword"])){
			$passwordErr = " *Password is required";
		}else if(strlen($_POST["spassword"]) < 6){
			$passwordErr = " *Password must contains at least 6 characters";
		}else if(empty($_POST["rspassword"])){
			$passwordErr = " *Please re-enter the password";
		}else if(($_POST["spassword"])!=($_POST["rspassword"])){
			$passwordErr = " *Password re-enter wrongly";
		}
			else{
				$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
				$password = hash('sha256', $_POST['spassword'] . $salt); 
				for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
		}
		
		if($_POST["total"]==0){
			$rightErr=" *Please choose at least ONE right";
		}else
			$sRights = $_POST['total'];
	
	}
	
	
        // Ensure that the user fills out fields 
		 if(!empty($_POST["username"])&&!empty($_POST["name"])&&!empty($_POST["spassword"])&&!empty($_POST["rspassword"])
			 &&(($_POST["spassword"])==($_POST["rspassword"]))&&($_POST["total"]!=0)){
				 
				$staff = mysqli_query($db, 'select * from staff where admin_username="'.$_POST['username'].'"');  
				$oH = mysqli_query($db, 'select * from orphanagehome where pEmail="'.$_POST['username'].'"');  
				$child = mysqli_query($db, 'select * from children where cIC="'.$_POST['username'].'"');  
				if(($staff->num_rows > 0)||($oH->num_rows > 0)||($child->num_rows > 0)){ 
					echo '<script type="text/javascript">alert("This Username had been registered! Please choose another username! ");
					window.location="registerStaffpage.php";</script>'; 
			} 
				else{
					// Security measures
					$status="Active";
					
					$query = " 
						INSERT INTO staff VALUES ( 
							'$username',
							'$password',
							'$salt',
							'$name',
							'$sRights',
							'$status'
						)
					"; 
					
					
					$db->query($query);
					echo '<script type="text/javascript">alert("Registration Successful!");
					window.location="staffList.php";</script>';
				}
			 }
		function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
		
?>