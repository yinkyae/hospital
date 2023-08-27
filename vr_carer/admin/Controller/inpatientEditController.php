<?php

include("../Model/dbConnection.php");

session_start();

//get info from database//

if (isset($_GET["id"])) {
    // echo $_GET["id"];

    $inpatientId = $_GET["id"];

    $sql = $pdo->prepare("SELECT * FROM inpatient WHERE id=:id");
    $sql->bindValue(":id", $inpatientId);
    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    // echo "<pre>";
    // print_r($result);

    $_SESSION["inpatientInfo"] = $result;

    header("Location: ../View/editInpatient.php");
}

if(isset($_GET["delId"])){

     $id =  $_GET["delId"];


     $sql = $pdo->prepare("UPDATE inpatient SET 
    del_flg = 1
     WHERE id=:id"
     );
    $sql->bindValue(":id", $id);

    $sql->execute();
    
    // $delId = $_GET["delId"];

    //  $sql = $pdo->prepare(
    //     "DELETE FROM `inpatient` WHERE id=:id");
    //  $sql->bindValue(":id",$delId);
    // $sql->execute();

    header("Location: ../View/inpatientList.php");
}
