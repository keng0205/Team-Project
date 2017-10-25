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

	if(isset($_GET['username'])){
		$staffUserName = $_GET['username'];
		$query = "
			SELECT * from staff
			WHERE admin_username = '$staffUserName'
			";
			
		$result = mysqli_query($db, $query);
		$staff = $result->fetch_assoc();
		$sRights= $staff['rights'];
		$username=$staff['admin_username'];
		$name=$staff['admin_Name'];
	}
?>

<!DOCTYPE html>
<html>

<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<?php include('/includes/header-with-logout.php');?>
	<?php include('/includes/staffNav.php');?>
	<?php include('saveModifiedStaff.php');?>
</head>

<script>
	function calRight(){
		var val=0;
		
		if(saveModifiedStaffForm.a.checked)
		{
			val+=parseInt(saveModifiedStaffForm.a.value);
		}
		if(saveModifiedStaffForm.b.checked)
		{
			val+=parseInt(saveModifiedStaffForm.b.value);
		}
		if(saveModifiedStaffForm.c.checked)
		{
			val+=parseInt(saveModifiedStaffForm.c.value);
		}
		if(saveModifiedStaffForm.d.checked)
		{
			val+=parseInt(saveModifiedStaffForm.d.value);
		}
		if(saveModifiedStaffForm.e.checked)
		{
			val+=parseInt(saveModifiedStaffForm.e.value);
		}
		
		saveModifiedStaffForm.total.value=val;
	}

	function setTab(){
		document.getElementsByClassName("nav-link")[1].classList.add("active");
	}
</script>

<body onload="setTab()">

	<div class="content">
	<ol class="breadcrumb">
			<li class="breadcrumb-item">Maintenance</li>
			<li class="breadcrumb-item"><a href="staffList.php">Staff List</a></li>
			<li class="breadcrumb-item">Modify Staff</li>
		</ol>
		<?php if(countRight($right,1)) { ?>
		<h1>Modify Staff</h1>
		<hr>
		<form name="saveModifiedStaffForm" id="saveModifiedStaffForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<h2>Username : </h2>
			<input style="background-color:#D5DBDB  ;" class="editInputStyle" type="text" name="username" id="username" readonly="readonly" value="<?php echo $username;?>"> <br>
			<h2>Name : </h2>
			<input class="editInputStyle" type="text" name="name" id="name" value="<?php echo $name;?>">
			<span style="color:red;"><?php echo $nameErr;?></span><br>
		
			<fieldset style="padding-top:10px;width:50%;margin:auto;border: 2px solid;">
				<legend style="margin-left:100px;">Rights</legend>
				<div style="width:50%;display:block;margin:auto;">
				
					<input type="checkbox" name="a" value="1" <?php if(countRight($sRights,1)) echo "checked";?>><span>Register, view and modify staff</span></input><br>
					<input type="checkbox" name="b" value="2" <?php if(countRight($sRights,2)) echo "checked";?>><span>Maintain subject offered</span></input><br>
					<input type="checkbox" name="c" value="4" <?php if(countRight($sRights,4)) echo "checked";?>><span>Set deadline</span></input><br>
					<input type="checkbox" name="d" value="8" <?php if(countRight($sRights,8)) echo "checked";?>><span>Ranking handling</span></input><br>
					<input type="checkbox" name="e" value="16" <?php if(countRight($sRights,16)) echo "checked";?>><span>Maintain orphanage home</span></input><br><br>
					<input type="hidden" name="total" value="<?php echo $sRights; ?>" readonly="readonly">
				</div>
			</fieldset>
			<div style="text-align: center;">
				<span style="color:red;font-size:16px;"><?php echo $rightErr;?></span>
			</div>
			
			<a href="staffList.php" class="btn btn-secondary">Cancel</a>
			<div style="float:right;">
			<button class="btn btn-secondary" onclick="calRight()" type="submit">Save</button>
			
			</div>
		</form>
		
		<?php }else{?>
		
		<div style="text-align: center;">
			<h2><span style="color:red;">***You Have No Authorization To View This Page***</span></h2><br>
			<a href="viewOrphanageHome.php" class="btn btn-secondary">Back to Home Page</a>
		</div>
		
		
		<?php }?>
	</div>
</body>
</html>