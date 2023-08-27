<?php
include "../Model/dbConnection.php";

if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $sql = $pdo->prepare(
        "SELECT * FROM booking WHERE email = :useremail AND history= 0"
    );
    $sql->bindValue(":useremail", $email);
    $sql->execute();
    $status = $sql->fetchAll(PDO::FETCH_ASSOC);
    //print_r($status);

    // for ($i = 0; $i < count($status); $i++)
    //     echo $status[$i]["doctor_id"];

    // $sql = $pdo->prepare(
    //     "SELECT * FROM date WHERE doctor_id = :id"
    // );
    // $sql->bindValue(":id", $status[0]["doctor_id"]);
    // $sql->execute();
    // $time = $sql->fetchAll(PDO::FETCH_ASSOC);
    //print_r($time);
}
