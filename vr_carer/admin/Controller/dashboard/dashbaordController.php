<?php
include "../Model/dbConnection.php";
$sql = $pdo->prepare("SELECT COUNT(id) FROM `inpatient` WHERE del_flg = 0 ");
$sql->execute();
$inHospital = $sql->fetchAll(PDO::FETCH_ASSOC);


$sql = $pdo->prepare("SELECT COUNT(id) FROM `doctor` WHERE del_flg = 0");
$sql->execute();
$countDoctor = $sql->fetchAll(PDO::FETCH_ASSOC);


$sql = $pdo->prepare("SELECT COUNT(id) FROM `booking`");
$sql->execute();
$countBooking = $sql->fetchAll(PDO::FETCH_ASSOC);
