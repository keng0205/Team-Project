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
	
	$ID=$_GET['id'];	

	$query = "
	SELECT * from orphanagehome
	WHERE oHID = '$ID'
	";
	
	$result = mysqli_query($db, $query);
	$row = $result->fetch_assoc();
	$_SESSION['OH'] = $row;
	$oHID = $_SESSION['OH']['oHID'];
	$status = $_SESSION['OH']['oHStatus'];
	$oHName = $row['oHName'];
	$oHAdd1 = $row['oHAdd1'];
	$oHAdd2 = $row['oHAdd2'];
	$oHPostcode = $row['oHPostcode'];
	$oHState = $row['oHState'];
	$oHCity = $row['oHCity'];
	$pName = $row['pName'];
	$pIC = $row['pIC'];
	$pEmail = $row['pEmail'];
	$pPhone = $row['pPhone'];
	
	
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
		document.getElementsByClassName("nav-link")[0].classList.add("active");
	}
</script>

<body onload="setTab()">

	<div class="content">
	<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="viewOrphanageHome.php">Home</a></li>
			<li class="breadcrumb-item"><a href="viewOrphanageHome.php">Orphanage home List</a></li>
			<?php if($status=="Archive"){ ?>
			<li class="breadcrumb-item"><a href="orphanageHomeArchiveList.php">Archived Orphanage home List</a></li>
			<?php }?>
			<li class="breadcrumb-item">Orphanage Home Profile</li>
		</ol>
			<fieldset>
				<div id="oHProfileDiv">
					<legend><h1>Orphanage Home</h1></legend>
					<hr>
					<div>
						<h2>Home's Name :</h2>
						<h3><?php echo $row['oHName']; ?></h3>
						<h2>Address Line 1 :</h2>
						<h3><?php echo $row['oHAdd1']; ?></h3>
						<h2>Address Line 2 :</h2>
						<h3><?php echo $row['oHAdd2']; ?></h3>
						<h2>Postcode :</h2>
						<h3><?php echo $row['oHPostcode']; ?></h3>
						<h2>State :</h2>
						<h3><?php echo $row['oHState']; ?></h3>
						<h2>City :</h2>
						<h3><?php echo $row['oHCity']; ?></h3>
					</div>
					<div id="principalDiv">
					<fieldset>
						<legend><h1>Principal</h1></legend>
						<hr>
						<h2>Name :</h2>
						<h3><?php echo $row['pName']; ?></h3>
						<h2>IC :</h2>
						<h3><?php echo $row['pIC']; ?></h3>
						<h2>Email :</h2>
						<h3><?php echo $row['pEmail']; ?></h3>
						<h2>Contact Number :</h2>
						<h3><?php echo $row['pPhone']; ?></h3>
					</fieldset>
					</div>
					<div id="editBtnDiv">
						<form action="childrenList.php">
							<button class="btn btn-secondary" id= "editBtn" name="editBtn" type="submit"><span>View Children List</span></button>
						</form>
					</div>
				</div>
			</fieldset>

	</div>
	
</body>

</html>