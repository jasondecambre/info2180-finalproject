<?php session_start();
    require_once 'db.php';
        try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $fname= filter_input(INPUT_POST,"firstname",FILTER_SANITIZE_STRING); 
        $lname= filter_input(INPUT_POST,"lastname",FILTER_SANITIZE_STRING); 
        $pswrd= filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);
        $email= filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL); 
        $email= filter_var($email,FILTER_VALIDATE_EMAIL);
        $insert=true;
        $inputs=array($fname,$lname,$pswrd,$email);
        foreach ($inputs as $i):
        //     if(!preg_match("/^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\w\W]{8,}$/",$i) or $i==$pswrd){
        //         echo "<br>not match";
        //         $insert=false;
        //     }
            if (empty($i)){
                echo "empty input";
                $insert=false; 
            }
        endforeach;

        $hashpassword=password_hash($pswrd,PASSWORD_DEFAULT);
        if ($insert){
            $stmt=$conn->prepare('INSERT INTO users(firstname,lastname,password,email,date_joined)
            VALUES (:fname,:lname,:hashpassword,:email,NOW());');
           
            $stmt->bindParam(":fname",$fname, PDO::PARAM_STR);
            $stmt->bindParam(":lname", $lname, PDO::PARAM_STR);
            $stmt->bindParam(":hashpassword", $hashpassword, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();

            echo"<br> User successfully inserted";
        }

    } catch(PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

?>