<?php
// handling header conflict issues
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

// starting session

session_start();

require 'db.php';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$email= filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL); 
$email= filter_var($email,FILTER_VALIDATE_EMAIL); // extra step to make sure the email is ok
$password= filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);

$pwsearch=$conn->query("SELECT password FROM users WHERE email='$email'");
$pw= $pwsearch->fetch(PDO::FETCH_ASSOC);

if($pw == $password){
    $details=$conn->query("SELECT * FROM users WHERE password='$pw' AND email='$email'");    
    $result= $details->fetch(PDO::FETCH_ASSOC);
    if(isset($result)){        
        $_SESSION['logined_user']=$result['email'];
        $_SESSION['firstname']=$result['firstname'];
        $_SESSION['lastname']=$result['lastname'];
        $_SESSION['user_id']=$result['id'];
        if(isset($_SESSION['logined_user'])){
        header("Location:dashboard.php" );
        }
    }
}else{
    echo "<p id=loginerror'>Login Failed. Check your email address and password</p>";
}
?>



