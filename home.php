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
    <div id="top" class="grid-item">
        <h1>Issues</h1>
        <a href='create.php'><button type="button" class="create-issue">Create New issue</button></a>
    </div>

          <br>
            <br>
          <!--The above button should redirect to create.php-->
          
          <div id="filterBy">
            <label for="filter" id="filter-label">Filter by: </label>
            <button class="filterbutton" id="all-button"> ALL</button>
            <button class="filterbutton"> OPEN</button>
            <button class="filterbutton"> MY TICKETS</button>
        </div>
</main>

</body>
</html>

