<?php
    require("config.php");
	
	if(isset($_GET['id'])){
		$cIC = $_GET['id'];
		$query = 'SELECT * from childrenarchive WHERE cIC = "'.$cIC.'"';
		$result = mysqli_query($db, $query);
		$row = $result->fetch_assoc();
	}
	else{
		header("Location: childrenList.php");
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
	<?php include('/includes/regHeader.php');?>
	<?php include('/includes/popOutNavArchive.php');?>
</head>
<script>
	function setTab(){
		document.getElementsByClassName("nav-link")[0].classList.add("active");
	}
</script>
<body onload="setTab()">
	
	
	<div class="wrapper">
		<?php
			echo "<h2>".$row['cName']."</h2><hr>";
			echo "
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
	</div>
	
</body>

</html>