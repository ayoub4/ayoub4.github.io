<?php session_start();?>
<?php 
            $_SESSION["Username"] = null;
            $_SESSION["Firstname"] = null;
            $_SESSION["Lastname"] = null;
            $_SESSION["Role"] = null;
header("location: ../index.php");

?>