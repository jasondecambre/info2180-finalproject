<?php
 header("Access-Control-Allow-Origin: *");

 // Login

$login_email = filter_var((strip_tags($_GET['loginemail']), FILTER_SANITIZE_STRING));
$login_password = filter_var((strip_tags($_GET['login_password']), FILTER_SANITIZE_STRING));




$conn = new PDO("mysql:host='localhost';dbname='schema.sql';charset=utf8mb4", $login_email, $login_password);


 // Feature #1: Adding a user

 // Regex validation done on client side

 // Input taken from webpage, escaped with strip_tags() and sanitized with filter_var()

 $firstname = filter_var((strip_tags($_GET['firstname']), FILTER_SANITIZE_STRING));
 $lastname = filter_var((strip_tags($_GET['lastname']), FILTER_SANITIZE_STRING));
 $password = password_hash(filter_var((strip_tags($_GET['password']), FILTER_SANITIZE_STRING))); //hashed password
 $email = filter_var((strip_tags($_GET['email']), FILTER_SANITIZE_STRING));





 ?>