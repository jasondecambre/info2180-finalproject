<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href=styles.css></head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="script.js"></script>
<body>

<header>BugMe Issue Tracker</header>

<nav id="left-sidebar" class="nav-con">
    <b><a href="home.php" id="home"><i class="fa fa-home fa-fw"></i> Home</a></b>
    <b><a href="user.php" id="user"><i class="fa fa-user-plus fa-fw"></i > Add User</a></b>
    <b><a href="create.php" id="issue"><i class="fa fa-plus-circle fa-fw"></i> New Issue</a></b>
    <b><a href="logout.php" id="logout"><i class="fa fa-power-off fa-fw"></i> Logout</a></b>
</nav>

<main>
  <div id="content">
    <form id="login-form" action="home.php" method="POST">
      <h1>Login</h1>
      <br>
      <p>Enter your email and password</p>
      <br>
        <label for="email"> Email</label>
        <br>
        <input id="email" type="text" name="email" class="input" />
        <br>
        <br>
        <label for="password"> Password</label>
        <br>
        <input id="password" type="text" name="password" class="input" /> 
        <br>
        <br>  
        <p id="login-form-message"></p>          
        <button type="submit" class="btn" id = "login-submit" name="login"> Submit</button>
    </form>
  <div> 
</main>

</body>
</html>