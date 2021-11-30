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
  <a href="home.php">Home</a>
  <a href="user.php">Add User</a>
  <a href="createissue.php">New Issue</a>
  <a href="logout.php">Logout</a>
</div>

<h1>New Issue</h1>

<p>Create new Issue</p>

<form action="addissue.php" method="post">

<p>Title</p>
    <div class="form-group">
      <input type="title" name="title" id="title">
    </div>

    <p>Description</p>
    <div class="form-group">
      <input type=description" name="description" id="description">
    </div>

  

<form>

<p>Issues</p>

<button type="submit" class="btn">Submit</button>


</body>
</html>