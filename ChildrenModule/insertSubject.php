<?php 
	require("config.php"); 
	
	$user = $_SESSION['user'];
		

	$statement ="SELECT cIC
				FROM children 
				WHERE cIC='$user'";
	$result = mysqli_query($db,$statement);
	$row = $result->fetch_assoc();
	$cIC = $row['cIC'];
	$year=date("Y");


	if(isset($_POST['submit']))
	{//to run PHP script on submit
		if(!empty($_POST['check_list']))
			{
	// Loop to store and insert values of individual checked checkbox.
				foreach($_POST['check_list'] as $selected)
					{
					$statement = "INSERT INTO result (sID,year,cID)
								  VALUES($selected,$year,'$cIC')";
				
					$db->query($statement);
					echo$selected;
					}
			}
	}
	
	
	

		header("Location: insertMark.php"); 
		die("Redirecting to index.php"); 
	
	
	
	
?>