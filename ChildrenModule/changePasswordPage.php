<!DOCTYPE html>
<html>

<head>
	<?php include('/includes/bootstrap.php');?>
	<link rel="stylesheet" type = "text/css" href="css/mystyle.css">
	<?php include('/includes/header-with-logout.php');?>
	<?php include('/includes/navTabs.php');?>
</head>


<body onload="setTab()">
	
	<div class="content">		
		<div id="childrenDiv">
			<h1>Change Password</h1>
			<hr>
			<form name="updateform" action="changePassword.php" method="post">
			<div>
				<h2>Ic Number :</h2>
				<input class="editInputStyle" type="text" name="email" id="email">				
				<h2>Old Password :</h2>
				<input class="editInputStyle" type="password" name="oldpassword" id="oldpassword">
				<h2>New Password :</h2>
				<input class="editInputStyle" type="password" name="newpassword" id="newpassword">
				<h2>Retype New Password :</h2>
				<input class="editInputStyle" type="password" name="renewpassword" id="renewpassword">
			</div>
			<hr>
			<div id="saveBtnDiv">
				<button class="btn btn-secondary" id= "saveBtn" name="saveBtn" type="submit"><span>Confirm Password Change</span></button>
			</div>
			</form>
		</div>
	</div>
	
</body>

</html>