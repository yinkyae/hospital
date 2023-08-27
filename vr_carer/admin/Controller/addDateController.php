<?php
session_start();

include "../Model/dbConnection.php";
$sql = $pdo->prepare("SELECT * FROM date");

$sql->execute();
$dateInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["dateadd"])) {

    $doctor_id = $_SESSION["doctorInfo"][0]["id"];
    $date      = $_POST["date"];
    $startTime = $_POST["startTime"];
    $endTime   = $_POST["endTime"];

    $sql = $pdo->prepare(
        "INSERT INTO date (
        doctor_id,
        date,
        startTime,
        endTime,
        create_date
    ) 
    VALUES 
    (
        :doctor_id,
        :date,
        :startTime,
        :endTime,
        :createDate
    );"

    );
    $sql->bindValue(":doctor_id", $doctor_id);
    $sql->bindValue(":date", $date);
    $sql->bindValue(":startTime", $startTime);
    $sql->bindValue(":endTime", $endTime);
    $sql->bindValue(":createDate", date("Y/m/d"));

    $sql->execute();

    header("Location: ../View/date.php");
}
