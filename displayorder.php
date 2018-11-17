<?php
session_start();
include 'db.php';
if(isset($_POST['check'])){
    try{
        $sql = "SELECT * FROM orders WHERE email = :v1";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':v1', $_SESSION['email']);
        $stmt->execute();
        if($stmt->rowCount()<1){
            echo 0;
        }
        //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $ords = $stmt->fetchAll(PDO::FETCH_OBJ);
        //$id = $ords['0']->id;
        $n = $stmt->rowCount();
    }
    catch(PDOExcepton $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    for($i=0;$i<$n;$i++){
    try{
        $id = $ords[$i]->id;
        $sql = "SELECT * FROM products WHERE id = :v1";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->bindParam(':v1', $id);
        $stmt->execute();
        if($stmt->rowCount()<1){
            echo 0;
        }
        //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $prods = $stmt->fetchAll(PDO::FETCH_OBJ);
        $ords[$i]->prod = $prods;
        //$res = json_encode(array_merge($ords,$prods));
        //echo $res;
    }
    catch(PDOExcepton $e){
        echo $sql . "<br>" . $e->getMessage();
    }
}
echo json_encode($ords);

}
else
    echo -1;





?>