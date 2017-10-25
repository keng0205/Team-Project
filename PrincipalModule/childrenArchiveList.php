<?php
    require("config.php");
    require("includes/checkTimeout.php");
	
	$query = 'SELECT * from childrenarchive WHERE ohid ="'.$_SESSION['user']['oHID'].'"';
	
	$result = mysqli_query($db, $query);	
	
	$search = "";
	if(isset($_GET['searchCALBtn'])){
		$search = $_GET['searchCAL'];
		$_SESSION['searchCAL'] = $search;
	}
	
	if(isset($_SESSION['searchCAL'])){
		if(is_numeric($_SESSION['searchCAL'])){
			$query = 'SELECT * from childrenarchive WHERE ohid ="'.$_SESSION['user']['oHID'].'" AND cIC LIKE "%'.$_SESSION['searchCAL'].'%"';
			$result = mysqli_query($db, $query);
		}
		else{
			$query = 'SELECT * from childrenarchive WHERE ohid ="'.$_SESSION['user']['oHID'].'" AND cName LIKE "%'.$_SESSION['searchCAL'].'%"';
			$result = mysqli_query($db, $query);
		}
	}
	
	unset($_SESSION['searchCL']);
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
			<li class="breadcrumb-item"><a href="childrenList.php">Children List</a></li>
			<li class="breadcrumb-item active">Children Archive List</li>
		</ol>
		<h2>Children Archive List</h2>
		<hr>
		<form action="" method="GET">
			<div class="input-group">
				<input class="searchBar form-control" type="Text" name="searchCAL" id="searchCAL" value = "<?php echo isset($_SESSION['searchCAL']) ? $_SESSION['searchCAL'] : ''; ?>" placeholder="Search by IC or Name...">
				
				<span class="input-group-btn">
						<button class="btn btn-outline-secondary" name="searchCALBtn" id="searchCALBtn" type="submit"><span>Search</span></button>
				</span>
			</div>
		</form>
		<div class="changeToChildrenList">
			<form action="childrenList.php">
				<button class="btn btn-secondary btn-grey" name="changeChildrenList" type="submit"><span>View Children List</span></button>
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
									<th><a class=\"sortTH\" href=\"childrenArchiveList.php?sorting=$sort&field=cIC\">IC(MyKid/ MyCard)</a></th>
									<th><a class=\"sortTH\" href=\"childrenArchiveList.php?sorting=$sort&field=cName\">Name</a></th>
									<th>Age</th>
									<th colspan='2'>Action</th>
								</tr>
							</thead>";

					while($row = $result->fetch_assoc()){	
					
						$age = countAge($row['cIC']);
					
						echo "<tbody>";
						echo "<tr>";
						echo "<td>" . ++$count . "</td>";
						echo "<td>" . $row['cIC'] . "</td>";
						echo "<td>" . $row['cName'] . "</td>";
						echo "<td>" . $age . "</td>";
						echo "<td><a href=\"unarchiveChild.php?id=".$row['cIC']."\">Unarchive</a></td>";
						echo "</tr>";
						echo "</tbody>";    
					}

				}
				echo "</table>";
				mysqli_close($db);
			?>	
		</div>
	</div>
</body>
</html>