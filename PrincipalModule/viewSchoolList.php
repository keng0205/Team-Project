<?php
    require("config.php");
    require("includes/checkTimeout.php");
	
	$query = 'SELECT * from school';
	
	$result = mysqli_query($db, $query);
	
	$search = "";
	if(isset($_GET['searchSchBtn'])){
		$search = $_GET['searchSch'];
		$_SESSION['searchSch'] = $search;
	}
	if(isset($_SESSION['searchSch'])){
		$query = 'SELECT * from school WHERE schoolName LIKE "%'.$_SESSION['searchSch'].'%"';
		$result = mysqli_query($db, $query);
	}	
?>

<!DOCTYPE html>
<html>

<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<?php include('/includes/header-with-logout.php');?>
	<?php include('/includes/phpFunctions.php');?>
	<?php include('/includes/navTabs.php');?>
</head>

<script>
	function setTab(){
		document.getElementsByClassName("nav-link")[1].classList.add("active");
	}	
</script>

<body onload="setTab()">
	
	<div class="wrapper">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="oHprofile.php">Home</a></li>
			<li class="breadcrumb-item active">School List</li>
		</ol>
		<h2>School List</h2>
		<hr>
		<form action="" method="GET">
			<div class="input-group">
				<input class="searchBar form-control" type="Text" name="searchSch" id="searchSch" value = "<?php echo isset($_SESSION['searchSch']) ? $_SESSION['searchSch'] : ''; ?>" placeholder="Search by School Name...">
				
				<span class="input-group-btn">
					<button class="btn btn-outline-secondary" name="searchSchBtn" id="searchSchBtn" type="submit" ><span>Search</span></button>
				</span>
			</div>
		</form>
		<br>
		<div class="tableDiv">
			<?php
				$count = 0;

				if($result->num_rows == 0){
					echo "<h4 class='zeroResult'>0 result.</h4>";
				}
				else{
					$field='schoolName';
					$sort='ASC';
					
					if(isset($_GET['sorting'])){
						if($_GET['sorting']=='ASC'){
							$sort='DESC';
						}
						else{ 
							$sort='ASC';
						}
						if($_GET['field']=='schoolName'){ 
							$field = "schoolName";  
						}
						elseif($_GET['field']=='schoolType'){
							$field = "schoolType"; 
						}
						elseif($_GET['field']=='schoolState'){ 
							$field="schoolState"; 
						}
						elseif($_GET['field']=='schoolCity'){ 
							$field="schoolCity"; 
						}
					}
					
					
					$query .= ' order by '.$field.' '.$sort;
					
					$result = mysqli_query($db, $query);
					
					echo "<table class='table'>
							<thead class='thead-inverse'>
								<tr>
									<th>No.</th>
									<th><a class=\"sortTH\" href=\"viewSchoolList.php?sorting=$sort&field=schoolName\">School Name</a></th>
									<th><a class=\"sortTH\" href=\"viewSchoolList.php?sorting=$sort&field=schoolType\">Educational Level</a></th>
									<th><a class=\"sortTH\" href=\"viewSchoolList.php?sorting=$sort&field=schoolState\">State</a></th>
									<th><a class=\"sortTH\" href=\"viewSchoolList.php?sorting=$sort&field=schoolCity\">City</a></th>   
									<th>Contact</th>
									<th>Action</th>
								</tr>
							</thead>";
					
					while($row = $result->fetch_assoc()){	
						echo "<tbody>";
						echo "<tr>";
						echo "<td>" . ++$count . "</td>";
						echo "<td>" . $row['schoolName'] . "</td>";
						echo "<td>" . $row['schoolType'] . "</td>";
						echo "<td>" . $row['schoolState'] . "</td>";
						echo "<td>" . $row['schoolCity'] . "</td>";
						echo "<td>" . $row['schoolContact'] . "</td>";
						echo "<td><a href=\"modifySchoolPage.php?id=".$row['schoolID']."\">Modify</a></td>";
						echo "</tr>";
						echo "</tbody>";    
					}
				}
				echo "</table>";
				mysqli_close($db);
			?>	
		</div>
		<hr>
	</div>
</body>
</html>