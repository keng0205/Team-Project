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
	$id=$_GET['id'];
	
?>
<?php include('selectSubject.php');?>

<!DOCTYPE html>
<html>
<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<?php include('/includes/header-with-logout.php');?>
	<?php include('/includes/staffNav.php');?>
	<script>
	
	function setTab(){
		document.getElementsByClassName("nav-link")[1].classList.add("active");
	}
	
	document.getElementById("save").onclick = function() {
    document.getElementById("save").submit();
}
	</script>
</head>
<body onload="setTab()">
<div class="wrapper">
<ol class="breadcrumb">
			<li class="breadcrumb-item">Maintenance</li>
			<li class="breadcrumb-item"><?php echo "<a href=\"modifySubjectPage.php?category=".$categorySelected."\">Subject Offered</a></li>";?>
			<li class="breadcrumb-item">Modify Subject Offered</li>
		</ol>
		<?php if(countRight($right,2)) { ?>
<h1>List of subject</h1><br><br>
<form name="categorySelection" id="categorySelection" action="" method="GET">
<label>Category :</label>
<select name="category" onchange="this.form.submit()" disabled="disabled">
<option value="" disabled="disabled" <?php if($categorySelected != "Primary"&&$categorySelected != "lowerSecondary"&&$categorySelected != "upperSecondary"){ echo " selected"; }?>>--setect category--</option>
<option value="Primary" <?php if($categorySelected == "Primary"){ echo " selected"; }?>>Primary</option>
<option value="lowerSecondary" <?php if($categorySelected == "lowerSecondary"){ echo " selected"; }?>>Lower Secondary</option>
<option value="upperSecondary" <?php if($categorySelected == "upperSecondary"){ echo " selected"; }?>>Upper Secondary</option>
</select>
</form>
<br><br>
<?php

	if(isset($_GET['category'])){ ?>

	<form name="saveModifiedSubjectForm" id="saveModifiedSubjectForm" action="saveModifiedSubject.php" method="post">
	<input name="id" type="hidden" value="<?php echo "$id"?>">
	<input name="category" type="hidden" value="<?php echo "$categorySelected"?>">
	<?php
		$count=0;
		if($result->num_rows == 0){
			echo "<h4 class='zeroResult'>0 result.</h4>";
		}
		else{
			echo "<table class='table'>
					<thead class='thead-inverse'>
						<tr>
							<th>No.</th>
							<th>Subject</th>
							<th>Type</th>
							<th>Status</th>
							<th colspan='2'>Action</th>
						</tr>
					</thead>";
			while($row = $result->fetch_assoc()){	
				echo "<tbody>";
				echo "<tr>";
				echo "<td>" . ++$count . "</td>";
				if($row['sID']==$id)
					echo "<td><input name='newName' type='text' value= ". $row['sName'] ."></td>";
				else
					echo "<td>" . $row['sName'] . "</td>";
				
				if($row['coreSubject']=="1")
					$type='Core';
				else
					$type='Elective';
				
				if($row['sID']==$id){
					echo "<td><select name='newSubType'>";?>
						<option value='1' <?php if($type == 'Core'){ echo "selected"; }?>>Core</option>
						<option value='2' <?php if($type == 'Elective'){echo "selected"; }?>>Elective</option>
					<?php echo "</select></td>";
					}
				else
					echo "<td>" . $type . "</td>";
				
				if($row['status']=="Active"){
					$status="Active";
				}
				else{
					$status="Archive";
				}
				echo "<td>" . $status . "</td>";
				if($row['sID']==$id)
					echo "<td><a onclick=\"document.getElementById('saveModifiedSubjectForm').submit()\" href='#'>Save</a><span>/</span>
					<a href=\"modifySubjectPage.php?category=".$categorySelected."\">Cancel</a></td>";
				else
					echo "<td><a href=\"modifySubject.php?id=".$row['sID']."&category=".$categorySelected."\">Modify</a></td>";
				
				if($status=="Active")
					echo "<td><a href=\"archiveSubject.php?id=".$row['sID']."\">Archive</a></td>";
				else
					echo "<td><a href=\"archiveSubject.php?id=".$row['sID']."\">Unarchive</a></td>";
					
				echo "</tr>";
				echo "</tbody>";    
			}
			
		

		}
		
	}
		}else{
	?>	
	<div style="text-align: center;">
		<h2><span style="color:red;">***You Have No Authorization To View This Page***</span></h2>
		<a href="viewOrphanageHome.php" class="btn btn-secondary">Back to Home Page</a>
		</div>
		
		
		<?php }?>
</form>
</div>
</body>
</html>	
	