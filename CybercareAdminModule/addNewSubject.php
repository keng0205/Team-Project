<?php

	$err="";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$category=$_POST['newSubCat'];
		if(empty($_POST["newSub"])){
			$err .= '&subErr=';
		}else{
			$newSub= test_input($_POST["newSub"]);
		}
		
		if(empty($_POST["subType"])){
			$err .= '&typeErr=';
		}else{
			$coreSubject=$_POST["subType"];
		}
		
		if($err!="")	
				header("Location: modifySubjectPage.php?category=".$category.$err.""); 			
	}
		
    if(!empty($_POST["newSub"])&&!empty($_POST["subType"])&&!empty($_POST["newSubCat"])) 
	{
		
		$query = "SELECT * FROM subject where sName='$newSub' AND category='$category';";
		$result= mysqli_query($db, $query);
		if($result->num_rows == 0){ 
		$status="Active";
		$query = "INSERT INTO subject (sName,category,coreSubject,status) VALUES ( 
					'$newSub',
					'$category',
					'$coreSubject',
					'$status'
			);
		"; 
		$db->query($query);
		header("Location: modifySubjectPage.php?category=".$category.""); 
		}
		else
		{
			echo '<script type="text/javascript">alert("Duplicate Subject Name");
		window.location="modifySubjectPage.php?category='.$category.'";</script>';
			
		}
		
		mysqli_close($db);
	}
	
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

?>