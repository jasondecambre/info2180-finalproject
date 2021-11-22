<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location:index.php"); 
?>

<!--Line 5 was originally login.php-->