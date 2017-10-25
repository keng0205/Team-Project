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
	$oHID = $_SESSION['OH']['oHID'];
	$status = $_SESSION['OH']['oHStatus'];
	
	$query = 'SELECT * from children WHERE ohid ="'.$oHID.'"';
	$result = mysqli_query($db, $query);
	$search = "";

	
	if(isset($_GET['searchCL'])){
		$search = $_GET['searchCL'];
		if(is_numeric($search)){
			$query = 'SELECT * from children WHERE ohid ="'.$oHID.'" AND cIC LIKE "%'.$search.'%"';
			$result = mysqli_query($db, $query);
		}
		else{
			$query = 'SELECT * from children WHERE ohid ="'.$oHID.'" AND cName LIKE "%'.$search.'%"';
			$result = mysqli_query($db, $query);
		}
	}

	
	function countAge($cIC){
		$age = (int)substr($cIC, 0, 2);
		$currentYear = (int)date("Y");
		$age = (string)($currentYear - $age);
		$age = substr($age, -2);
		return $age;
	}
	
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
	
	<div class="wrapper">
	<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="viewOrphanageHome.php">Home</a></li>
			<li class="breadcrumb-item"><a href="viewOrphanageHome.php">Orphanage home List</a></li>
			<?php if($status=="Archive"){ ?>
			<li class="breadcrumb-item"><a href="orphanageHomeArchiveList.php">Archived Orphanage home List</a></li>
			<?php }?>
			<li class="breadcrumb-item"><?php echo "<a href=\"oHProfile.php?id=".$oHID."\">Orphanage Home Profile</a></td>";?>
			<li class="breadcrumb-item">Children List</li>
		</ol>
		
		<h2>Children List</h2>
		<hr>
		<form action="" method="GET">
			<div class="input-group">
				<input class="searchBar form-control" type="Text" name="searchCL" id="searchCL" value = "<?php echo isset($_GET['searchCL']) ? $_GET['searchCL'] : ''; ?>" placeholder="Search by IC or Name...">
				<span class="input-group-btn">
					<button class="btn btn-outline-secondary" name="searchCLBtn" id="searchCLBtn" type="submit" ><span>Search</span></button>
				</span>
			</div>
		</form>
		
		<div class="changeToArchiveList">
			<form action="childrenArchiveList.php">
					<button class="btn btn-secondary" name="changeChildrenList" type="submit"><span>View Archive List</span></button>
			</form>
		</div>
		
		<div class="tableDiv">
			<?php
			
				$count = 0;
				if($result->num_rows == 0){
					echo "<h4 class='zeroResult'>0 result.</h4>";
				}
				else{
					$field='cName';
					$sort='ASC';
					
					if(isset($_GET['sorting'])){
						if($_GET['sorting']=='ASC'){
							$sort='DESC';
						}
						else{ 
							$sort='ASC';
						}
						
						if($_GET['field']=='cIC'){ 
							$field = "cIC";  
						}
						elseif($_GET['field']=='cName'){
							$field = "cName"; 
						}
					}
					
					$query .= ' order by '.$field.' '.$sort;
					
					$result = mysqli_query($db, $query);
					
					echo "<table class='table'>
							<thead class='thead-inverse'>
								<tr>
									<th>No.</th>
									<th><a class=\"sortTH\" href=\"childrenList.php?searchCL=$search&sorting=$sort&field=cIC\">IC(MyKid/ MyCard)</a></th>
									<th><a class=\"sortTH\" href=\"childrenList.php?searchCL=$search&sorting=$sort&field=cName\">Name</a></th>
									<th>Age</th>
								</tr>
							</thead>";
					
					while($row = $result->fetch_assoc()){	
						echo "<tbody>";
						echo "<tr>";
						echo "<td>" . ++$count . "</td>";
						echo "<td>" . $row['cIC'] . "</td>";
						echo "<td><a href=\"childProfile.php?id=".$row['cIC']."\" target='_blank'>" . $row['cName'] . "</a></td>";
						echo "<td>" . countAge($row['cIC']) . "</td>";
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