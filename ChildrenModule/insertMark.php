<html>
<?php
 require("config.php");
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
	//

	$today=date("Y-m-d");


	$statement ="SELECT date
					FROM deadline 
					WHERE category='$clevel' AND year='$year'";

	$result = mysqli_query($db,$statement);
	$row = $result->fetch_assoc();
	$deadline=$row['date'];

					
	$today_dt = new DateTime($today);
	$expire_dt = new DateTime($deadline);

	if ($expire_dt <= $today_dt)
	{

		header("Location: deadline.php");
		die("Redirecting to deadline.php"); 
	}


	$statement ="SELECT *
				FROM result r
				JOIN subject s on r.sID=s.sID
				WHERE r.cID='$cIC' AND r.year='$year'";

		$i=0;
		$result = mysqli_query($db,$statement);
		$row = $result->fetch_assoc();
		
			if($result->num_rows>0)
			{
				do
				{
				$cResults[$i]=[
				'sName'=>$row['sName']];
				$i++;
				}while($row = $result->fetch_assoc());
			}
			else
			{
				$cResults=null;
			}
	
	?>
		
<head>
	<?php include('/includes/bootstrap.php');?>
	<link rel="stylesheet" type = "text/css" href="css/mystyle.css">
	<?php include('/includes/header-with-logout.php');?>
	<?php include('/includes/navTabs.php');?>
</head>

      <body>  
           <div class="container">  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">Insert And Edit Acadamic Result</h3><br />  
                     <div id="live_data"></div>                 
                </div>  
           </div>
	<?php 
	 
	$statement2 ="SELECT sID,sName
				FROM subject 
				WHERE category='$clevel' AND status='Active'";
		$k=0;
		$result2 = mysqli_query($db,$statement2);
		$row2 = $result2->fetch_assoc();
		
			if($result2->num_rows>0)
			{
				do
				{
				$subjects[$k]=[
				'sID'=>$row2['sID'],
				'sName'=>$row2['sName']];
				$k++;
				}while($row2 = $result2->fetch_assoc());
			}
			else
			{
				$subjects=null;
			}

	if($cResults!=null)
	{
		$arr_length = count($subjects);
		$arr_length2=count($cResults);
		for($a=0;$a<$arr_length;$a++)
		{
			
			
			for($b=0;$b<$arr_length2;$b++)
			{
				
				if($subjects[$a]['sName']==$cResults[$b]['sName'])
				{	
					unset($subjects[$a]);
					break;
					
				}

						
			}
			
			
			
		}
	}

			
	?>
	
	<?php 
	
	if($subjects!=null)
	{
			echo"<h1>Subject</h1>";
		
				echo"<form action='insertSubject.php' method='post'>";
				echo"<div class='tableDiv'>
					<table class='table-sm table-inverse'>
						<thead>
							<th>Subject ID</th>
							<th>Subject Name</th>
							<th></th>
						</thead>
						<tbody>";
					
						
					
						foreach($subjects as $subject){
						echo"<tr>";
							foreach($subject as $key=>$val)
							{
								
								if($key=="sName")
								{echo"<td>$val</td><td><input type='checkbox' name='check_list[]' value='$selectedId'></td>";}
								else
								{
									echo"<td>$val</td>";
									$selectedId=$val;
								}
							}
						echo"</tr>";
						}
						echo"</tbody>";
						
					
					echo"</table>";
				echo"</div>";
				echo"<br>";
				echo"<span><span><button type='submit' class='btn btn-primary btn-md' name='submit' value='Submit'>submit";
				echo"</form>";
			
				

				
				
				
	}
	
	
	
?>
	

	
	
	
</body>		   
</html>
<script>
$(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
 
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.sem1', function(){  
           var id = $(this).data("id1");  
           var sem1 = $(this).text();  
           edit_data(id, sem1, "sem1");  
      });  
	  
	       $(document).on('blur', '.sem2', function(){  
           var id = $(this).data("id2");  
           var sem2 = $(this).text();  
           edit_data(id, sem2, "sem2");  
      });  
	  
	        $(document).on('blur', '.sem3', function(){  
           var id = $(this).data("id3");  
           var sem3 = $(this).text();  
           edit_data(id, sem3, "sem3");  
      });  
	  
	  
	        $(document).on('blur', '.sem4', function(){  
           var id = $(this).data("id4");  
           var sem4 = $(this).text();  
           edit_data(id, sem4, "sem4");  
      });  
	  


 });  
 </script>  
