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
<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<?php include('/includes/header-with-logout.php');?>
	<script src="js/validationFormStaff.js" type="text/javascript"></script>
	<?php include('/includes/staffNav.php');?>
	<?php include('registerStaff.php');?>
	<script>
	function calRight(){
		var val=0;
		if(document.form.a.checked)
		{
			val+=parseInt(document.form.a.value);
		}
		if(document.form.b.checked)
		{
			val+=parseInt(document.form.b.value);
		}
		if(document.form.c.checked)
		{
			val+=parseInt(document.form.c.value);
		}
		if(document.form.d.checked)
		{
			val+=parseInt(document.form.d.value);
		}
		if(document.form.e.checked)
		{
			val+=parseInt(document.form.e.value);
		}
		document.form.total.value=val;
	}
	
	function setTab(){
		document.getElementsByClassName("nav-link")[1].classList.add("active");
	}
	
	</script>
</head>
<body onload="setTab()">
	<div class="content">
	<ol class="breadcrumb">
			<li class="breadcrumb-item">Maintenance</li>
			<li class="breadcrumb-item"><a href="staffList.php">Staff List</a></li>
			<li class="breadcrumb-item">Register New Staff</li>
		</ol>
		<?php if(countRight($right,1)) { ?>
		<h1>Register New Staff</h1>
		<hr>
		<span style="color:red;text-align : right;width : 100%;padding : 5px 20px;font-size : 15px;display : block;">* required field</span>
		<form name="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit=" return validateFormStaff()">
			
			<h2>Username : </h2>
			<input class="editInputStyle" type="text" name="username" id="username" value="<?php echo $username;?>">
			<span style="color:red;"><?php echo $userErr;?></span><span style="color:red;">*</span><br>
			<h2>Name : </h2>
			<input class="editInputStyle" type="text" name="name" id="name" value="<?php echo $name;?>">
			<span style="color:red;"><?php echo $nameErr;?></span><span style="color:red;">*</span><br>
			<h2>Password : </h2>
			<input class="editInputStyle" type="password" name="spassword" id="spassword">
			<span style="color:red;">*minimum 6 characters</span><br>
			<h2>Re-type Password : </h2>
			<input class="editInputStyle" type="password" name="rspassword" id="rspassword"><span style="color:red;">*</span><br>
			<div style="text-align: center;">
				<span style="color:red;"><?php echo $passwordErr;?></span>
			</div>
			<fieldset style="padding-top:10px;width:50%;margin:auto;border: 2px solid;">
				<legend style="margin-left:100px;">Rights
				<span style="color:red;">*</span></legend>
				<div style="width:50%;display:block;margin:auto;">
			
					<input type="checkbox" name="a" value="1" <?php if(countRight($sRights,1))echo "checked";?>><span>Register, view and modify staff</span></input><br>
					<input type="checkbox" name="b" value="2" <?php if(countRight($sRights,2))echo "checked";?>><span>Maintain subject offered</span></input><br>
					<input type="checkbox" name="c" value="4" <?php if(countRight($sRights,4))echo "checked";?>><span>Set deadline</span></input><br>
					<input type="checkbox" name="d" value="8" <?php if(countRight($sRights,8))echo "checked";?>><span>Ranking handling</span></input><br>
					<input type="checkbox" name="e" value="16" <?php if(countRight($sRights,16))echo "checked";?>><span>Maintain orphanage home</span></input><br><br>
					<input type="hidden" name="total" value="0" readonly="readonly">
				</div>
			</fieldset>
			<div style="text-align: center;">
				<span style="color:red;font-size:16px;"><?php echo $rightErr;?></span>
			</div>
			<hr>
			<div id="saveBtnDiv">
			<button class="btn btn-secondary" onclick="calRight()" type="submit">Register</button>
			</div>
		</form>
	<?php }else{?>
		
		<div style="text-align: center;">
		<h2><span style="color:red;">***You Have No Authorization To View This Page***</span></h2>
		<a href="viewOrphanageHome.php" class="btn btn-secondary">Back to Home Page</a>
		</div>
		
		
		<?php }?>
	</div>
</body>