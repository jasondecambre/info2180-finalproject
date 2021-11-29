<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href=styles.css></head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>

<header>BugMe Issue Tracker</header>

<main>
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
        <button type="submit" class="btn" id = "login-submit" name="login"> Submit</button>
    </form>
</main>

</body>
</html>