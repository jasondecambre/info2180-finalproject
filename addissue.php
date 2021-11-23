<?php session_start(); 
require_once "db.php";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $title=filter_input(INPUT_GET,"title",FILTER_SANITIZE_STRING); 
    $description= filter_input(INPUT_GET,"description",FILTER_SANITIZE_STRING); 
    $assignto= filter_input(INPUT_GET,"assignedto",FILTER_SANITIZE_STRING);
    $type= filter_input(INPUT_GET,"type",FILTER_SANITIZE_STRING); 
    $priority= filter_input(INPUT_GET,"priority",FILTER_SANITIZE_STRING);
    $status="OPEN";
    $insert=true;
    $sessionid =$_SESSION['user_id'];
    if ($insert){
        $myids = $conn->query("SELECT id FROM users WHERE CONCAT(firstname,' ',lastname)='$assignto' ");
        $myidsfinals = $myids->fetch(PDO::FETCH_ASSOC);
        if(isset($myidsfinals)){
            $assignid=$myidsfinals['id'];
        }
        $stmt=$conn->prepare('INSERT INTO issues (title, description, priority, type, status, assigned_to, created_by, created, updated)
        VALUES ( :title, :description,:priority,:type,:status,:assignid,:createid , NOW(), NOW());');
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":priority", $priority);
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":status",$status);
        $stmt->bindParam(":createid", $sessionid);
        $stmt->bindParam(":assignid", $assignid);
        $stmt->execute();
        echo"Issue successfully inserted.";
    }
}catch(PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>