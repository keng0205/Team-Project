<?php
$categorySelected="";
if(isset($_GET['category'])){
	$categorySelected = $_GET['category'];
	$query = "SELECT * FROM subject where category='$categorySelected' ORDER BY sName ASC;";
	$result= mysqli_query($db, $query);

	
}

?>