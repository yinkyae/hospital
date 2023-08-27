<?php
include "../../Model/dbConnection.php";
session_start();

// Get User Info
if(isset($_SESSION["email"])){
    $loginEmail =  $_SESSION["email"];
    $sql = $pdo->prepare(
        "SELECT * FROM user_register WHERE email_address = :Email
        "
    );
    $sql->bindValue(":Email", $loginEmail);
    $sql->execute();
    $user_info = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["userInfo"] = $user_info;
}
// Get doctor info for Update Form
if (isset($_GET["doctorId"])) {
    $id = $_GET["doctorId"];
    $sql = $pdo->prepare(
        "SELECT * FROM `doctor` WHERE id=:id
        "
    );
    $sql->bindValue(":id", $id);
    $sql->execute();
    $doctorInfo = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["appointmentDoctorInfo"] = $doctorInfo;


    $sql = $pdo->prepare(
        "SELECT * FROM `date` WHERE doctor_id=:id AND del_flg =0
        "
    );
    $sql->bindValue(":id", $id);
    $sql->execute();
    $selectedDoctorDuty = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["selectedDoctorDuty"] = $selectedDoctorDuty;

    header("Location: ../../View/appointment.php");
}

