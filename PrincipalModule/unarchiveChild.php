<?php
    require("config.php");
    require("includes/checkTimeout.php");

	$cIC = $_GET['id'];
	
	$result = mysqli_query($db,"SELECT * FROM childrenArchive WHERE cIC='".$cIC."'");
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
	
	$unArchive = "INSERT INTO children(
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
	
	mysqli_query($db,$unArchive);
	
	mysqli_query($db,"DELETE FROM childrenArchive WHERE cIC='".$cIC."'");
	mysqli_close($db);
	echo '<script type="text/javascript">alert("Record un-archived successfully.");
		window.location="childrenArchiveList.php";</script>';
?> 