<!DOCTYPE html>
<html>
<body>

<nav>
  <a href="home.php">Home</a>
  <a href="user.php">Add User</a>
  <a href="create.php">New Issue</a>
  <a href="logout.php">Logout</a>
</nav>

<main>
    <form method="POST">
        <h1>New User</h1>
        <label for="fname"> Firstname</label>
        <br>
        <input id="fname" type="text" name="fame" class="input"/> 
        <br>
        <br> 
        <label for="lname"> Lastname</label> 
        <br>
        <input id="lname" type="text" name="lame" class="input"/> 
        <br>
        <br>
        <label for="password"> Password</label> 
        <br>
        <input id="password" type="text" name="password" class="input"/> 
        <br>
        <br>
        <label for="email"> Email</label> 
        <br>
        <input id="email" type="text" name="email" class="input"/>
        <br>
        <br>
        <button type="submit" class="btn" id = "btn" name="addBTN"> Submit</button>
    </form>
</main>

</body>
</html>

<!--
<h1>New User</h1>

<p>Add a new user to the database</p>


<form action="#" method="post">

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
-->