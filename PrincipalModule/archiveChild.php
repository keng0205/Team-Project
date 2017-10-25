<?php
    require("config.php");
    require("includes/checkTimeout.php");

	$cIC = $_GET['id'];
	
	$result = mysqli_query($db,"SELECT * FROM children WHERE cIC='".$cIC."'");
	$row = $result->fetch_assoc(); 
	
	$cic = $row['cIC'];
	$cname = $row['cName'];
	$cemail = $row['cEmail'];
	$ohid = $row['oHID'];
	$category = $row['category'];
	$year = $row['year'];
	$schoolid = $row['schoolID'];
	$password = $row['password'];
	$salt = $row['salt'];
	$profilepicture = $row['profilePicture'];
	
	$archive = "INSERT INTO childrenArchive(
				cIC,
				cName,
				cEmail,
				oHID,
				category,
				year,
				schoolID,
				password,
				salt,
				profilePicture
			) VALUES ( 
				'$cic',
				'$cname',
				'$cemail',
				'$ohid',
				'$category',
				'$year',
				'$schoolid',
				'$password',
				'$salt',
				'$profilepicture'
			) 
	";
	
	mysqli_query($db,$archive);
	
	mysqli_query($db,"DELETE FROM children WHERE cIC='".$cIC."'");
	mysqli_close($db);
	echo '<script type="text/javascript">alert("Record archived successfully.");
		window.location="childrenList.php";</script>';
?> 