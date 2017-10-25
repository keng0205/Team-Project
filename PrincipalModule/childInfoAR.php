<?php
    require("config.php");
    require("includes/checkTimeout.php");

	if(isset($_GET['id'])){
		$cIC = $_GET['id'];
		$query = 'SELECT * from children WHERE cIC = "'.$cIC.'"';
		$result = mysqli_query($db, $query);
		$row = $result->fetch_assoc();
	}
	else{
		header("Location: childrenList.php");
		break;
	}
	
	$getYearsQuery = 'select * from result where cid ="'.$cIC.'" order by year';
	$getYears = mysqli_query($db, $getYearsQuery);
	
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
		document.getElementsByClassName("nav-link")[1].classList.add("active");
	}
	
	function showFilteredResults(sel){
		var cIC = <?php echo json_encode($cIC) ?>;
		window.location.href = "childInfoAR.php?selectedYear=" + sel + "&id=" + cIC;
	}
	
</script>
<body onload="setTab()">
	
	<div class="wrapper">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="oHprofile.php">Home</a></li>
			<li class="breadcrumb-item"><a href="childrenList.php">Children List</a></li>
			<li class="breadcrumb-item active">Academic Result</li>
		</ol>
		<?php
			echo"
				<h2>".$row['cName']."</h2><hr>
			";
		?>
		<select class="regInputStyle" id="yearDD" name="year" onchange="showFilteredResults(this.value)" style="width:100%;">
			<?php
				$years = [];
				while($year = $getYears->fetch_assoc()){
					if(!in_array($year['year'], $years)){
						$years[] = $year['year'];
					}
				}
				if(count($years) == 0){
					echo"<option disabled>No record</option>";
				}
				else{
					echo"<option value='none'> -- Select Year -- </option>";
					for($i = 0; $i < count($years); $i++){
						if(isset($_GET['selectedYear']) && $_GET['selectedYear'] == $years[$i]){
							echo"
								<option value='$years[$i]' selected>$years[$i]</option>
							";
						}
						else{
							echo"
								<option value='$years[$i]'>$years[$i]</option>
							";
						}
					}
				}
			?>
		</select>
		<?php
			if(isset($_GET['selectedYear'])){
				if($_GET['selectedYear'] != "none"){
					echo"
						<hr>
						<table class='table'>
							<thead class='thead-inverse'>
								<tr>
									<th style='text-align:right;'>Subject</th>
									<th style='text-align:right;'>Semester 1</th>
									<th style='text-align:right;'>Semester 2</th>
									<th style='text-align:right;'>Semester 3</th>
									<th style='text-align:right;'>Semester 4</th>
									<th style='text-align:right;'>Improvement Point</th>
								</tr>
							</thead>
							<tbody>";
							$getResultQuery = 'select * from result where cid ="'.$cIC.'" and year ="'.$_GET['selectedYear'].'" order by sID ASC';
							$getResult = mysqli_query($db, $getResultQuery);
							
							while($result = $getResult->fetch_assoc()){
								$getSubject = mysqli_query($db, 'select * from subject where sid="'.$result['sID'].'"');
								$subjectTitle = $getSubject->fetch_assoc();					
								
								$resultDetails = [];
								$resultDetails[] = $subjectTitle['sName'];
								$resultDetails[] = $result['sem1'];
								$resultDetails[] = $result['sem2'];
								$resultDetails[] = $result['sem3'];
								$resultDetails[] = $result['sem4'];
								$resultDetails[] = $result['improvementPoint'];
								
								echo"
								<tr>";
									for($i = 0; $i < count($resultDetails); $i++){
										if($resultDetails[$i] == null){
											echo "<td> - </td>";
										}
										else{
											echo "<td style='text-align:right;'>" .$resultDetails[$i]. "</td>";
										}
									}
								echo"</tr>";
							}	
							$getTotalImpQuery = 'select * from improvementpoint where cic = "'.$cIC.'" and year = "'.$_GET['selectedYear'].'"';
							$getTotalImp = mysqli_query($db, $getTotalImpQuery);
							
							
							echo"
								</tbody>
								<tfoot>
									<td class='resultTFoot' colspan='5'>Total Improvement Points :</td>
									<td style='text-align:right;'>";
										if($totalImp = $getTotalImp->fetch_assoc()){
											echo $totalImp['aPoint'];
										}
										else{
											echo "-";
										}										
							echo "
									</td>
								</tfoot>
							</table>
							<hr>
							";
				}					
			}
		?>
	</div>
	
</body>

</html>