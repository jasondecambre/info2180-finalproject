<?php 
session_start();
    require_once "db.php";
    // setting up DB connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $openissues = $conn->query("SELECT * FROM issues WHERE status ='OPEN'");
    $openissuesfinal = $openissues->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($openissuesfinal)){
?>

<table id="dashboardtable">
    <tr>
        <th> Title </th>
        <th> Type </th>
        <th id = "status-header"> Status </th>
        <th> Assigned To </th>
        <th> Created </th>
    </tr>

    <?php foreach ($openissuesfinal as $issue):
         $assign=$issue['assigned_to'];
         $findname=$conn->query("SELECT firstname,lastname FROM users WHERE id='$assign'");
         $name= $findname->fetch(PDO::FETCH_ASSOC); ?>
        <tr>
        <td class='hashtag'><?php echo "#".$issue['id']; ?><a class="issuelink" href="jobdetails.php?issueid=<?php echo $issue['id'];?>"><?php echo " ".$issue['title']; ?></a></td>
            <td><?php echo $issue['type']; ?></td>
            <td><div class='openstatus'> <?php echo $issue['status']; ?></div></td>            
            <td><?php echo $name['firstname']." ".$name['lastname']; ?></td>
            <td><?php echo $issue['created']; ?></td>
        </tr>
        
    <?php endforeach; ?>                 
</table>
<?php }else{
            echo "There are no open issues being tracked now.";
        }