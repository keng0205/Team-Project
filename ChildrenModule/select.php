<?php require("config.php");
	
    if(empty($_SESSION['user'])) 
    {
        header("Location: /AcademicPointManagement/loginpage.php");
        die("Redirecting to /AcademicPointManagement/loginpage.php"); 
    }
	
	$user = $_SESSION['user'];

	$statement ="SELECT cIC,category
				FROM children 
				WHERE cIC='$user'";
	$result = mysqli_query($db,$statement);
	$row = $result->fetch_assoc();
	$cIC = $row['cIC'];
	$clevel=$row['category'];
		
			

	$year=date("Y");


	$statement ="SELECT *
				FROM result r
				JOIN subject s on r.sID=s.sID
				WHERE r.cID='$cIC' AND r.year='$year'";

		$i=0;
		$result = mysqli_query($db,$statement);
		echo"<h1>"; echo $year; echo"</h1>";
			echo"<hr>";
			
			
				echo"<div class='tableDiv'>
					<table class='table'>
						<thead>
							<th width='25%'>Subject</th>
							<th width='15%'>Semeseter 1</th>
							<th width='15%'>Semeseter 2</th>
							<th width='15%'>Semeseter 3</th>
							<th width='15%'>Semeseter 4</th>
							<th width='15%'></th>
							
						</thead>
						<tbody>";
	 if(mysqli_num_rows($result) > 0)
	 {
		  while($row = mysqli_fetch_array($result))  
		  {
			  
			  echo"<tr>";
			  echo"<td>".$row['sName']."</td>";
			  echo"<td class='sem1' data-id1='".$row['rID']."' contenteditable>".$row['sem1']."</td>";
			  echo"<td class='sem2' data-id2='".$row['rID']."' contenteditable>".$row['sem2']."</td>";
			  echo"<td class='sem3' data-id3='".$row['rID']."' contenteditable>".$row['sem3']."</td>";
			  echo"<td class='sem4' data-id4='".$row['rID']."' contenteditable>".$row['sem4']."</td>";
			  echo"<td><form action='deleteSub.php' method='post'><button type='submit' class='btn btn-danger' name='submit' value='".$row['rID']."'>Delete</form></td>";
			  echo"</tr>";
		  }
		  
	 }
	 else
	 {
		 echo"<tr>
				<td colspan='6'>Data Not Found</td>
			</tr>";
	 }
	 echo"</tbody>
		</table>
		</div>";
?>
		 
		 
		 
		 
		 
		 
		 
