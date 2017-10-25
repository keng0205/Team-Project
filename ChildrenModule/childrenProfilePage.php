<!DOCTYPE html>
<html>
<?php
 require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: /AcademicPointManagement/loginpage.php");
        die("Redirecting to /AcademicPointManagement/loginpage.php"); 
    }
	$user = $_SESSION['user'];
	
	$statement ="SELECT *
				FROM children c
				JOIN school s on c.schoolID = s.schoolID
				WHERE c.cIC='$user'";

	
		$result = mysqli_query($db,$statement);
	
	
		$row = $result->fetch_assoc();
		$cIC = $row['cIC'];
		$cName = $row['cName'];
		$level = $row['year'];
		
	
		$schoolID = $row['schoolID'];
		
	
		$ProfilePic = $row['profilePicture'];
		$schoolName = $row['schoolName'];
		$childrenEmail=$row['cEmail'];
		
	
		
?>

	

<head>
	<?php include('/includes/bootstrap.php');?>
	<link rel="stylesheet" type = "text/css" href="css/mystyle.css">
	<?php include('/includes/header-with-logout.php');?>
	<?php include('/includes/navTabs.php');?>
	<?php include('/includes/phpFunctions.php');?>
	
	
<style>
.image {
    float: left;
    margin: 0 50px 10px 10px;
}
#childrenInfo{
	margin : 20px;
}
.editBtn
{
position: absolute;
right:    0;
bottom:   0;
}

</style>
</head>
<body>


<div class="container">
	 <div class="col-md-3 col-lg-3 " align="left">
		<img src="<?php echo $ProfilePic;?>" alt="orphan picture" style="width:160px;height:200px;">
		
	</div>
	
		<div class=" col-md-9 col-lg-9 "> 
			   <table class="table table-user-information">
					<tbody>
					<tr>
							<td>IC Number :</td>
							<td><?php echo $cIC;?></td> <!--echo-->
					</tr>
					<tr>
							<td>Name :</td>
							<td><?php echo $cName;?></td><!--echo-->
					</tr>
					<tr>
							<td>Email :</td>
							<td><?php echo $childrenEmail;?></td><!--echo-->
					</tr>
					<tr>		
							<td>Age :</td>
							<td><?php echo countAge($cIC);?></td> <!--echo-->
					</tr>
					<tr>		
							<td>School :</td>
							<td><?php echo $schoolName;?></td><!--echo-->
					</tr>
					<tr>		
							<td>Academic Level :</td>
							<td><?php echo $level;?></td><!--echo-->
					</tr>		
					</tbody>
				</table>
					<form action="editEmail.php">
					<span></span><button class="btn btn-secondary" align="right" id= "editBtn" name="editBtn" type="submit"><span>Edit Profile</span></button>
		</form>
		</div>
	</div>


	<br>
	<br>
	<br>
	
	
	
	<?php 
	if (isset($_POST['searchYear']))
	{
		$year=$_POST['searchYear'];
	}
	else
	{	
	$year=date("Y");
	}
	

	$statement2 ="SELECT *
				FROM result r
				JOIN subject s on r.sID=s.sID
				WHERE r.cID='$cIC' AND r.year='$year'";

		$i=0;
		$result2 = mysqli_query($db,$statement2);
		$row2 = $result2->fetch_assoc();
		
			if($result2->num_rows>0)
			{
			do
			{
			$cResult[$i]=[
			'sName'=>$row2['sName'],
			'sem1'=>$row2['sem1'],
			'sem2'=>$row2['sem2'],
			'sem3'=>$row2['sem3'],
			'sem4'=>$row2['sem4'],
			'improvement'=>$row2['improvementPoint']];
			$i++;
			}while($row2 = $result2->fetch_assoc());
			}
			else
			{
				$cResult=null;
			}
			
		$statement3 ="SELECT aPoint
				FROM improvementpoint
				WHERE cIC='$cIC' AND year='$year'";
		$result3 = mysqli_query($db,$statement3);
		$row3 = $result3->fetch_assoc();
		$imp=$row3['aPoint'];
		
		
	
	
	?>
	
<div class="container">
	<div class="row">
        <div id="custom-search-input">
		<form name="selectYear" action="childrenProfilePage.php" method="post">
            <div class="input-group col-xs-3">
                <input type="Text" name="searchYear" class="search-query form-control" placeholder="Insert Year">		
                <span class="input-group-btn">
                    <button class="btn" name="serachYear" type="submit">
                    Search
                    </button>
                    </span>
            </div>
		</form>
        </div>
	<div>
	
	
	
	
		

	<div class="table-responsive">
	
		
	
	
	<?php 
	if($cResult==null)
	{
		echo"<h1>"; echo $year; echo"</h1>";
		echo"<hr>";
		echo"<h1>NO RESULT FOUND</h1>";
	}
	else
	{
			echo"<h1>"; echo $year; echo"</h1>";
			echo"<hr>";
				echo"
					<table class='table table-md'>
						<thead>
							<th>Subject</th>
							<th>Semeseter 1</th>
							<th>Semeseter 2</th>
							<th>Semeseter 3</th>
							<th>Semeseter 4</th>
							<th>Improvement Point</th>
						</thead>
						<tbody>";
					
						
					
						foreach($cResult as $cresult){
						echo"<tr>";
							foreach($cresult as $key=>$val)
							{
								if($val==null)
								{echo"<td>-</td>";}					
								else
								{echo"<td>";echo $val;echo "</td>";}
							}
						echo"</tr>";
						}
						
						
					
						echo"</tbody>";
						echo"<tfoot>";
							echo"<tr>";
								echo"<th id='total' colspan='5'>Total Improvement Point</th>";
								echo"<td>$imp</td>";
							echo"</tr>";
						echo"</tfoot>";
					echo"</table>";
				echo"</div>";
	}
	?>
	
	
	
	</div>
</div>

</body>