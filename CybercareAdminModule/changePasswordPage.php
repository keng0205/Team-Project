<?php
	require("config.php");
	require("includes/checkTimeout.php");
	$username = $_SESSION['user']['admin_username'];
	
	$query = "
	SELECT * from staff
	WHERE admin_username = '$username'
	";
	
	$result = mysqli_query($db, $query);
	$user = $result->fetch_assoc();
	$right= $user['rights'];
?>

<!DOCTYPE html>
<html>

<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<?php include('/includes/header-with-logout.php');?>
	<?php include('/includes/staffNav.php');?>
</head>

<script>
	function setTab(){
		document.getElementsByClassName("nav-link")[2].classList.add("active");
	}
</script>

<body onload="setTab()">
	
	<div class="content">		
		<div>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="oHprofile.php">Home</a></li>
				<li class="breadcrumb-item active">Change Password</li>
			</ol>
			<h1>Change Password</h1>
			<hr>
			<form name="updateform" action="changePassword.php" method="post">
				<table id="changePwTable">
					<tbody>
						<tr>
							<td><label>Username :</label></td>
							<td><input class = "chgPwTB" type="text" name="username" id="username"></td>
						</tr>
						<tr>
							<td><label>Old Password :</label></td>
							<td><input class = "chgPwTB" type="password" name="oldpassword" id="oldpassword"></td>
						</tr>
						<tr>
							<td><label>New Password :</label></td>
							<td><input class = "chgPwTB" type="password" name="newpassword" id="newpassword"></td>
						</tr>
						<tr>
							<td><label>Retype New Password :</label></td>
							<td><input class = "chgPwTB" type="password" name="renewpassword" id="renewpassword"></td>
						</tr>
					</tbody>
				</table>
			<hr>
			<div id="saveBtnDiv">
				<button class="btn btn-secondary" id= "saveBtn" name="saveBtn" type="submit"><span>Confirm Password Change</span></button>
			</div>
			</form>
		</div>
	</div>
	
</body>

</html>