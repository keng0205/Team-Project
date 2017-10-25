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
	
	$telParts = explode("-", $row['pPhone']);
	
	$states = ['Johor','Kedah','Kelantan','Kuala Lumpur','Labuan','Melaka','Negeri Sembilan','Pahang','Penang','Perak',
				'Perlis','Sabah','Sarawak','Selangor','Terengganu'];
	
	$oHName = $row['oHName'];
	$oHAdd1 = $row['oHAdd1'];
	$oHAdd2 = $row['oHAdd2'];
	$oHPostcode = $row['oHPostcode'];
	$oHState = $row['oHState'];
	$oHCity = $row['oHCity'];
	$pName = $row['pName'];
	$pIC = $row['pIC'];
	$pEmail = $row['pEmail'];
	
?>

<!DOCTYPE html>
<html>

<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<?php include('/includes/header-with-logout.php');?>
	<?php include('/includes/phpFunctions.php');?>
	<?php include('/includes/navTabs.php');?>
	<script src="js/validateEditOH.js" type="text/javascript"></script>
</head>

<script>
	function setTab(){
		document.getElementsByClassName("nav-link")[0].classList.add("active");
	}
</script>

<body onload="setTab()">
	
	<div class="content">	
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="oHprofile.php">Home</a></li>
			<li class="breadcrumb-item active">Edit Orphanage Profile</li>
		</ol>
		<h1>Edit Orphanage Home</h1>
		<hr>
		<div id="oHProfileDiv">
			<h1>Orphanage Home</h1>
			<hr>
			<span class="reqField right-align">* required field</span>
			<form name="form" action="saveOH.php" method="post" onsubmit=" return validateEditOH()">
			<div>
				<h2>Home's Name :</h2>
				<input class="editInputStyle" type="text" name="ohname" id="ohname" maxlength="50" value="<?php echo $row['oHName']; ?>"><span class="reqField"> *</span>				
				<h2>Address Line 1 :</h2>
				<input class="editInputStyle" type="text" name="ohadd1" id="ohadd1" maxlength="50" value="<?php echo $row['oHAdd1']; ?>"><span class="reqField"> *</span>
				<h2>Address Line 2 :</h2>
				<input class="editInputStyle" type="text" name="ohadd2" id="ohadd2" maxlength="50" value="<?php echo $row['oHAdd2']; ?>">
				<h2>Postcode :</h2>
				<input class="editInputStyle poscodeInput" type="text" name="ohpostcode" id="ohpostcode" maxlength="5" value="<?php echo $row['oHPostcode']; ?>"><span class="reqField"> *</span>
				<br>
				<h2>State :</h2>
				<select class="editInputStyle" name="ohstate" id="ohstate">
				<?php
					for($i = 0; $i < sizeof($states); $i++){
						if($states[$i] == $oHState){
							echo "<option id='".$states[$i]."' selected value='".$states[$i]."'>".$states[$i]."</option>";
						}else{
							echo "<option id='".$states[$i]."' value='".$states[$i]."'>".$states[$i]."</option>";
						}
					}
				?>
				</select><span class="reqField"> *</span>
				<h2>City :</h2>
				<input class="editInputStyle" type="text" name="ohcity" id="ohcity" maxlength="30" value="<?php echo $row['oHCity']; ?>"><span class="reqField"> *</span>
			</div>
			<div id="principalDiv">
				<h1>Principal</h1>
				<hr>
				<h2>Name :</h2>
				<input class="editInputStyle" type="text" name="pname" id="pname" maxlength="50" value="<?php echo $row['pName']; ?>"><span class="reqField"> *</span>

				<h2>IC :</h2>
				<input class="editInputStyle" type="text" name="pic" id="pic" maxlength="12" placeholder="Enter IC number without any symbols. eg : 123456789012" value="<?php echo $row['pIC']; ?>"><span class="reqField"> *</span>

				<h2>Email :</h2>
				<input class="editInputStyle" type="email" name="pemail" id="pemail" maxlength="50" value="<?php echo $row['pEmail']; ?>"><span class="reqField"> *</span>

				<h2>Contact Number :</h2>
				<input class="editInputStyle telFirst3" type="text" name="pphone1" id="pphone1" maxlength="3" value="<?php echo $telParts[0]; ?>"> - 
				<input class="editInputStyle telRest" type="text" name="pphone2" id="pphone2" maxlength="10" value="<?php echo $telParts[1]; ?>"><span class="reqField"> *</span>
			</div>
			<div id="saveBtnDiv">
			
				<button class="btn btn-secondary" id= "saveBtn" name="saveBtn" type="submit"><span>Save</span></button>
			
			</div>
			</form>
		</div>
	</div>
	
</body>

</html>