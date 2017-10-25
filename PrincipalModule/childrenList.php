<?php
    require("config.php");
    require("includes/checkTimeout.php");
	
	$query = 'SELECT * from children WHERE ohid ="'.$_SESSION['user']['oHID'].'"';
	
	$result = mysqli_query($db, $query);
	
	$search = "";
	
	if(isset($_GET['searchCLBtn'])){
		$search = $_GET['searchCL'];
		$_SESSION['searchCL'] = $search;
	}
	
	if(isset($_SESSION['searchCL'])){
		if(is_numeric($_SESSION['searchCL'])){
			$query = 'SELECT * from children WHERE ohid ="'.$_SESSION['user']['oHID'].'" AND cIC LIKE "%'.$_SESSION['searchCL'].'%"';
			$result = mysqli_query($db, $query);
		}
		else{
			$query = 'SELECT * from children WHERE ohid ="'.$_SESSION['user']['oHID'].'" AND cName LIKE "%'.$_SESSION['searchCL'].'%"';
			$result = mysqli_query($db, $query);
		}
	}
	
	unset($_SESSION['searchCAL']);
	
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
		document.getElementsByClassName("nav-link")[2].classList.add("active");
	}
</script>

<body onload="setTab()">
	
	<div class="wrapper">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="oHprofile.php">Home</a></li>
			<li class="breadcrumb-item active">Children List</li>
		</ol>
		<h2>Children List</h2>
		<hr>
		<form action="" method="GET">
			<div class="input-group">
				<input class="searchBar form-control" type="Text" name="searchCL" id="searchCL" value = "<?php echo isset($_SESSION['searchCL']) ? $_SESSION['searchCL'] : ''; ?>" placeholder="Search by IC or Name...">
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
		
		<div class="changeToRegChild">
			<form action="regChildPage.php">
					<button class="btn btn-success" name="registerChildBtn" type="submit"><span>Register New Child</span></button>
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
									<th><a class=\"sortTH\" href=\"childrenList.php?sorting=$sort&field=cIC\">IC(MyKid/ MyCard)</a></th>
									<th><a class=\"sortTH\" href=\"childrenList.php?sorting=$sort&field=cName\">Name</a></th>
									<th>Age</th>
									<th colspan='2'>Action</th>
								</tr>
							</thead>";
					
					while($row = $result->fetch_assoc()){	
						echo "<tbody>";
						echo "<tr>";
						echo "<td>" . ++$count . "</td>";
						echo "<td>" . $row['cIC'] . "</td>";
						echo "<td><a href=\"childInfoProfile.php?id=".$row['cIC']."\" target='_blank'>" . $row['cName'] . "</a></td>";
						echo "<td>" . countAge($row['cIC']) . "</td>";
						echo "<td><a href=\"archiveChild.php?id=".$row['cIC']."\">Archive</a></td>";
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