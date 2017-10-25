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
	
	$year="";
	$category="";
	$yearErr="";
	$categoryErr="";
	$numberErr="";
	
	if(isset($_GET['searchRankingbtn']) || ((isset($_GET['year']))&& (isset($_GET['category'])))){
		if(empty($_GET["year"])){
			$yearErr = " **Please enter a year";
			$_GET["year"]="";
			}else if(!preg_match("/^[0-9]{4}$/",$_GET["year"])){
				$yearErr = " **Please enter a valid year";
				$_GET["year"]="";
			}else if(empty($_GET["category"])){
				$categoryErr = " **Please choose a category";
			}else{
				
			$category = $_GET['category'];
			$year=$_GET['year'];
				
				$finalistQ = "SELECT * 
				FROM improvementpoint a, children c, orphanagehome o 
				WHERE a.cIC=c.cIC AND c.oHID=o.oHID 
				AND a.category='$category' AND a.year='$year'
				AND a.status='Finalist'
				ORDER BY a.aPoint DESC;";
				
				$shortlistedQ = "SELECT * 
				FROM improvementpoint a, children c, orphanagehome o 
				WHERE a.cIC=c.cIC AND c.oHID=o.oHID 
				AND a.category='$category' AND a.year='$year' 
				AND a.status='Shortlisted'
				ORDER BY a.aPoint DESC
				LIMIT 10;";
				
				$disqualifiedQ = "SELECT * 
				FROM improvementpoint a, children c, orphanagehome o 
				WHERE a.cIC=c.cIC AND c.oHID=o.oHID 
				AND a.category='$category' AND a.year='$year'
				AND a.status='Disqualified'
				ORDER BY a.aPoint DESC;";
				
				$finalist = mysqli_query($db, $finalistQ);
				$shortlisted = mysqli_query($db, $shortlistedQ);
				$disqualified = mysqli_query($db, $disqualifiedQ);
		}
	}
	if(isset($_GET['searchNumOfCandidatebtn'])){
		
		if(empty($_GET["noOfCandidates"])){
			$numberErr = " **Please enter a number";
			$_GET["noOfCandidates"]="";
		}else if(!preg_match("/^[0-9]*$/",$_GET["noOfCandidates"])){
			$numberErr = " **Please enter only number";
			$_GET["noOfCandidates"]="";
		}else{
			$category = $_GET['category'];
			$year=$_GET['year'];
			$number=(int)$_GET['noOfCandidates'];
			
			$finalistQ = "SELECT * 
			FROM improvementpoint a, children c, orphanagehome o 
			WHERE a.cIC=c.cIC AND c.oHID=o.oHID 
			AND a.category='$category' AND a.year='$year'
			AND a.status='Finalist'
			ORDER BY a.aPoint DESC;";
			
			$disqualifiedQ = "SELECT * 
			FROM improvementpoint a, children c, orphanagehome o 
			WHERE a.cIC=c.cIC AND c.oHID=o.oHID 
			AND a.category='$category' AND a.year='$year'
			AND a.status='Disqualified'
			ORDER BY a.aPoint DESC;";
		
			$shortlistedQ = "SELECT * 
			FROM improvementpoint a, children c, orphanagehome o 
			WHERE a.cIC=c.cIC AND c.oHID=o.oHID 
			AND a.category='$category' AND a.year='$year' 
			AND a.status='Shortlisted'
			ORDER BY a.aPoint DESC
			LIMIT $number;";
			
			$shortlisted = mysqli_query($db, $shortlistedQ);
		
			
			$finalist = mysqli_query($db, $finalistQ);
			
			$disqualified = mysqli_query($db, $disqualifiedQ);
	}
	}
	?>
	
<!DOCTYPE html>
<html>
<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<script src="js/academicRankingValidationForm.js" type="text/javascript"></script>
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
			<li class="breadcrumb-item">View Academic Ranking</li>
		</ol>
		
		<?php if(countRight($right,8)) { ?>
<h2>Academic Ranking</h2>
		<hr>
	<form name="selectRanking" id="selectRanking" action="" method="GET" onsubmit="return selectRankingValidation()">
		<div class="input-group">
			<label>Year : </label>
			<input class="editInputStyle" style="height:30px;width:200px;" name="year" type="text" value="<?php echo isset($_GET['year']) ? $_GET['year']:(int)date('Y');?>">
			<select class="editInputStyle" style="height:30px;width:200px;" name="category">
				<option value="" disabled="disabled" selected >--setect category--</option>
				<option value="Primary" <?php if(isset($_GET['category']))if($_GET["category"] == "Primary"){ echo " selected"; }?>>Primary</option>
				<option value="lowerSecondary" <?php if(isset($_GET['category']))if($_GET["category"] == "lowerSecondary"){ echo " selected"; }?>>Lower Secondary</option>
				<option value="upperSecondary" <?php if(isset($_GET['category']))if($_GET["category"] == "upperSecondary"){ echo " selected"; }?>>Upper Secondary</option>
			</select>

				<button class="btn btn-secondary" name="searchRankingbtn" id="searchRankingbtn" type="submit" >Search</button>
				<span style="color:red;" class="error"><?php echo $yearErr;?></span>
				<span style="color:red;" class="error"><?php echo $categoryErr;?></span>
			
		</div>
	</form>
<?php
echo "<div class='tableDiv'>";
	if((isset($_GET['year'])) &&($_GET['year'])!="" && (isset($_GET['category']))){
		$fcount=0;
		echo "<h2>Finalist</h2>";
			
		if($finalist->num_rows == 0){
			echo "<tbody>
				<tr>
				<td colspan='5'>0 result.
				</td>
				</tr>
				</tbody>";
		}
		else{
			echo "<table class='table'>
					<thead class='thead-inverse'>
						<tr>
							<th>Rank</th>
							<th>Name</th>
							<th>Improvement Point</th>
							<th>Orphanage Home</th>
							<th>Email</th>
							<th colspan='2'>Status</th>
						</tr>
					</thead>";
			while($row = $finalist->fetch_assoc()){	
				echo "<tbody>";
				echo "<tr>";
				echo "<td>" . ++$fcount . "</td>";
				echo "<td><a href=\"childProfile.php?id=".$row['cIC']."\" target='_blank'>" . $row['cName'] . "</a></td>";
				echo "<td>" . $row['aPoint'] . "</td>";
				echo "<td><a href=\"oHProfile.php?id=".$row['oHID']."\">" . $row['oHName'] . "</a></td>";
				echo "<td>" . $row['cEmail'] . "</td>";
				echo "<form action='changeStatusRanking.php' method='GET' name='updatestatus'>";
				echo "<td>";?> 
					<select name="statusChange">
						<option value="Finalist" selected >Finalist</option>
						<option value="Shortlisted">Shortlisted</option>
						<option value="Disqualified">Disqualified</option>
					</select>
		  <?php echo "</td>";
				echo "<td>";?>
					<input type="hidden" name="year" value="<?php echo $_GET['year']?>" >
					<input type="hidden" name="category" value="<?php echo $_GET['category']?>" >
					<input type="hidden" name="ID" value="<?php echo $row['impID']?>" >
					<button type="submit">Change</button>
					</td>	
			</form>
		  <?php echo "</tr>";
				echo "</tbody>";    
			
			}
		}
			echo "</table>";
			echo "</div><br><br>";
			
			echo "<div class='tableDiv'>";
		$count = 0;
			echo "<h2>Shortlisted Candidates</h2>";
			
			
					
		if($shortlisted->num_rows == 0){
			echo "<tbody>
				<tr>
				<td colspan='5'>0 result.
				</td>
				</tr>
				</tbody>";
		}
		else{
			echo "<table class='table'>
					<thead class='thead-inverse'>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Improvement Point</th>
							<th>Orphanage Home</th>
							<th>Email</th>
							<th colspan='2'>Status</th>
						</tr>
					</thead>";
			while($row = $shortlisted->fetch_assoc()){	
				echo "<tbody>";
				echo "<tr>";
				echo "<td>" . ++$count . "</td>";
				echo "<td><a href=\"childProfile.php?id=".$row['cIC']."\" target='_blank'>" . $row['cName'] . "</a></td>";
				echo "<td>" . $row['aPoint'] . "</td>";
				echo "<td><a href=\"oHProfile.php?id=".$row['oHID']."\">" . $row['oHName'] . "</a></td>";
				echo "<td>" . $row['cEmail'] . "</td>";
				echo "<form action='changeStatusRanking.php' method='GET' name='updatestatus'>";
				echo "<td>";?> 
					<select name="statusChange">
						<option value="Finalist">Finalist</option>
						<option value="Shortlisted" selected>Shortlisted</option>
						<option value="Disqualified">Disqualified</option>
					</select>
		  <?php echo "</td>";
				echo "<td>";?>
					<input type="hidden" name="year" value="<?php echo $_GET['year']?>" >
					<input type="hidden" name="category" value="<?php echo $_GET['category']?>" >
					<input type="hidden" name="ID" value="<?php echo $row['impID']?>" >
					<button type="submit">Change</button>
					</td>	
			</form>
		  <?php echo "</tr>";
				echo "</tbody>";  
			
			}
			echo "</table>";
			echo "</div>";
		}

		
		echo "<form name='searchNumOfCandidate' action='' method='GET'>";
		echo "<label>Number of candidates : </label>";
		echo "<input type='text' name='noOfCandidates'>";?>
		<input type="hidden" name="category" value="<?php echo $_GET['category'] ?>">
		<input type="hidden" name="year" value="<?php echo $_GET['year'] ?>">
		<button class="btn btn-secondary" name='searchNumOfCandidatebtn' type='submit' name='noOfCandidatesbtn'>Generate</button>
		<span style="color:red;" class="error"><?php echo $numberErr;?></span>
		</form>
		<br><br>
		
		
	<?php $dcount = 0;
		echo "<div class='tableDiv'>";
			echo "<h2>Disqualified Candidates</h2>";
			
		if($disqualified->num_rows == 0){
			echo "<tbody>
				<tr>
				<td colspan='5'>0 result.
				</td>
				</tr>
				</tbody>";
		}
		else{
			echo "<table class='table'>
					<thead class='thead-inverse'>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Improvement Point</th>
							<th>Orphanage Home</th>
							<th>Email</th>
							<th colspan='2'>Status</th>
						</tr>
					</thead>";
			while($row = $disqualified->fetch_assoc()){	
				echo "<tbody>";
				echo "<tr>";
				echo "<td>" . ++$dcount . "</td>";
				echo "<td><a href=\"childProfile.php?id=".$row['cIC']."\" target='_blank'>" . $row['cName'] . "</a></td>";
				echo "<td>" . $row['aPoint'] . "</td>";
				echo "<td><a href=\"oHProfile.php?id=".$row['oHID']."\">" . $row['oHName'] . "</a></td>";
				echo "<td>" . $row['cEmail'] . "</td>";
				echo "<form action='changeStatusRanking.php' method='GET' name='updatestatus'>";
				echo "<td>";?> 
					<select name="statusChange">
						<option value="Finalist" >Finalist</option>
						<option value="Shortlisted">Shortlisted</option>
						<option value="Disqualified" selected>Disqualified</option>
					</select>
		  <?php echo "</td>";
				echo "<td>";?>
					<input type="hidden" name="year" value="<?php echo $_GET['year']?>" >
					<input type="hidden" name="category" value="<?php echo $_GET['category']?>" >
					<input type="hidden" name="ID" value="<?php echo $row['impID']?>" >
					<button type="submit">Change</button>
					</td>	
			</form>
		  <?php echo "</tr>";
				echo "</tbody>";
			
			}
			echo "</table>";
		echo "</div>";
		}
			mysqli_close($db);
		?>
	
		<?php }}else {?>	

		<div style="text-align: center;">
		<h2><span style="color:red;">***You Have No Authorization To View This Page***</span></h2>
		<a href="viewOrphanageHome.php" class="btn btn-secondary">Back to Home Page</a>
		</div>
		
		
		<?php }?>
		</div>
</body>
</html>