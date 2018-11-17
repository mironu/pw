<?php 
include "db.php";

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['radio'])
     && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['telephone']) && isset($_POST['address']))
{
        $sql = "SELECT * FROM tbl_login WHERE email = :v1";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':v1', $_POST['email']);
        $stmt->execute();
        if($stmt->rowCount())
        {
            echo 0;
        }
        else{
    try{
        $sql = "INSERT INTO tbl_login (firstname, lastname, email, address, telephone, gender, password) VALUES (:v1, :v2, :v3, :v4, :v5, :v6, :v7)";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':v1', $_POST['fname']);
        $stmt->bindParam(':v2', $_POST['lname']);
        $stmt->bindParam(':v3', $_POST['email']);
        $stmt->bindParam(':v4', $_POST['address']);
        $stmt->bindParam(':v5', $_POST['telephone']);
        $stmt->bindParam(':v6', $_POST['radio']);
        $password=hash("sha256",$_POST['password']);
        $stmt->bindParam(':v7', $password);

        if($stmt->execute())
            echo 1;
        else
            echo "Error";
    }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
}
}
?>