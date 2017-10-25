<?php
	if(empty($_SESSION['user'])) 
    {
        header("Location: ../loginpage.php");
        die("Redirecting to loginpage.php"); 
    }
	else{
		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 900)) {
			session_unset();
			session_destroy();
			echo '<script type="text/javascript">alert("Session timed-out.");
			window.location="/AcademicPointManagement/loginpage.php";</script>';
		}
		$_SESSION['LAST_ACTIVITY'] = time();
	}
?>