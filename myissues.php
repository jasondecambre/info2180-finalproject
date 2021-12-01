<?php
    session_start();
    require_once "db.php";

    // setting up DB connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $sessionid =$_SESSION['user_id'];
    $myissues = $conn->query("SELECT * FROM issues WHERE assigned_to ='$sessionid' ");
    $myissuesfinal = $myissues->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($myissuesfinal)){
?>
<table id="dashboardtable">
    <tr>
        <th> Title </th>
        <th> Type </th>
        <th id = "status-header"> Status </th>
        <th> Assigned To </th>
        <th> Created </th>
    </tr>

    <?php foreach ($myissuesfinal as $issue):?>
        <tr>
        <td class='hashtag'><?php echo "#".$issue['id']; ?><a class="issuelink" href="jobdetails.php?issueid=<?php echo $issue['id'];?>"><?php echo " ".$issue['title']; ?></a></td>
        <td><?php echo $issue['type']; ?></td>
        <?php if($issue['status']=='OPEN'){ ?>
        <td><div class='openstatus'> <?php echo $issue['status']; ?></div></td>
        <?php }?>
        <?php if($issue['status']=='Closed'){ ?>
        <td><div class='closestatus'> <?php echo $issue['status']; ?></div></td>
        <?php } ?>
        <?php if($issue['status']=='In-Progress'){ ?>
        <td><div class='progstatus'> <?php echo $issue['status']; ?></div></td>
        <?php } ?>
        <td><?php echo  $_SESSION['firstname']." ".$_SESSION['lastname']; ?></td>
        <td><?php echo $issue['created']; ?></td>
        </tr>
        
    <?php endforeach; ?> 
     
</table>
<?php }else{
            echo "You don't have any currently tracked issues.";
        } ?>
