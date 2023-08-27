<?php
include "../Model/dbConnection.php";

$rowLimit = 2;
$page = (isset($_GET["page"])) ? $_GET["page"] : 1 ;
$startPage = ($page-1)*$rowLimit;

// get article info
$sql = $pdo->prepare(
    "SELECT * FROM `article` WHERE del_flg != 1 LIMIT  $startPage,$rowLimit
    "
);
$sql->execute();
$homeArticleInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

// Pagination
$sql = $pdo->prepare(
    "SELECT COUNT(id) As total FROM `article`  WHERE del_flg != 1
    "
);
$sql->execute();
$totalRecord = $sql->fetchAll(PDO::FETCH_ASSOC) [0]["total"];

$totalPages = ceil($totalRecord/$rowLimit);
