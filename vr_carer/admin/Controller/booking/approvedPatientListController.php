<?php
include "../Model/dbConnection.php";

$rowLimit = 10;
$page = (isset($_GET["page"])) ? $_GET["page"] : 1 ;
$startPage = ($page-1)*$rowLimit;

//approved list
$sql = $pdo->prepare("SELECT * FROM booking WHERE status=1 AND history = 0 AND date =:today ");
$sql->bindValue(":today",date("Y-m-d"));
$sql->execute();
$approved = $sql->fetchAll(PDO::FETCH_ASSOC);

// Get history info
$sql = $pdo->prepare(
    "SELECT * FROM patient_history LIMIT  $startPage,$rowLimit" 
);
$sql->execute();
$historyList = $sql->fetchAll(PDO::FETCH_ASSOC);

// Pagination
$sql = $pdo->prepare(
    "SELECT COUNT(id) As total FROM `patient_history` 
    "
);
$sql->execute();
$totalRecord = $sql->fetchAll(PDO::FETCH_ASSOC) [0]["total"];

$totalPages = ceil($totalRecord/$rowLimit);


