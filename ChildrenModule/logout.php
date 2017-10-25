<?php 
    require("config.php"); 
    unset($_SESSION['user']);
    header("Location: /AcademicPointManagement/loginpage.php"); 
    die("Redirecting to: /AcademicPointManagement/loginpage.php");
?>