<?php

include("../Model/dbConnection.php");

session_start();

if(isset($_GET["delId"])){
     $id =  $_GET["delId"];
     $sql = $pdo->prepare("UPDATE hospital_location SET 
    del_flg = 1
     WHERE id=:id"
     );
    $sql->bindValue(":id", $id);
    $sql->execute();
     header("Location: ../View/hospitalLocation.php");
}

?>