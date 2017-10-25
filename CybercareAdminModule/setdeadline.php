<?php 
		$err="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$selectedYear=$_POST["selectedYear"];
			
			if(empty($_POST["category"])){
				$err .= '&catErr=';
			}else{
				$category = test_input($_POST["category"]);
			}
			
			if (empty($_POST["year"])) {	
					$err .= '&yearErr=';
			} else {
				$year = test_input($_POST["year"]);	
				if(!preg_match("/^[0-9]{4}$/",$year)){
					$err .= '&yearErr2=';
				}
			}
			
			
			if (empty($_POST["dateYear"])) {	
				$err .= '&dateYearErr=';
			} else {
				$dateyear = test_input($_POST["dateYear"]);	
				if(!preg_match("/^[0-9]{4}$/",$dateyear)){
					$err .= '&dateYearErr2=';
				}
			}
			
			if(empty($_POST["month"])){
				$err .= '&monthErr=';
			}else{
				$month = $_POST['month'];
			}
			
			if(empty($_POST["day"])){
				$err .= '&dayErr=';
			}else {
				$day = $_POST['day'];
			}
			
			if($err!="")	
				header("Location: set deadline.php?yearSelected=".$selectedYear."&searchBtn=".$err.""); 			

		}	

    if(!empty($_POST["category"])&&!empty($_POST["day"])&&!empty($_POST["month"])
	&&!empty($_POST["year"])&&preg_match("/^[0-9]{4}$/",$year)&&!empty($_POST["dateYear"])&&preg_match("/^[0-9]{4}$/",$dateyear))
	{
			$date =  $dateyear . '-' . $month .'-' .$day;
			$status = "Active";
			$query = "SELECT * FROM deadline WHERE year='$year' AND category='$category';";
			$result= mysqli_query($db, $query);
			
			if($result->num_rows == 0){ 
			$query = " 
				INSERT INTO deadline (date,year,category,status) VALUES ( 
					'$date',
					'$year',
					'$category',
					'$status'
				);
			"; 
		}
		else
		{
			$query="UPDATE deadline SET date='$date', status='$status' WHERE year='$year' AND category='$category'; ";
			
		}
			
			$db->query($query);
			mysqli_close($db);
			
			header("Location: set deadline.php?yearSelected=".$selectedYear."&searchBtn="); 
			die("Redirecting to loginpage.php"); 
			
	}
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	
	
?>