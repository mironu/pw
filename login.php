<?php
include "db.php";

if(isset($_POST['email']) && isset($_POST['password']))
{
    if(strcmp($_POST['email'],'admin@gmail.com')==0 && strcmp($_POST['password'],"777")==0){
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['admin'] = 1;
        echo 1;
    }
    else{
    try{
        $sql = "SELECT * FROM tbl_login WHERE email = :v1 AND password = :v2";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':v1', $_POST['email']);
        $password=hash("sha256",$_POST['password']);
        $stmt->bindParam(':v2', $password);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        if($stmt->rowCount())
        {
            session_start();
            $_SESSION['email'] = $_POST['email'];
            echo 1;
        }
        else
        {
            echo "Wrong username or password";
        }

    }
    catch(PDOExcepton $e){
        echo $sql . "<br>" . $e->getMessage();
    }
}
}
else
{
    echo "error";
}

?>