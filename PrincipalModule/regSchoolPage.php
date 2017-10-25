<?php
	require("config.php");
	require("includes/checkTimeout.php");
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
		<li class="breadcrumb-item active">Register New School</li>
	</ol>
	<form name="form" action="regSchool.php" method="post" onsubmit=" return validateSchoolForm()">
		<fieldset>
			<h2>Register New School</h2>
			<hr>
			<span class="reqField right-align">* required field</span>
			<div id="OHD">
				<div id="OH">
					<table class="formTable">
						<tbody>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">School Name :</label></td>
								<td class="inputTD"><input class="regInputStyle" type="text" name="schoolname" id="schoolname" maxlength="50"><span class="reqField"> *</span></td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">Education Level :</label></td>
								<td class="inputTD eduRadioTd">
									<div>
										<input class="eduRadio" type="radio" name="eduLevel" value="Primary School" checked>Primary School</input>
									</div>
									<div>
										<input class="eduRadio" type="radio" name="eduLevel" value="Secondary School">Secondary School</input>
									</div>
								</td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">Contact :</label></td>
								<td class="inputTD">
									<input class="regInputStyle telFirst3" type="tel" name="schoolContact1" id="schoolContact1" maxlength="3"> - 
									<input class="regInputStyle telRest" type="tel" name="schoolContact2" id="schoolContact2" maxlength="10">
									<span class="reqField"> *</span>
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
								<td class="inputTD"><input class="regInputStyle" type="text" name="schoolAdd1" id="schoolAdd1" maxlength="50"><span class="reqField"> *</span></td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">Address Line 2 :</label></td>
								<td class="inputTD"><input class="regInputStyle" type="text" name="schoolAdd2" id="schoolAdd2" maxlength="50"></td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">Postcode :</label></td>
								<td class="inputTD"><input class="regInputStyle poscodeInput" type="text" name="schoolPostcode" id="schoolPostcode" maxlength="5"><span class="reqField"> *</span></td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">State :</label></td>
								<td class="inputTD"><select class="regInputStyle" name="schoolState">
										<option value="none" selected>-- Select State --</option>
										<option value="Johor">Johor</option>
										<option value="Kedah">Kedah</option>
										<option value="Kelantan">Kelantan</option>
										<option value="Kuala Lumpur">Kuala Lumpur</option>
										<option value="Labuan">Labuan</option>
										<option value="Melaka">Melaka</option>
										<option value="Negeri Sembilan">Negeri Sembilan</option>
										<option value="Pahang">Pahang</option>
										<option value="Penang">Penang</option>
										<option value="Perak">Perak</option>
										<option value="Perlis">Perlis</option>
										<option value="Sabah">Sabah</option>
										<option value="Sarawak">Sarawak</option>
										<option value="Selangor">Selangor</option>
										<option value="Terengganu">Terengganu</option>
									</select>
									<span class="reqField"> *</span>
								</td>
							</tr>
							<tr>
								<td class="labelTD"><label class="regLabelStyle">City :</label></td>
								<td class="inputTD"><input class="regInputStyle" type="text" name="schoolCity" maxlength="30" id="schoolCity"><span class="reqField"> *</span></td>
							</tr>						
						</tbody>
					</table>	
				</div>
				</fieldset>
				<hr>
				<div id="regNextDiv">
					<button class="btn btn-secondary" id= "addSchoolBtn" name="addSchoolBtn" type="submit"><span>Add School</span></button>
				</div>
			</div>
		</fieldset>
	</form>
</div>
	
</body>


</html>