<!DOCTYPE html>
<html>
<body>

<!--The following will be styled with css and be a constant sidebar with links to all necessary pages
It will not be available on the login or logout screens-->

<h1>BugMe Issue Tracker</h1>

<div class="sidenav">
  <a href="home.php">Home</a>
  <a href="user.php">Add User</a>
  <a href="create.php">New Issue</a>
  <a href="logout.php">Logout</a>
</div>


<p>Issues</p>

<form action="#" method="post">

    <p>Title</p>
    <div class="form-group">
        <input type="title" name="title" id="title">
    </div>

    <p>Description</p>
    <div class="form-group">
        <input type="description" name="description" id="description">
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

    <br> 

</body>
</html>