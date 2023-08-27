<?php
include "./../Model/dbConnection.php";

// get doctor info
$sql = $pdo->prepare(
    "SELECT * FROM `medicine` WHERE del_flg != 1 
    "
);
$sql->execute();
$medicineInfo = $sql->fetchAll(PDO::FETCH_ASSOC);
?>