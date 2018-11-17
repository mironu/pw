<?php
session_start();
include 'db.php';
if(!isset($_SESSION['email'])){
    echo -1;
    return;
}

$r=0.0;
if(isset($_POST["prod"]) && isset($_POST['date']) && isset($_SESSION['email'])){
    $a = json_decode($_POST["prod"]);
    try{
        $sql = "SELECT * FROM orders";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute();
        $id = $stmt->rowCount();
    }
    catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    foreach($a as $item){
        try{
            $sql = "INSERT INTO products (id, name, price, src) VALUES (:v1, :v2, :v3, :v4)";
            $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->bindParam(':v1', $id);
            $stmt->bindParam(':v2', $item->title);
            $stmt->bindParam(':v3', $item->price);
            $stmt->bindParam(':v4', $item->src);
            $stmt->execute();
        }
        catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
        $r += $item->price;
    }
    $r+=25.0;
    $date = $_POST['date'];
    $email = $_SESSION['email'];

try{
    $sql = "INSERT INTO orders (id, email, date, total) VALUES (:v1, :v2, :v3, :v4)";
    $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stmt->bindParam(':v1', $id);
    $stmt->bindParam(':v2', $email);
    $stmt->bindParam(':v3', $date);
    $stmt->bindParam(':v4', $r);
    if($stmt->execute())
        echo 1;
    else
        echo 0;
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
}

?>