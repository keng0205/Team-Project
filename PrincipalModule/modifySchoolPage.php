<?php
	require("config.php");
    require("includes/checkTimeout.php");

	$schoolID = $_GET['id'];
	$_SESSION['schoolID'] = $schoolID;
	$result = mysqli_query($db,"SELECT * FROM school WHERE schoolID='".$schoolID."'");
	$row = $result->fetch_assoc(); 
	
	$telParts = explode("-", $row['schoolContact']);

	$schoolTypes = ['Primary School', 'Secondary School'];
	
	$states = ['Johor','Kedah','Kelantan','Kuala Lumpur','Labuan','Melaka','Negeri Sembilan','Pahang','Penang','Perak',
				'Perlis','Sabah','Sarawak','Selangor','Terengganu'];

	mysqli_close($db);

?> 

<!DOCTYPE html>
<html>

<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<script src="js/validateSchoolForm.js" type="text/javascript"></script>
	<?php include('/includes/header-with-logout.php');?>
	<?php include('/includes/navTabs.php');?>
</head>

<script>
	function setTab(){
		document.getElementsByClassName("nav-link")[1].classList.add("active");
	}
</script>

<body onload="setTab()">
	
<div  class="wrapper">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="oHprofile.php">Home</a></li>
		<li class="breadcrumb-item"><a href="viewSchoolList.php">School List</a></li>
		<li class="breadcrumb-item active">Modify School</li>
	</ol>
	<form name="form" action="modifySchool.php" method="post" onsubmit=" return validateSchoolForm()">
		<fieldset>
			<h2>Modify School</h2>
			<hr>
			<div id="OHD">
				<div id="OH">
					<table class="formTable">
						<tbody>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">School Name :</label></td>
								<td class="inputTD"><input class="regInputStyle" type="text" name="schoolName" id="schoolname" maxlength="50" value="<?php echo $row['schoolName']; ?>"></td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">Education Level :</label></td>
								<td class="inputTD eduRadioTd">
								
								<?php
								for($i = 0; $i < sizeof($schoolTypes); $i++){
									if($schoolTypes[$i] == $row['schoolType']){
										echo "
											<div>
												<input class='eduRadio' type='radio' name='schoolType' value='".$schoolTypes[$i]."' checked>".$schoolTypes[$i]."</input>
											</div>									
										";
									}else{
										echo "
											<div>
												<input class='eduRadio' type='radio' name='schoolType' value='".$schoolTypes[$i]."'>".$schoolTypes[$i]."</input>
											</div>									
										";
									}
								}
								?>
								</td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">Contact :</label></td>
								<td class="inputTD">
								<input class="regInputStyle telFirst3" type="tel" name="schoolContact1" id="schoolContact1" maxlength="3" value="<?php echo $telParts[0]; ?>"> - 
								<input class="regInputStyle telRest" type="tel" name="schoolContact2" id="schoolContact2" maxlength="10" value="<?php echo $telParts[1]; ?>">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<fieldset>
				<legend class="regH3">Address</legend>
				<hr>
				<div id="AddDiv">
					<table class="formTable">
						<tbody>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">Address Line 1 :</label></td>
								<td class="inputTD"><input class="regInputStyle" type="text" name="schoolAddress1" id="schoolAdd1" value="<?php echo $row['schoolAddress1']; ?>"></td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">Address Line 2 :</label></td>
								<td class="inputTD"><input class="regInputStyle" type="text" name="schoolAddress2" id="schoolAdd2" value="<?php echo $row['schoolAddress2']; ?>"></td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">Postcode :</label></td>
								<td class="inputTD"><input class="regInputStyle" type="text" name="schoolPoscode" id="schoolPostcode" value="<?php echo $row['schoolPoscode']; ?>"></td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">State :</label></td>
								<td class="inputTD">
									<select class="regInputStyle" name="schoolState">
										<?php
											for($i = 0; $i < sizeof($states); $i++){
												if($states[$i] == $row['schoolState']){
													echo "<option id='".$states[$i]."' selected value='".$states[$i]."'>".$states[$i]."</option>";
												}else{
													echo "<option id='".$states[$i]."' value='".$states[$i]."'>".$states[$i]."</option>";
												}
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">City :</label></td>
								<td class="inputTD"><input class="regInputStyle" type="text" name="schoolCity" id="schoolCity" value="<?php echo $row['schoolCity']; ?>"></td>
							</tr>						
						</tbody>
					</table>	
				</div>
				</fieldset>
				<hr>
				<div id="regNextDiv">
					<button class="btn btn-secondary" id= "addSchoolBtn" name="addSchoolBtn" type="submit"><span>Save</span></button>
				</div>
			</div>
		</fieldset>
	</form>
</div>
	
</body>

</html>