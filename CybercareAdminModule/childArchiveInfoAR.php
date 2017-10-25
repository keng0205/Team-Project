<?php
    require("config.php");
	
	if(isset($_GET['id'])){
		$cIC = $_GET['id'];
		$query = 'SELECT * from childrenarchive WHERE cIC = "'.$cIC.'"';
		$result = mysqli_query($db, $query);
		$row = $result->fetch_assoc();
	}
	else{
		//header("Location: childrenList.php");
		//break;
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
	<?php include('/includes/popOutNavArchive.php');?>
</head>
<script>
	function setTab(){
		document.getElementsByClassName("nav-link")[1].classList.add("active");
	}
</script>
<body onload="setTab()">
	
	<div class="wrapper">
		<?php
			echo"
				<h2>".$row['cName']."</h2><hr>
			";
		?>
		<form name="selectYear" action="" method="GET">
		<input type="hidden" name="id" value="<?php echo $cIC; ?>">
		<select class="regInputStyle" id="yearDD" name="selectedYear" onchange="this.form.submit()">
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
					echo"<option disabled selected value='none'> -- Select Year -- </option>";
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
		</form>
		<?php
			if(isset($_GET['selectedYear'])){
				if($_GET['selectedYear'] != "none"){
					echo"
						<hr>
						<table class='table'>
							<thead class='thead-inverse'>
								<tr>
									<th>Subject</th>
									<th>Semester 1</th>
									<th>Semester 2</th>
									<th>Semester 3</th>
									<th>Semester 4</th>
									<th>Improvement Point</th>
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
											echo "<td>" .$resultDetails[$i]. "</td>";
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
									<td>";
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