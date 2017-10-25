<?php
    require("config.php");
    require("includes/checkTimeout.php");
	
	if(isset($_GET['id'])){
		$cIC = $_GET['id'];
		$query = 'SELECT * from children WHERE cIC = "'.$cIC.'"';
		$result = mysqli_query($db, $query);
		$row = $result->fetch_assoc();
		$ProfilePic = "/AcademicPointManagement/ChildrenModule/".$row['profilePicture'];
	}
	else{
		header("Location: childrenList.php");
		break;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<?php include('/includes/cdn.php');?>
	<link rel="stylesheet" type = "text/css" href="style/mystyle.css">
	<?php include('/includes/regHeader.php');?>
	<?php include('/includes/phpFunctions.php');?>
	<?php include('/includes/popOutNav.php');?>
</head>
<script>
	function setTab(){
		document.getElementsByClassName("nav-link")[0].classList.add("active");
	}
</script>
<body onload="setTab()">
	
	
	<div class="wrapper">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="oHprofile.php">Home</a></li>
			<li class="breadcrumb-item"><a href="childrenList.php">Children List</a></li>
			<li class="breadcrumb-item active">Profile</li>
		</ol>
		<?php
			echo "<h2>".$row['cName']."</h2><hr>";
			echo "
				<img src=\"$ProfilePic\" alt='orphan picture' style='width:160px;height:200px;position:absolute;'>
				<table class='formTable'>
					<tbody>
						<tr>
							<td class='detailLabelTD'><label class='regLabelStyle'>IC :</a></td>
							<td class='detailDescTD'>".$row['cIC']."</td>
						</tr>
						<tr>
							<td class='detailLabelTD'><label class='regLabelStyle'>Email :</a></td>
							<td class='detailDescTD'>".$row['cEmail']."</td>
						</tr>
						<tr>
							<td class='detailLabelTD'><label class='regLabelStyle'>Age :</a></td>
							<td class='detailDescTD'>".countAge($row['cIC'])."</td>
						</tr>
						<tr>
							<td class='detailLabelTD'><label class='regLabelStyle'>School :</a></td>";
			
			$queryGetSchool = 'select * from school where schoolID = '.$row['schoolID'];
			$schoolResult = mysqli_query($db, $queryGetSchool);
			
			$school = $schoolResult->fetch_assoc();
			echo "
							<td class='detailDescTD'>".$school['schoolName']."</td>
						</tr>
						<tr>
							<td class='detailLabelTD'><label class='regLabelStyle'>Academic Level :</a></td>
							<td class='detailDescTD'>".$row['year']."</td>
						</tr>
					</tbody>
				</table>
			";
		?>
		<hr>
		<form action="editChildProfile.php" method="get">
			<div id="regNextDiv">
				<input type='hidden' name='id' value='<?php echo "$cIC";?>'/> 
				<button class="btn btn-secondary" id= "editChildBtn" name="editChildBtn" type="submit"><span>Edit</span></button>
			</div>
		</form>
	</div>
	
</body>

</html>