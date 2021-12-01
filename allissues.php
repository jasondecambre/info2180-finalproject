<?php session_start();
    require_once "db.php";

    // setting up DB connection and getting issues data
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $findallissues = $conn->query("SELECT * FROM issues");
    $allissuesfinal = $findallissues->fetchAll(PDO::FETCH_ASSOC);

    if(!empty($allissuesfinal)){ // in case there are no issues
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
