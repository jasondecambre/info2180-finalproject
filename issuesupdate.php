<?php require_once "db.php";
try{
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $id= filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
    $update= filter_input(INPUT_GET,"update",FILTER_SANITIZE_STRING);
    $issue = $conn->prepare("UPDATE issues SET status=:update, updated=NOW() WHERE id =:id");
    $issue->bindParam(":update", $update);
    $issue->bindParam(":id", $id);
    $issue->execute();
    header("Location:home.php");
} catch(PDOException $pdoe) {
    die("Could not connect to the database $dbname :" . $pdoe->getMessage());
}