<?php function countRight($rightValue,$value){
	
		$right=false;
		$bRight = (int)substr($rightValue,0);
		$bRight=decbin($bRight);
		$bValue=decbin($value);
		
		$rLength = strlen((string)$bRight);
		$vLength = strlen((string)$bValue);
		
		if($rLength>= $vLength){
			$bRight=(int)substr($bRight,($vLength*-1),1);
			$bValue=(int)substr($bValue,0,1);
			if($bRight==$bValue)
			{
				$right=true;
			}
		}
		
		return $right;
	}
	?>
<div class="navBarDiv">
	<div class="navBar">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<div class="dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="navDrop">Home</span></a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						<li><a href="viewOrphanageHome.php">View Orphanage Home List</a></li>
						<li><a href="searchChild.php">Search Child</a></li>
						<?php if(countRight($right,8)) {
							echo "<li><a href='viewAcademicRanking.php'>View Academic Ranking</a></li>";
						 }?>
					</ul>
				</div>
			</li>
			<?php if(countRight($right,1) || countRight($right,2) || countRight($right,4)) {?>
			<li class="nav-item">
				<div class="dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="navDrop">Maintenance</span></a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<?php if(countRight($right,1)) {?>
						<li><a href="staffList.php">View Staff List</a></li>
					<?php }?>
					<?php if(countRight($right,2)) {?>
						<li><a href="modifySubjectPage.php">Subject Offered</a></li>
							<?php }?>
							<?php if(countRight($right,4)) {?>
						<li><a href="set deadline.php">Set Deadline</a></li>
						<?php }?>
					</ul>
				</div>
			</li>
			<?php }?>
			<li class="nav-item"><a class="nav-link" href="changePasswordPage.php">Change Password</a></li>
		</ul>
	</div>
</div>