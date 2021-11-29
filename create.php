<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href=styles.css></head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<header>BugMe Issue Tracker</header>

<nav id="left-sidebar" class="nav-con">
    <b><a href="home.php" id="home"><i class="fa fa-home fa-fw"></i> Home</a></b>
    <b><a href="user.php" id="user"><i class="fa fa-user-plus fa-fw"></i > Add User</a></b>
    <b><a href="create.php" id="issue"><i class="fa fa-plus-circle fa-fw"></i> New Issue</a></b>
    <b><a href="logout.php" id="logout"><i class="fa fa-power-off fa-fw"></i> Logout</a></b>
</nav>

<main>
    <form>
    <h1>Create Issue</h1>  
        <br>
        <label for="title">Title</label>
        <br>
        <input id="title" type="text" name="title" class="input" /> 
        <br>
        <br>
        <label for="description"> Description</label> 
        <br>
        <textarea id="description" type="text" name="description" class="description"></textarea> 
        <br>
        <br>
        <label for="assigned"> Assigned To:</label> 
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
    </form>
</main>

</body>
</html>