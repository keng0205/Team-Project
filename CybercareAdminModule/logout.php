<?php 
    require("config.php"); 
	session_unset();
	session_destroy();
    echo '<script type="text/javascript">alert("Logged out successfully.");
	window.location="/AcademicPointManagement/loginpage.php";</script>';
?>