<?php
include 'db.php';

try{
    $sql = "INSERT INTO allproducts (id, name, price, img) VALUES (:v1, :v2, :v3, :v4)";
    $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->bindParam(':v1', $_POST['id']);
    $stmt->bindParam(':v2', $_POST['pname']);
    $stmt->bindParam(':v3', $_POST['price']);
    $image = (file_get_contents($_FILES['image']['tmp_name']));
    $stmt->bindParam(':v4', $image);
    if($stmt->execute())
        echo 1;
    else
        echo "Error";
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}




?>