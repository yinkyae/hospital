<?php
include("../Model/dbConnection.php");
if(isset($_POST["searchText"])){
    $search = $_POST["searchText"];
    
    $sql = $pdo->prepare("SELECT date.id,doctor_name,age,speciality,date,startTime,endTime
    FROM doctor
    LEFT JOIN date
    ON doctor.id = date.doctor_id WHERE date.startTime != 'NULL' AND date.del_flg=0 AND date.date LIKE :search");
    $sql->bindValue(":search","%".$search."%");
    $sql->execute();
    $doctorByDay = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($doctorByDay);

}
