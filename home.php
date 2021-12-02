<!DOCTYPE html>
<html>

<head><link rel="stylesheet" href="styles.css"></head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src = "script.js"></script>
<script src = "issues.js"></script>
<body>

<header>BugMe Issue Tracker</header>

<nav id="left-sidebar" class="nav-con">
    <b><a href="home.php" id="home"><i class="fa fa-home fa-fw"></i> Home</a></b>
    <b><a href="user.php" id="user"><i class="fa fa-user-plus fa-fw"></i > Add User</a></b>
    <b><a href="create.php" id="issue"><i class="fa fa-plus-circle fa-fw"></i> New Issue</a></b>
    <b><a href="logout.php" id="logout"><i class="fa fa-power-off fa-fw"></i> Logout</a></b>
</nav>
<section>
<main>
    <div id="top" class="grid-item">
        
        <h1>Issues</h1>
        <a href='create.php'><button type="button" class="create-issue">Create New Issue</button></a>
    </div>

          <br>
            <br>
          <!--The above button should redirect to create.php-->
          
          <div id="filterBy">
            <label for="filter" id="filter-label">Filter by: </label>
            <button class="filterbutton" id="all-button"> ALL</button>
            <button class="filterbutton" id = "open-button"> OPEN</button>
            <button class="filterbutton" id = "my-button"> MY TICKETS</button>
          </div>  
    
    <?php session_start();
    require_once "db.php";

    // setting up DB connection and getting issues data
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $findissues = $conn->query("SELECT * FROM issues");
    $allissuesfinal = $findissues->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($allissuesfinal)){ //in case there are no issues
?>
 
    <table class ="dashboardtable">
        <tr>
            <th> Title </th>
            <th> Type </th>
            <th id = "status-header"> Status </th>
            <th> Assigned To </th>
            <th> Created </th>
        </tr>

        <?php foreach ($allissuesfinal as $issue):
        $assign=$issue['assigned_to'];
        $findname=$conn->query("SELECT firstname,lastname FROM users WHERE id='$assign'");
        $name= $findname->fetch(PDO::FETCH_ASSOC);
            ?>
            <tr>
                <td class='hashtag'><?php echo "#".$issue['id']; ?><a class="issuelink" href="jobdetails.php?issueid=<?php echo $issue['id'];?>"><?php echo " ".$issue['title']; ?></a></td>
                <td><?php echo $issue['type']; ?></td>
                <?php if(($issue['status']=='OPEN') or ($issue['status']=='Open')){ ?>
                    <div class = "statuscontainer">
                        <td><div class='openstatus'> <?php echo $issue['status']; ?></div></td>
                        <?php }?>
                        <?php if($issue['status']=='Closed'){ ?>
                        <td><div class='closestatus'> <?php echo $issue['status']; ?></div></td>
                        <?php } ?>
                        <?php if($issue['status']=='In Progress' or $issue['status']=='In-Progress'){ ?>
                        <td><div class='progstatus'> <?php echo $issue['status']; ?></div></td>
                        <?php } ?>
                    </div>
                <td><?php echo $name['firstname']." ".$name['lastname']; ?></td>
                <td><?php echo $issue['created']; ?></td>
            </tr>
            
        <?php endforeach; ?>    
    </table>
        <?php }else{
            echo "There are no issues being tracked right now.";
        } ?>
</main>
</section> 
</body>
</html>
