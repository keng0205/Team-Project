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
		$i=0;
	
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
	<?php include('/includes/phpFunctions.php');?>
	<?php include('/includes/navTabs.php');?>
	
	
<style>
.image {
    float: left;
    margin: 0 50px 10px 10px;
}
#childrenInfo{
	margin : 20px;
}

.childrenEmail {
    max-width: 380px;
}

</style>
</head>
<body>
<div class="container">
	 <div class="col-md-3 col-lg-3 " align="left">
		<img src="<?php echo $ProfilePic;?>" alt="orphan picture" style="width:160px;height:200px;">
			<form action="uploadPhoto.php" method="post" enctype="multipart/form-data" name="addroom">
			Select Image: <br/>
			<input class="default" type="file" name="image" class="ed"><br />
			<input  class="default" type="submit" name="Submit" value="Upload" id="button1" />
			</form>
	</div>
		<div class=" col-md-9 col-lg-9 "> 
			   <table class="table table-user-information">
			   <form name="updateform" action="UpdateEmail.php" method="post">
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
							<td>
							<input  type="text" name="childrenEmail" id="childrenEmail" value="<?php echo $childrenEmail; ?>">
							</td>
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
					
					<span></span><button class="btn btn-secondary" align="right" id= "saveBtn" name="saveBtn" type="submit"><span>Save</span></button>
				</form>
		</div>
</div>

		




</body>