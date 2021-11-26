<!DOCTYPE html>
<html>

<head><link href="styles.css" rel="stylesheet" type="text/css"></head>

<body>
<header>BugMe Issue Tracker</header>

<nav id="left-sidebar">
  <a href="home.php" id="home">Home</a>
  <a href="user.php" id="user">Add User</a>
  <a href="create.php" id="issue">New Issue</a>
  <a href="logout.php" id="logout">Logout</a>
</nav>

<main>
  <form id="login-form" action="home.php" method="POST">
    <h1>Login</h1>
    <p>Enter your email and password</p>
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
      <button type="submit" class="btn" id = "login-submit" name="login"> Submit</button>
  </form>
</main>

<!---This entire screen should redirect us to the home.php file--->

</body>
</html>

<!--
<form action="#" method="post">

<label for ="email">Email</label>
  <div class="form-group">
    <input type="email" name="email" id="email">
  </div>

<p>Password</p>
  <div class="form-group">
    <input type="password" name="password" id="password">
  </div>

<br>
    
<button type="submit" class="btn">Submit</button>

<form>
--> 