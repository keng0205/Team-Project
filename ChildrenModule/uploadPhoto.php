<?php
include('config.php');
$user = $_SESSION['user'];
if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);
			
			$location="images/" . $_FILES["image"]["name"];
			
			
			$save=mysqli_query($db,"UPDATE children set profilePicture= '$location' WHERE cIC='$user'");
			header("location: editEmail.php");
							
	}
?>
