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
	
	$query = 'SELECT * from staff';
	
	$result = mysqli_query($db, $query);

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
		document.getElementsByClassName("nav-link")[1].classList.add("active");
	}
</script>

<body onload="setTab()">

	<div class="wrapper"><ol class="breadcrumb">
			<li class="breadcrumb-item">Maintenance</li>
			<li class="breadcrumb-item">Staff List</li>
		</ol>
		<?php if(countRight($right,1)) { ?>
		<h2>Staff List</h2>
		<hr>
		<div name="registerNewStaff">
			<form action="registerStaffPage.php">
					<button class="btn btn-secondary" name="registerNewStaff" type="submit"><span>Register New Staff</span></button>
			</form>
		</div>
		<div class="tableDiv">
		<?php
			if($result->num_rows == 0){
				echo "<h4 class='zeroResult'>0 result.</h4>";
			}
			else{
				$count = 0;
				echo "<table class='table'>";
						echo "<thead class='thead-inverse'>";
							echo "<tr>";
								echo "<th>No.</th>";
								echo "<th>Username</th>";
								echo "<th>Name</th>";
								echo "<th>Status</th>";
								echo "<th colspan='2'>Action</th>";
							echo "</tr>";
						echo "</thead>";
				
				while($row = $result->fetch_assoc()){	
					echo "<tbody>";
					echo "<tr>";
					echo "<td>" . ++$count . "</td>";
					echo "<td>" . $row['admin_username'] . "</td>";
					echo "<td>" . $row['admin_Name'] . "</td>";
					echo "<td>" . $row['status']. "</td>";
					if($row['status']=="Active")
						echo "<td><a href=\"archiveStaff.php?username=".$row['admin_username']."\">Archive</a></td>";
					else
						echo "<td><a href=\"archiveStaff.php?username=".$row['admin_username']."\">Unarchive</a></td>";
					echo "<td><a href=\"modifyStaff.php?username=".$row['admin_username']."\">Modify</a></td>";
					echo "</tr>";
					echo "</tbody>";    
				
				}
				echo "</table>";
				
				mysqli_close($db);
			}
		?>	
		</div>

		<?php }else{?>
		
		<div style="text-align: center;">
		<h2><span style="color:red;">***You Have No Authorization To View This Page***</span></h2>
		<a href="viewOrphanageHome.php" class="btn btn-secondary">Back to Home Page</a>
		</div>
		
		
		<?php }?>
		</div>
</body>
</html>