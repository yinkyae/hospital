<?php
include "../Model/dbConnection.php";

$rowLimit = 3;
$page = (isset($_GET["page"])) ? $_GET["page"] : 1 ;
$startPage = ($page-1)*$rowLimit;


//for admin user name 
$sql = $pdo->prepare("SELECT * FROM blog LIMIT  $startPage,$rowLimit ");

$sql->execute();
$blogList = $sql->fetchAll(PDO::FETCH_ASSOC);

// Pagination
$sql = $pdo->prepare(
    "SELECT COUNT(id) As total FROM `blog` 
    "
);
$sql->execute();
$totalRecord = $sql->fetchAll(PDO::FETCH_ASSOC) [0]["total"];

$totalPages = ceil($totalRecord/$rowLimit);
