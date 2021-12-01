<?php session_start(); 
require_once "db.php";

try{
    // preparing DB connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // accepting, filtiering and sanitizing input
    $title=filter_input(INPUT_GET,"title",FILTER_SANITIZE_STRING); 
    $desc= filter_input(INPUT_GET,"description",FILTER_SANITIZE_STRING); 
    $assignto= filter_input(INPUT_GET,"assigned",FILTER_SANITIZE_STRING);
    $type= filter_input(INPUT_GET,"type",FILTER_SANITIZE_STRING); 
    $priority= filter_input(INPUT_GET,"priority",FILTER_SANITIZE_STRING);

    $status="OPEN";
    $insert=true;
    $sessionid =$_SESSION['user_id'];
    if ($insert){
        $findids = $conn->query("SELECT id FROM users WHERE CONCAT(firstname,' ',lastname)='$assignto'");
        $ids = $findids->fetch(PDO::FETCH_ASSOC);
        
        if(isset($ids)){
            $assignid=$ids['id'];
        }
        $stmt=$conn->prepare('INSERT INTO issues (title, description, priority, type, status, assigned_to, created_by, created, updated)
        VALUES ( :title, :desc,:priority,:type,:status,:assignid,:createid , NOW(), NOW());');
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":desc", $desc);
        $stmt->bindParam(":priority", $priority);
        $stmt->bindParam(":type", $type);
        $stmt->bindParam(":status",$status);
        $stmt->bindParam(":createid", $sessionid);
        $stmt->bindParam(":assignid", $assignid);
        $stmt->execute();
        header("Location:home.php" );
    }
}catch(PDOException $pdoe) {
    die("Could not connect to the database $dbname :" . $pdoe->getMessage());
}
?>