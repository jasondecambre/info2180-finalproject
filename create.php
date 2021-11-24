<!DOCTYPE html>
<html>
<body>

<header>BugMe Issue Tracker</header><br><br>

<!--The following will be styled with css and be a constant sidebar with links to all necessary pages
It will not be available on the login or logout screens-->

<nav>
  <a href="home.php">Home</a>
  <a href="user.php">Add User</a>
  <a href="create.php">New Issue</a>
  <a href="logout.php">Logout</a>
</nav>


<main>
    <h1>Create Issue</h1>
        <label for="title"> Title</label>
        <br>
        <input id="title" type="text" name="title" class="input" /> 
        <br>
        <br>
        <label for="description"> Description</label> 
        <br>
        <input id="description" type="text" name="description" class="description" /> 
        <br>
        <br>
        <label for="assigned"> Assigned To</label> 
        <br>
        <select name="assigned" id="assigned"> 
        <br>
        <br>
        <!--List names all names from the database-->
            <option value="names"> </option> 
        </select> 
        <br>
        <br>
        <label for="type"> Type</label> 
        <br>
        <select name ="type" id ="type"> 
        <br>
            <option value="Bug">Bug</option> 
            <option value="Proposal">Proposal</option> 
            <option value="Task">Task</option> 
        </select> 
        <br>
        <br>
        <label for="priority"> Priority</label> <br>
        <select name ="priority" id ="priority">
            <option value="Minor">Minor</option>
            <option value="Major">Major</option>
            <option value="Critical">Critical</option>
        </select> 
        <br>
        <br>     
        <button type="submit" class="btn"> Submit</button>
</main>


</body>
</html>

<!--
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
-->