<?php
include "../Model/dbConnection.php";

$rowLimit = 5;
$page = (isset($_GET["page"])) ? $_GET["page"] : 1;
$startPage = ($page - 1) * $rowLimit;

//pending list
$sql = $pdo->prepare("SELECT * FROM booking WHERE status=0 LIMIT  $startPage,$rowLimit");
$sql->execute();
$patientBookingList = $sql->fetchAll(PDO::FETCH_ASSOC);

//approved list
$sql = $pdo->prepare("SELECT * FROM booking WHERE status=1 AND history=0");
$sql->execute();
$approved = $sql->fetchAll(PDO::FETCH_ASSOC);

//reject List
$sql = $pdo->prepare("SELECT * FROM booking WHERE status=2");
$sql->execute();
$rejected = $sql->fetchAll(PDO::FETCH_ASSOC);

// Pagination
$sql = $pdo->prepare(
    "SELECT COUNT(id) As total FROM `booking` WHERE status=0
    "
);
$sql->execute();
$totalRecord = $sql->fetchAll(PDO::FETCH_ASSOC)[0]["total"];

$totalPages = ceil($totalRecord / $rowLimit);
