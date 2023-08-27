<?php
include "../Model/dbConnection.php";

if (isset($_POST["inpatient_update_btn"])) {

    $date     = $_POST["date"];
    $name     = $_POST["name"];
    $age      = $_POST["age"];
    $disease  = $_POST["disease"]; 
    $status   = $_POST["status"];
    $room     = $_POST["room"];
    $address  = $_POST["address"];
    $id       = $_POST["id"];
       
    $sql = $pdo->prepare("UPDATE inpatient SET 
    hospitalized_date = :date, 
    name = :name, 
    age=:age, 
    disease =:disease,
    address =:address,
    status =:status,
    room=:room,
    update_date = :updateDate
    WHERE id=:id");

     $sql->bindValue(":date", $date);
    $sql->bindValue(":name", $name);
    $sql->bindValue(":age", $age);
    $sql->bindValue(":disease", $disease);  
    $sql->bindValue(":status", $status);
    $sql->bindValue(":room", $room);
    $sql->bindValue(":address", $address);
    $sql->bindValue(":updateDate", date("Y/m/d"));
    $sql->bindValue(":id", $id);

    $sql->execute();
    
    header("Location: ../View/inpatientList.php");
};



?>