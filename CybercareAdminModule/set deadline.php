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
	
?>
<?php include('searchDeadline.php');?>
<!DOCTYPE html>
<html>
<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<?php include('/includes/header-with-logout.php');?>
	<?php include('/includes/staffNav.php');?>
	<?php include('setdeadline.php');?>
	<script src="js/formValidateForm.js" type="text/javascript"></script>
</head>
<script>
	function setTab(){
		document.getElementsByClassName("nav-link")[1].classList.add("active");
	}
</script>
<body onload="setTab()">
<div class="wrapper">
<ol class="breadcrumb">
			<li class="breadcrumb-item">Maintenance</li>
			<li class="breadcrumb-item">Set Deadline</li>
		</ol>
		<?php if(countRight($right,4)) { ?>
<form name="selectYear" id="selectYear" action="" method="GET" >
<h2>Deadline handling</h2>
<hr>
<h3>Search deadline</h3>
<label> Year : </label>
<input class="editInputStyle" type="text" name="yearSelected" id="yearSelected" value="<?php echo isset($_GET['yearSelected']) ? $_GET['yearSelected'] : (int)date("Y"); ?>">
<button class="btn btn-secondary" name="searchBtn" id="searchBtn"type="submit">search</button>
<span style="color : red;" class="error"><?php echo $yearErr;?></span> <br><br>
</form>
	<?php if ($searchYear=="y") {
	?>
	
		<h3>Current Deadline</h3>
		<table class='table'>
			<thead class='thead-inverse'>
				<tr>
					<th>Category</th>
					<th>Deadline</th>
					<th>Year</th>
					<th>Current status</th>
					<th>Action</th>
					
				</tr>
			<thead>
			<tbody>
			<?php  for($x=0; $x<3;$x++ ) {
				echo "<tr>";
				echo "<td>" . $deadline[$x]['category'] . "</td>";
				echo "<td>" . $deadline[$x]['date'] . "</td>";
				echo "<td>" . $deadline[$x]['year'] . "</td>";
				if($deadline[$x]['id']=="N/A")
					echo "<td>N/A</td>";
				else if($deadline[$x]['status']=="Active")
					echo "<td>Active</td>";
				else
					echo "<td>Archive</td>";
				
				if($deadline[$x]['id']=="N/A")
					echo "<td>N/A</td>";
				else if($deadline[$x]['status']=="Active")
					echo "<td><a href=\"archiveDeadline.php?id=".$deadline[$x]['id']."&year=".$deadline[$x]['year']."\">Archive</a></td>";
				else
					echo "<td><a href=\"archiveDeadline.php?id=".$deadline[$x]['id']."&year=".$deadline[$x]['year']."\">Unarchive</a></td>";
				
				echo "</tr>"; 
			
		
			}?>
			</tbody>
		</table>
		<br>
	<br><?php }?>
		<form name="ChangeDeadlineForm" onsubmit="return deadlineValidation()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<input type="hidden" value="<?php echo isset($_GET['yearSelected']) ? $_GET['yearSelected'] : ''; ?>" name="selectedYear"> 
			<div class="input-group">
			<hr>
			<h3>Set deadline</h3>
			<label style="text-align : right;">Category : </label>
			<select name="category">
				<option value="none" selected disabled="disabled">--select category--</option>
				<option value="Primary">Primary</option>
				<option value="lowerSecondary">Lower Secondary</option>
				<option value="upperSecondary">Upper Secondary</option>
			</select><span style="color : red;" class="error"><?php echo isset($_GET['catErr']) ? ' **Please choose a category' : ''; ?></span><br>
			<label style="text-align : right;">Year : </label>
			<input  type="text" name="year" id="year" value="<?php echo isset($_GET['yearSelected']) ? $_GET['yearSelected'] : ''; ?>">
			<span style="color : red;" class="error"><?php echo isset($_GET['yearErr']) ? ' **Please enter a year' : ''; ?>
			<?php echo isset($_GET['yearErr2']) ? ' **Please enter a valid year' : ''; ?></span><br>
			<label style="text-align : right;">Date :  </label>
			<select name="day">
				<option value="none" selected disabled="disabled">DD</option>
				<option value="01">01</option>
				<option value="02">02</option>
				<option value="03">03</option>
				<option value="04">04</option>
				<option value="05">05</option>
				<option value="06">06</option>
				<option value="07">07</option>
				<option value="08">08</option>
				<option value="09">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select><span> / </span>
			<select name="month">
				<option value="none" selected disabled="disabled">MM</option>
				<option value="01">Jan</option>
				<option value="02">Feb</option>
				<option value="03">Mar</option>
				<option value="04">Apr</option>
				<option value="05">May</option>
				<option value="06">Jun</option>
				<option value="07">July</option>
				<option value="08">Aug</option>
				<option value="09">Sep</option>
				<option value="10">Oct</option>
				<option value="11">Nov</option>
				<option value="12">Dec</option>
			</select><span> / </span>
			<input type="text" name="dateYear" id="dateYear" value="<?php echo isset($_GET['yearSelected']) ? $_GET['yearSelected'] : ''; ?>">
			<span style="color : red;" class="error"><?php if(isset($_GET['dayErr']) || isset($_GET['monthErr']) || isset($_GET['dateYearErr'])){?>  **Please enter a date <?php } ?></span><br><br>
			<button class="btn btn-secondary" type="submit">Set</button>
		</div>
	</form>
	

	
		<?php }else{?>
		
		<div style="text-align: center;">
		<h2><span style="color:red;">***You Have No Authorization To View This Page***</span></h2>
		<a href="viewOrphanageHome.php" class="btn btn-secondary">Back to Home Page</a>
		</div>
		
		
		<?php }?>
</div>
</body>
</html>