<?php
include 'db.php';

try{
    $id = $_POST['pid'];
    $sql = "DELETE FROM allproducts WHERE id=$id";
    $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->execute();
    if($stmt->rowCount())
        echo 1;
    else
        echo "Error";
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}




?>