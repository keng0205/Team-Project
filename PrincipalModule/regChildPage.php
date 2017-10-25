<?php
	require("config.php");
	require("includes/checkTimeout.php");
	
	//get school lists
	
	$priSchools = null;
	$secSchools = null;
	
	$pSchools = mysqli_query($db, 'select * from school where schooltype = "Primary School" order by schoolName');  
	if($pSchools->num_rows > 0){
		while($row = $pSchools->fetch_assoc()){	
			$priSchools[] = $row;
		}
	}
	
	$sSchools = mysqli_query($db, 'select * from school where schooltype = "Secondary School" order by schoolName');  
	if($sSchools->num_rows > 0){
		while($row = $sSchools->fetch_assoc()){	
			$secSchools[] = $row;
		}
	}
?>


<!DOCTYPE html>
<html>

<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<script src="js/validateChildForm.js" type="text/javascript"></script>
	<?php include('/includes/header-with-logout.php');?>
	<?php include('/includes/phpFunctions.php');?>
	<?php include('/includes/navTabs.php');?>
	
</head>

<script>
	window.onload=showPSchoolList;

	function setTab(){
		document.getElementsByClassName("nav-link")[2].classList.add("active");
	}
	
	var pSchools = <?php echo json_encode($priSchools) ?>;
	var sSchools = <?php echo json_encode($secSchools) ?>;	
	
	function showPSchoolList(){
		var dDList = document.getElementById("schoolListDD");
		
		while (dDList.firstChild){
			dDList.removeChild(dDList.firstChild);
		}
		while (yearDD.firstChild){
			yearDD.removeChild(yearDD.firstChild);
		}
		while(schoolStateDD.length > 1){
			schoolStateDD.removeChild(schoolStateDD.lastChild);
		}
		
		selectedSchoolLevel = "pSchools";
		
		var schoolStates = [];
		
		dDList.disabled = false;
		if(pSchools){
			for(var i = 1; i <= 6; i++){
				var el = document.createElement("option");
				el.textContent = "Standard " + i;
				el.value = el.textContent;
				yearDD.appendChild(el);
			}
			
			for(var i = 0; i < pSchools.length; i++){
				var opt = pSchools[i]['schoolName'];
				var el = document.createElement("option");
				el.textContent = opt;
				el.value = pSchools[i]['schoolID'];
				dDList.appendChild(el);
				
				if(schoolStates.indexOf(pSchools[i]['schoolState']) == -1){
					schoolStates.push(pSchools[i]['schoolState']);
				}
			}
			
			for(var i = 0; i < schoolStates.length; i++){
				var opt = schoolStates[i];
				var el = document.createElement("option");
				el.textContent = opt;
				el.value = opt;
				schoolStateDD.appendChild(el);
			}
			
		}else{
			var el = document.createElement("option");
			el.textContent = "No primary school found. Register a new school first.";
			dDList.appendChild(el);
			dDList.disabled = true;
		}
	}
	
	function showSSchoolList(){
		var dDList = document.getElementById("schoolListDD");

		while (dDList.firstChild){
			dDList.removeChild(dDList.firstChild);
		}
		while (yearDD.firstChild){
			yearDD.removeChild(yearDD.firstChild);
		}
		while(schoolStateDD.length > 1){
			schoolStateDD.removeChild(schoolStateDD.lastChild);
		}
		
		selectedSchoolLevel = "sSchools";
		
		var schoolStates = [];
		
		dDList.disabled = false;
		if(sSchools){
			for(var i = 0; i < 6; i++){
				var el = document.createElement("option");
				if(i == 0){
					el.textContent = "Remove";
				}else{
					el.textContent = "Form " + i;
				}
				el.value = el.textContent;
				yearDD.appendChild(el);
			}
			
			for(var i = 0; i < sSchools.length; i++){
				var opt = sSchools[i]['schoolName'];
				var el = document.createElement("option");
				el.textContent = opt;
				el.value = sSchools[i]['schoolID'];
				dDList.appendChild(el);
				
				if(schoolStates.indexOf(sSchools[i]['schoolState']) == -1){
					schoolStates.push(sSchools[i]['schoolState']);
				}
			}
			
			for(var i = 0; i < schoolStates.length; i++){
				var opt = schoolStates[i];
				var el = document.createElement("option");
				el.textContent = opt;
				el.value = opt;
				schoolStateDD.appendChild(el);
			}
		}else{
			var el = document.createElement("option");
			el.textContent = "No secondary school found. Register a new school first.";
			dDList.appendChild(el);
			dDList.disabled = true;
		}
	}
	
	function showFilteredSchools(sel){
		var dDList = document.getElementById("schoolListDD");
		while (dDList.firstChild){
			dDList.removeChild(dDList.firstChild);
		}
		switch(selectedSchoolLevel){
			case "pSchools":
			if(sel.value != "none"){
				for(var i = 0; i < pSchools.length; i++){
					if(pSchools[i]['schoolState'] == schoolStateDD.options[schoolStateDD.selectedIndex].text){
						var opt = pSchools[i]['schoolName'];
						var el = document.createElement("option");
						el.textContent = opt;
						el.value = pSchools[i]['schoolID'];
						dDList.appendChild(el);
					}
				}
			}else{
				showPSchoolList();
			}
			break;
			case "sSchools":
			if(sel.value != "none"){
				for(var i = 0; i < sSchools.length; i++){
					if(sSchools[i]['schoolState'] == schoolStateDD.options[schoolStateDD.selectedIndex].text){
						var opt = sSchools[i]['schoolName'];
						var el = document.createElement("option");
						el.textContent = opt;
						el.value = sSchools[i]['schoolID'];
						dDList.appendChild(el);
					}
				}
			}else{
				showSSchoolList();
			}
			break;
		}
	}
	
</script>

<body onload="setTab()">
	
	<div class="wrapper">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="oHprofile.php">Home</a></li>
			<li class="breadcrumb-item"><a href="childrenList.php">Children List</a></li>
			<li class="breadcrumb-item active">Register New Child</a></li>
		</ol>
		<h2>Register New Child</h1>
		<hr>
		<span class="reqField right-align">* required field</span>
		<form form name="form" action="regChild.php" method="post" onsubmit="return validateChildForm()">
		<table class="formTable">
			<tr>
				<td class="labelTD"><label class="regLabelStyle">IC &#40;MyKid/ MyCard&#41; :</label></td>
				<td class="inputTD"><input class="regInputStyle" type="text" name="cIC" id="cIC" maxlength="12" placeholder="Enter IC number without any symbols. eg: 123456789012"><span class="reqField"> *</span></td>
			</tr>
			<tr>
				<td class="labelTD"><label class="regLabelStyle">Name :</label></td>
				<td class="inputTD"><input class="regInputStyle" type="text" name="cName" id="cName" maxlength="50"><span class="reqField"> *</span></td>
			</tr>
			<tr>
				<td class="labelTD"><label class="regLabelStyle">Email Address :</label></td>
				<td class="inputTD"><input class="regInputStyle" type="email" name="cEmail" id="cEmail" maxlength="50" placeholder = "Principal's email address will be used if this field is left empty."></td>
			</tr>			
			<tr>
				<td class="labelTD"><label class="regLabelStyle">Academic Level :</label></td>
				<td class = "inputTD eduRadioTd">
					<div>
						<input class="eduRadio" type="radio" name="eduLevel" onchange = "showPSchoolList()" value="Primary" checked>Primary School</input>
					</div>
					<div>
						<input class="eduRadio" type="radio" name="eduLevel" onchange = "showSSchoolList()" value="Secondary">Secondary School</input>
					</div>
				</td>
			</tr>			
			<tr>
				<td class="labelTD"><label class="regLabelStyle">Year :</label></td>
				<td class="inputTD">
					<select class="regInputStyle" id="yearDD" name="year"></select>
				</td>
			</tr>
		</table>
		<hr>
		<table class="formTable">
			<tr>
				<td class="labelTD"><label class="regLabelStyle">Filter School By State :</label></td>
				<td class="inputTD" id="regChildSelectTD">
					<select class="regInputStyle" id="schoolStateDD" name="schoolState" onchange="showFilteredSchools(this)">
						<option value="none">-- Show all --</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="labelTD"><label class="regLabelStyle">School :</label></td>
				<td class="inputTD" id="regChildSelectTD">
					<select class="regInputStyle" id="schoolListDD" name="school"></select>
				</td>
			</tr>
		</table>
		<hr>
		<div id="regNextDiv">
			<button class="btn btn-secondary" id= "regChildBtn" name="regChildBtn" type="submit"><span>Register Child</span></button>
		</div>
		</form>
	</div>
</body>
</html>