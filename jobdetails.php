<?php session_start(); 

require_once "db.php";
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$issueid= filter_input(INPUT_GET,"issueid",FILTER_SANITIZE_STRING); 
$issue = $conn->query("SELECT * FROM Issues WHERE id ='$issueid' ");
$issuedetails= $issue->fetch(PDO::FETCH_ASSOC);
$assign=$issuedetails['assigned_to'];
$findname=$conn->query("SELECT firstname,lastname FROM Users WHERE id='$assign'");
$name= $findname->fetch(PDO::FETCH_ASSOC);
$creator=$issuedetails['created_by'];
 $findcreator=$conn->query("SELECT firstname,lastname FROM Users WHERE id='$creator'");
$creatornm= $findcreator->fetch(PDO::FETCH_ASSOC);  
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href ="styles.css">
        <script type="text/javascript" src="issuedetails.js"></script>
    </head>
    <body>
        <div class="container">
            <header>
                
                <h1> BugMe Issue Tracker </h1>
            </header>
            <div class = "sidenav">
                <ul>
                    <div class = "home">
                        
                        <a href="dashboard.php">Home</a> 
                    </div>

                    <div class = "adduser">
                        
                        <a href="addusers.php">Add User</a> 
                    </div>

                    <div class = "newissue">
                       
                        <a href="createissue.php">New Issue</a> 
                    </div>
                    <div class = "logout">
                    
                        <a href="logout.php">Logout</a>

                    </div>
                </ul>  
            </div>

            <h1 id="issue-title"><?php echo $issuedetails["title"]?> </h1>
            <div class ="displayjobdetails">
                <div class = "issuedetails">
                    <h3 id="issue-#" value=<?php echo $issuedetails["id"]?>>Issue #<?php echo $issuedetails["id"]?></h3>
                    <p id="issue-des"><?php echo $issuedetails["_description"]?> </p>
                    <p id="issue-create"> > Issue created on <?php echo $issuedetails["created"]?> by <?php echo $creatornm['firstname']." ".$creatornm['lastname']; ?> </p>
                    <p id="issue-update"> > Issue updated on <?php echo $issuedetails["updated"]?></p>
                </div>
                

                <div class = "aside">
                    <div class = "tab">
                        <h3> Assigned To</h3>
                        <p><?php echo $name['firstname']." ".$name['lastname']; ?> </p>

                        <h3> Type </h3>
                        <p><?php echo $issuedetails["_type"] ?> </p>

                        <h3> Priority </h3>
                        <p><?php echo $issuedetails["_priority"] ?> </p>

                        <h3> Status</h3>
                        <p><?php echo $issuedetails["_status"] ?></p>
                    </div><br>
                
                    <div class = "buttons">
                        <button type="submit" id="closed"> Mark as Closed </button><br><br>
                        <button type="submit"  id="inprogress"> Mark in Progress </button>
                    </div>
                    <div id="result"></div>
                </div>

            </div>
        </div>
    </body>
</html>