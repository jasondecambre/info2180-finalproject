<?php
// handling header conflict issues
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
error_reporting(0);

// starting session

session_start();

require 'db.php';

try{
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
if($conn){
    //echo "Connected\n";
}
} catch(PDOException $e){
    //echo "FAILED DBCONN";
}

$email= filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL); 
$email= filter_var($email,FILTER_VALIDATE_EMAIL); // extra step to make sure the email is ok
$password= filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);


$pwsearch=$conn->query("SELECT password FROM users WHERE email='$email'");
$pw= $pwsearch->fetch(PDO::FETCH_ASSOC); 
print_r($pw);
//print_r(password_hash("password123", PASSWORD_DEFAULT));
$pw2 = $pw['password'];


if(password_verify($password,$pw2)){
    $details=$conn->query("SELECT * FROM users WHERE password='$pw2' AND email='$email'");    
    $result= $details->fetch(PDO::FETCH_ASSOC);
    if(isset($result)){        
        $_SESSION['logined_user']=$result['email'];
        $_SESSION['firstname']=$result['firstname'];
        $_SESSION['lastname']=$result['lastname'];
        $_SESSION['user_id']=$result['id'];
        if(isset($_SESSION['logined_user'])){
        header("Location:home.php" );
        }
    }
}else{
    //echo "<p id=loginerror'>Login Failed. Check your email address and password</p>";
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href=styles.css></head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="script.js"></script>
<body>

<header>BugMe Issue Tracker</header>

<!-- <nav id="left-sidebar" class="nav-con">
    <b><a href="home.php" id="home"><i class="fa fa-home fa-fw"></i> Home</a></b>
    <b><a href="user.php" id="user"><i class="fa fa-user-plus fa-fw"></i > Add User</a></b>
    <b><a href="create.php" id="issue"><i class="fa fa-plus-circle fa-fw"></i> New Issue</a></b>
    <b><a href="logout.php" id="logout"><i class="fa fa-power-off fa-fw"></i> Logout</a></b>
</nav> -->

<main>
<h3 id=loginerror'>Uh oh! Seems like your login failed.</h3>
<br>
<p>Check your email address and password.</p>
<form action="index.php">
    <br>
    <button>Try again</button>
</form>
</main>

</body>
</html>



