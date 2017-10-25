<?php
    require("config.php");
    require("includes/checkTimeout.php");
	
	$pemail = $_SESSION['user']['pEmail'];
	
	$query = "
	SELECT * from orphanagehome
	WHERE pemail = '$pemail'
	";
	
	$result = mysqli_query($db, $query);
	$row = $result->fetch_assoc();
	
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
	<?php include('/includes/navTabs.php');?>
</head>

<script>
	function setTab(){
		document.getElementsByClassName("nav-link")[0].classList.add("active");
	}
</script>

<body onload="setTab()">

	<div class="content">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active">Home</li>
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
						<h3><?php 
								if($row['oHAdd2'] != ""){
									echo $row['oHAdd2']; 
								}
								else{
									echo "-";
								}
								
							
							?></h3>
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
						<form action="editOH.php">
							<button class="btn btn-secondary" id= "editBtn" name="editBtn" type="submit"><span>Edit Orphanage Profile</span></button>
						</form>
					</div>
				</div>
			</fieldset>

	</div>
	
</body>

</html>