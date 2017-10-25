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
	
	$query = 'SELECT * from orphanagehome where oHStatus="Archive"';
	
	$result = mysqli_query($db, $query);
	$state="All";
	$search = "";
	
	if(isset($_GET['searchOH'])){
		unset($_GET['state']);
		$search = $_GET['searchOH'];
		$query = 'SELECT * from orphanagehome WHERE oHStatus="Archive" AND ohName LIKE "%'.$search.'%"';
		$result = mysqli_query($db, $query);
	}
	
	if(isset($_GET['state'])){
		$state=$_GET['state'];
		unset($_GET['searchOH']);
		if($state!="All"){
			$query = "SELECT * from orphanagehome where oHStatus='Archive' AND oHState='$state'";
		}
		else{
			$query = 'SELECT * from orphanagehome where oHStatus="Archive"';
		}
		$result = mysqli_query($db, $query);
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
			<li class="breadcrumb-item">Archived Orphanage home List</li>
		</ol>
		
		<h2>Archived Orphanage Home List</h2>
		<hr>
		<form action="" method="GET">
			<div class="input-group">
				<input  class="searchBar form-control" type="text" name="searchOH" id="searchOH" value = "<?php echo isset($_GET['searchOH']) ? $_GET['searchOH'] : ''; ?>" placeholder="Search by Name...">
				<span class="input-group-btn">
					<button class="btn btn-outline-secondary" name="searchOHBtn" id="searchOHBtn" type="submit" ><span>Search</span></button>
				</span>
			</div>
		</form>
		<div class="changeToOrphanageHomeList">
			<form action="viewOrphanageHome.php">
					<button  class="btn btn-secondary" name="changeOrphanageHomeList" type="submit"><span>View Orphanage Home List</span></button>
			</form>
		</div>
		<div class="stateList">
			<form name="searchOHState" action="" method="GET">
				<label>Search by state:</label>
				<select name="state" onchange="this.form.submit()">
					<option value="All" selected>-- Show All --</option>
					<option value="Johor" <?php if(isset($_GET['state'])&& $state == "Johor"){ echo " selected"; }?>>Johor</option>
					<option value="Kedah" <?php if(isset($_GET['state'])&& $state == "Kedah"){ echo " selected"; }?>>Kedah</option>
					<option value="Kelantan" <?php if(isset($_GET['state'])&& $state == "Kelantan"){ echo " selected"; }?>>Kelantan</option>
					<option value="Kuala Lumpur" <?php if(isset($_GET['state'])&& $state == "Kuala Lumpur"){ echo " selected"; }?>>Kuala Lumpur</option>
					<option value="Labuan" <?php if(isset($_GET['state'])&& $state == "Labuan"){ echo " selected"; }?>>Labuan</option>
					<option value="Melaka" <?php if(isset($_GET['state'])&& $state == "Melaka"){ echo " selected"; }?>>Melaka</option>
					<option value="Negeri Sembilan" <?php if(isset($_GET['state'])&& $state == "Negeri Sembilan"){ echo " selected"; }?>>Negeri Sembilan</option>
					<option value="Pahang" <?php if(isset($_GET['state'])&& $state == "Pahang"){ echo " selected"; }?>>Pahang</option>
					<option value="Penang" <?php if(isset($_GET['state'])&& $state == "Penang"){ echo " selected"; }?>>Penang</option>
					<option value="Perak" <?php if(isset($_GET['state'])&& $state == "Perak"){ echo " selected"; }?>>Perak</option>
					<option value="Perlis" <?php if(isset($_GET['state'])&& $state == "Perlis"){ echo " selected"; }?>>Perlis</option>
					<option value="Sabah" <?php if(isset($_GET['state'])&& $state == "Sabah"){ echo " selected"; }?>>Sabah</option>
					<option value="Sarawak" <?php if(isset($_GET['state'])&& $state == "Sarawak"){ echo " selected"; }?>>Sarawak</option>
					<option value="Selangor" <?php if(isset($_GET['state'])&& $state == "Selangor"){ echo " selected"; }?>>Selangor</option>
					<option value="Terengganu" <?php if(isset($_GET['state'])&& $state == "Terengganu"){ echo " selected"; }?>>Terengganu</option>
				</select>
			</form>
		</div>
		<div class="tableDiv">
		<?php
			if($result->num_rows == 0){
				echo "<h4 class='zeroResult'>0 result.</h4>";
			}
			else{
				$nameSort = isset($_GET['nameSort'])? (bool) $_GET['nameSort']: 1;
				$stateSort = isset($_GET['stateSort'])? (bool) $_GET['stateSort']: 1;
				
				$query1 = "";
				
				if($stateSort){
					$query1 = " order by oHState DESC,oHName ASC";
				}else{
					$query1 = " order by oHState ASC,oHName ASC";
				}
				
				if (!isset($_GET['stateSort'])){
					if($nameSort){
						$query1 = " order by oHName ASC";
					}else{
						$query1 = " order by oHName DESC";
					}
				}
				
				$query .= $query1;
		
				$result = mysqli_query($db, $query);
				
				$count = 0;
				echo "<table class='table'>
						<thead class='thead-inverse'>
							<tr>
								<th>No.</th>";?>
								<th><a href='orphanageHomeArchiveList.php?<?php if(isset($_GET['searchOH'])){echo "searchOH=".$_GET['searchOH']."&";}?>state=<?php echo $state?>&nameSort= <?php echo isset($_GET['nameSort'])?!$_GET['nameSort']:""; ?>'>Name</a></th>
								<th><a href='orphanageHomeArchiveList.php?<?php if(isset($_GET['searchOH'])){echo "searchOH=".$_GET['searchOH']."&";}?>state=<?php echo $state?>&stateSort= <?php echo isset($_GET['stateSort'])?!$_GET['stateSort']:""; ?>'>State</a></th>
								<?php if(countRight($right,16)) {?>
								<th>Action</th>
								<?php }?>
							</tr>
						</thead>
				<?php
				while($row = $result->fetch_assoc()){	
					echo "<tbody>";
					echo "<tr>";
					echo "<td>" . ++$count . "</td>";
					echo "<td><a href=\"oHProfile.php?id=".$row['oHID']."\">" . $row['oHName'] . "</a></td>";
					echo "<td>" . $row['oHState'] . "</td>";?>
					<?php if(countRight($right,16)) {
					echo "<td><a href=\"unarchiveOrphanageHome.php?id=".$row['oHID']."\">unarchive</a></td>";
					}
					echo "</tr>";
					echo "</tbody>";    
				
				}
				echo "</table>";
				
				mysqli_close($db);
			}
		?>	
		</div>
		<hr>
		</div>
</body>
</html>