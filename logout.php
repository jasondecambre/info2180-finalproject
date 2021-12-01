<?php
session_start();

// removing the $_SESSION data for the user
unset($_SESSION["id"]);
unset($_SESSION["name"]);

// returning to login page
header("Location:index.php"); 
?>
