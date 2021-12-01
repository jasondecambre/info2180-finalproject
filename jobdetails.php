<?php session_start(); 

require_once "db.php";
// setting up DB connection
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$issueid= filter_input(INPUT_GET,"issueid",FILTER_SANITIZE_STRING); 
$issue = $conn->query("SELECT * FROM issues WHERE id ='$issueid' ");
$issuedetails= $issue->fetch(PDO::FETCH_ASSOC);
$assign=$issuedetails['assigned_to'];
$findname=$conn->query("SELECT firstname,lastname FROM users WHERE id='$assign'");
$name= $findname->fetch(PDO::FETCH_ASSOC);
$creator=$issuedetails['created_by'];
$findcreator=$conn->query("SELECT firstname,lastname FROM users WHERE id='$creator'");
$creatornm= $findcreator->fetch(PDO::FETCH_ASSOC); 
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href ="styles.css">
        <script type="text/javascript" src="update.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            <header>
                
                <h1> BugMe Issue Tracker </h1>
            </header>
            <nav id="left-sidebar" class="nav-con">
    <b><a href="home.php" id="home"><i class="fa fa-home fa-fw"></i> Home</a></b>
    <b><a href="user.php" id="user"><i class="fa fa-user-plus fa-fw"></i > Add User</a></b>
    <b><a href="create.php" id="issue"><i class="fa fa-plus-circle fa-fw"></i> New Issue</a></b>
    <b><a href="logout.php" id="logout"><i class="fa fa-power-off fa-fw"></i> Logout</a></b>
</nav>
<main>
            <h1 id="issue-title"><?php echo $issuedetails["title"]?> </h1>
            <div class ="displayjobdetails">
                <div class = "issuedetails">
                    <h3 id="issue#" value=<?php echo $issuedetails["id"]?>>Issue #<?php echo $issuedetails["id"]?></h3>
                    <p id="issue-desc"><?php echo $issuedetails["description"]?> </p>
                    <p id="issue-create"> > Issue created on <?php echo $issuedetails["created"]?> by <?php echo $creatornm['firstname']." ".$creatornm['lastname']; ?> </p>
                    <p id="issue-update"> > Issue updated on <?php echo $issuedetails["updated"]?></p>
                </div>
                

                <div class = "aside">
                    <div class = "tab">
                        <div>
                            <h3> Assigned To</h3>
                            <p><?php echo $name['firstname']." ".$name['lastname']; ?> </p>
                        </div>

                        <div>
                        <h3> Type </h3>
                        <p><?php echo $issuedetails["type"] ?> </p>
                        </div>

                        <div>
                        <h3> Priority </h3>
                        <p><?php echo $issuedetails["priority"] ?> </p>
                        </div>

                        <div>
                        <h3> Status</h3>
                        <p><?php echo $issuedetails["status"] ?></p>
                        </div>
                    </div><br>
                
                    <div class = "buttons">
                        <button type="submit" id="closed" action = "issuesupdate.php"> Mark as Closed </button><br><br>
                        <button type="submit"  id="inprogress" action = "issuesupdate.php"> Mark in Progress </button>
                    </div>
                    <div id="result"></div>
                </div>

            </div>
        </div>
</main>
    </body>
</html>