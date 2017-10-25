<?php 
$yearErr="";
$searchYear="";
$yearSelected="";
$category=array("Primary","lowerSecondary","upperSecondary");
if(isset($_GET['searchBtn'])){
	if(empty($_GET["yearSelected"])){
		$yearErr = " **Please enter a year";
		}else if(!preg_match("/^[0-9]{4}$/",$_GET["yearSelected"])){
			$yearErr = " **Please enter a valid year";
			$_GET["yearSelected"]="";
			}else{
				$yearSelected = $_GET["yearSelected"];
				$query = "SELECT * FROM deadline where year='$yearSelected';";
				$result= mysqli_query($db, $query);
				if ($result->num_rows > 0) {
					$searchYear="y";
					$deadline=array();
					while($row = $result->fetch_assoc()) {
						if($row['category']==$category[0]){
							$deadline[0]['id']=$row['id'];
							$deadline[0]['date']=$row['date'];
							$deadline[0]['category']=$row['category'];
							$deadline[0]['year']=$yearSelected;
							$deadline[0]['status']=$row['status'];
						}else if($row['category']==$category[1]){
								$deadline[1]['id']=$row['id'];
								$deadline[1]['date']=$row['date'];
								$deadline[1]['category']="Lower Secondary";
								$deadline[1]['year']=$yearSelected;
								$deadline[1]['status']=$row['status'];
							}else if($row['category']==$category[2]){
									$deadline[2]['id']=$row['id'];
									$deadline[2]['date']=$row['date'];
									$deadline[2]['category']="Upper Secondary";
									$deadline[2]['year']=$yearSelected;
									$deadline[2]['status']=$row['status'];
								}
					}
					for($i=0; $i<3 ;$i++){
						if(!isset($deadline[$i])){
							$deadline[$i]['id']="N/A";
							$deadline[$i]['date']="N/A";
							$deadline[$i]['category']=$category[$i];
							$deadline[$i]['year']=$yearSelected;
							$deadline[$i]['status']="N/A";
						}
					}
				}
				else
					$yearErr=" **No result for Year ".$yearSelected;
			
			}
}

else
	unset($_SESSION['yearSelected']);

?>