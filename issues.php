<?php session_start();
    require_once "db.php";
	if (!isset($_SESSION['logined_user']))
    {
    header('Location: logout.php');
    }
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $allusers = $conn->query("SELECT * FROM users");
  $allusersfinal = $allusers->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<body>

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
</html>