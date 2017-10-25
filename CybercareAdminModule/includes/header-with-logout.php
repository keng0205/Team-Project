	<div class="headerBanner">
		<div class="titleDiv">
			<h1 id="headerTitle">Cybercare Academic Point Management System</h1>
		</div>
	
		<div class="logoutDiv">
			<form method="post" action="logout.php">
			<h4 style="">Welcome <?php echo $_SESSION['user']['admin_Name']; ?>!</h4>
				<button class="btn btn-outline-secondary" type="submit">Log Out</button>
			</form>
		</div>
	</div>