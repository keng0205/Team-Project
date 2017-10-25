<!DOCTYPE html>
<html>
<head>
	<?php include('/PrincipalModule/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="PrincipalModule/style/mystyle.css">
</head>

<body>

	<div class="headerBanner">
		<form action="login.php" method="post">
			<table class="loginTable">
				<tbody>
					<tr>
						<th rowspan = "2" class = "loginTHTD title"><h1 id="headerTitle">Cybercare Academic Point Management System</h1></th>
						<th class = "loginTHTD"><label class="labelStyle">IC / Email address :</label></th>
						<th class = "loginTHTD"><label class="labelStyle">Password :</label></th>
					</tr>
					<tr>
						<td class = "loginTHTD"><input class="inputStyle" type="text" name="username" id="username"></td>
						<td class = "loginTHTD"><input class="inputStyle" type="password" name="password" id="password"></td>
						<td class = "loginTHTD"><button id="loginBtn" class= "btn btn-outline-secondary" name="btnLogin" type="submit" value="login"><span>Log In</span></button></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>

</body>

</html>