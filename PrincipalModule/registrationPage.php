<!DOCTYPE html>
<html>
<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<script src="js/validateOHForm.js" type="text/javascript"></script>
	<?php include ('/includes/regHeader.php');?>
</head>

<script>
	
</script>

<body>
	<div id="createNewAccount">
		<fieldset>
			<legend class="regH1">Create New Account</legend>
			<div id="OHD_PD_wrapper">
				<form name="form" action="registration.php" method="post" onsubmit=" return validateForm()">
					<fieldset>
						<legend class="regH2">Orphanage Home Details</legend>
						<hr>
						<div id="OHD">
							<div id="regTableDiv">
							<span class="reqField right-align">* required field</span>
								<table class="formTable">
									<tbody>
										<tr>
											<td class="labelTD"><label class="regLabelStyle">Orphanage Home Name :</label></td>
											<td class="inputTD"><input class="regInputStyle" type="text" name="ohname" id="ohname" maxlength="50"><span class="reqField"> *</span></td>
										</tr>
										<tr>
											<td class="labelTD"><label class="regLabelStyle">Email Address :</label></td>
											<td class="inputTD"><input class="regInputStyle" type="email" name="pemail" id="pemail" maxlength="50"><span class="reqField"> *</span></td>
										</tr>
										<tr>
											<td class="labelTD"><label class="regLabelStyle">Password :</label></td>
											<td class="inputTD"><input class="regInputStyle" type="Password" name="ppassword" id="ppassword"  maxlength="25"><span class="reqField"> *</span></td>
										</tr>
										<tr>
											<td class="labelTD"><label class="regLabelStyle">Re-type Password :</label></td>
											<td class="inputTD"><input class="regInputStyle" type="Password" name="repassword" id="repassword" maxlength="25"><span class="reqField"> *</span></td>
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
												<td class="inputTD"><input class="regInputStyle" type="text" name="ohadd1" id="ohadd1" maxlength="50"><span class="reqField"> *</span></td>
											</tr>
											<tr>
												<td class="labelTD"><label class="regLabelStyle">Address Line 2 :</label></td>
												<td class="inputTD"><input class="regInputStyle" type="text" name="ohadd2" id="ohadd2" maxlength="50"></td>
											</tr>
											<tr>
												<td class="labelTD"><label class="regLabelStyle">Postcode :</label></td>
												<td class="inputTD"><input class="regInputStyle poscodeInput" type="text" name="ohpostcode" id="ohpostcode" maxlength="5"><span class="reqField"> *</span></td>
											</tr>
											<tr>
												<td class="labelTD"><label class="regLabelStyle">State :</label></td>
												<td class="inputTD"><select class="regInputStyle" name="ohstate">
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
													</select><span class="reqField"> *</span></td>
											</tr>
											<tr>
												<td class="labelTD"><label class="regLabelStyle">City :</label></td>
												<td class="inputTD"><input class="regInputStyle" type="text" name="ohcity" id="ohcity" maxlength="50"><span class="reqField"> *</span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</fieldset>
						</div>
					</fieldset>
					<div id="OHD">
						<fieldset>
							<legend class="regH2">Principal's Details</legend>
							<hr>
							<div id="innerPD">
								<table class="formTable">
									<tbody>
										<tr>
											<td class="labelTD"><label class="regLabelStyle">Principal's Name :</label></td>
											<td class="inputTD"><input class="regInputStyle" type="text" name="pname" id="pname" maxlength="50"><span class="reqField"> *</span></td>
										</tr>
										<tr>
											<td class="labelTD"><label class="regLabelStyle">Principal's IC :</label></td>
											<td class="inputTD"><input class="regInputStyle" type="text" name="pic" id="pic" placeholder="Enter IC without symbols. eg: 123456789012" maxlength="12"><span class="reqField"> *</span></td>
										</tr>
										<tr>
											<td class="labelTD"><label class="regLabelStyle">Contact Number :</label></td>
											<td class="inputTD">
											<input class="regInputStyle telFirst3" type="tel" name="pphone1" id="pphone1" maxlength="3"> - 
											<input class="regInputStyle telRest" type="tel" name="pphone2" id="pphone2" maxlength="10">
											<span class="reqField"> *</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>						
						</fieldset>
					</div>
					<div id="regNextDiv">
						<button class="btn btn-secondary" name="regNextBtn" type="submit"><span>Register</span></button>
					</div>
				</form>
			</div>
		</fieldset>
	</div>
	
</body>


</html>