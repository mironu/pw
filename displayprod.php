<?php
include 'db.php';

if(isset($_POST['check'])){
    try{
        $sql = "SELECT * FROM allproducts ORDER BY id";
        $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(); 
        $prods = $stmt->fetchAll(PDO::FETCH_OBJ);
        $n=$stmt->rowCount();
        for($i=0; $i<$n; $i++){
            $prods[$i]->img = base64_encode($prods[$i]->img);
        }
        echo json_encode($prods);
    }
    catch(PDOExcepton $e){
        echo $sql . "<br>" . $e->getMessage();
    }
}
    else{
        echo -1;
    }




?>