<?php 
	require("config.php"); 
	
	$user = $_SESSION['user'];
		

	$statement ="SELECT cIC
				FROM children 
				WHERE cIC='$user'";
	$result = mysqli_query($db,$statement);
	$row = $result->fetch_assoc();
	$cIC = $row['cIC'];
	$year=date("Y");
	$rID=$_POST['submit'];
	
	if(isset($_POST['submit']))
	{
		$statement ="DELETE FROM result WHERE rID=$rID";
		
		$db->query($statement);
		
	}
		$statement2 ="SELECT sem1,sem2,sem3,sem4,improvementPoint
				FROM result
				WHERE rID='".$id."'";
	$result=mysqli_query($db,$statement2);
	$row = $result->fetch_assoc();
	$sem=[$row['sem1'],$row['sem2'],$row['sem3'],$row['sem4']];
	$numberOfExam=0;
	$total=0;
	$oldTotal=0;
	for($i=0;$i<4;$i++)
	{
		if($sem[$i]!=NULL)
		{
			$numberOfExam++;
		}
		
	}
	if($numberOfExam<=1)
	{
		$improvementPoint=0;
	}
	else
	{
		for($a=0;$a<$numberOfExam;$a++)
		{
			$total+=$sem[$a];
		}
		$newAverage=$total/$numberOfExam;
		
		for($b=0;$b<$numberOfExam-1;$b++)
		{
			$oldTotal+=$sem[$b];		
		}
		$oldAverage=$oldTotal/($numberOfExam-1);
		$improvementPoint=$newAverage-$oldAverage;
	}
	
	$year=date("Y");

	
	$statement3 = "UPDATE result SET improvementPoint ='".$improvementPoint."' WHERE rID='".$id."'";
		 
	mysqli_query($db,$statement3);
	
	$statement4 ="SELECT improvementPoint
				 FROM result
				 WHERE cID='".$user."' AND year='".$year."'";
	
	$result = mysqli_query($db,$statement4);
	$totalImp=0;
	
	 if(mysqli_num_rows($result) > 0)
	 {
		  while($row = mysqli_fetch_array($result))  
		  {
				$totalImp+=$row['improvementPoint'];
		  }
	 }

	$year=date("Y");
	

	$statement5 ="SELECT category
				 FROM children
				 WHERE cIC='".$user."'";
	$result5 = mysqli_query($db,$statement5);
	$row = $result5->fetch_assoc();
	$category=$row['category'];
	
				 
	
	$result6 = mysqli_query($db,"SELECT * FROM improvementpoint WHERE cIC='".$user."' AND year=$year");

if( mysqli_num_rows($result6) > 0) {
    mysqli_query($db,"UPDATE improvementpoint SET aPoint = '$totalImp'WHERE cIC='".$user."' AND year=$year");
}
else
{
    mysqli_query($db,"INSERT INTO improvementpoint (cIC,aPoint,year,category)VALUES($user,$totalImp,$year,'".$category."')");
	
}
	

					

	
	
		header("Location: insertMark.php"); 
		die("Redirecting to index.php"); 
	
	?>