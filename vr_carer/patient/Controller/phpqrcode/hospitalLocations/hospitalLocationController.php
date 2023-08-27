<?php
include "../Model/dbConnection.php";

$sql = $pdo->prepare(
    "SELECT * FROM `hospital_location` WHERE del_flg != 1 
    "
);
$sql->execute();
$hospitalInfo = $sql->fetchAll(PDO::FETCH_ASSOC);




