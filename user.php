<?php session_start();
    require_once 'db.php';
    if (!isset($_SESSION['logined_user']))
    {
    header('Location: logout.php');
    }
    if($_SESSION['logined_user']!='admin@project2.com'){
         $_SESSION["denied"]="denied";
        header("Location: dashboard.php");
    }
    ?>

<!DOCTYPE html>
<html>
<body>

<div class="sidenav">
  <a href="home.php">Home</a>
  <a href="user.php">Add User</a>
  <a href="create.php">New Issue</a>
  <a href="logout.php">Logout</a>
</div>

<h1>New User</h1>

<p>Add a new user to the database</p>


<form action="insertuser.php" method="post">

    <p>First Name</p>
    <div class="form-group">
        <input type="firstname" name="firstname" id="firstname">
    </div>

    <p>Last Name</p>
    <div class="form-group">
        <input type="lastname" name="lastname" id="lastname">
    </div>

    <br>

    <p>Password</p>
    <div class="form-group">
        <input type="password" name="password" id="password">
    </div>

    <br>

    <p>Email</p>
    <div class="form-group">
        <input type="email" name="email" id="email">
    </div>

    <br>
    
    <button type="submit" class="btn">Submit</button>
</form>


</body>
</html>