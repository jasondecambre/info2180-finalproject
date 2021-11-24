<!DOCTYPE html>
<html>
<body>

<header>BugMe Issue Tracker</header>

<main>
  <form action="home.php" method="POST">
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
      <button type="submit" class="btn" id = "btn" name="login"> Submit</button>
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