<?php 
    session_start();
    require_once "db.php";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	if (!isset($_SESSION['logined_user']))
  {
    header('Location: logout.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href = "styles.css">
        <script type="text/javascript" src="dashboard.js"></script>
    </head>
    <body>
        <div class="container">
            <header>              
                <h1> BugMe Issue Tracker </h1>
            </header>
            <div class="sidenav">
  <a href="#">Home</a>
  <a href="user.php">Add User</a>
  <a href="issues.php">New Issue</a>
  <a href="logout.php">Logout</a>
</div>

<h1>New Issue</h1>

<p>
Report any issues you have to us
<p>

<div class="sidenav">
  <a href="#">Home</a>
  <a href="user.php">Add User</a>
  <a href="issues.php">New Issue</a>
  <a href="logout.php">Logout</a>
</div>
</body>
</html> <?php $_SESSION["denied"]=null;?>
