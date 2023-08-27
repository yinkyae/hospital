<?php
include "../Model/dbConnection.php";

// get doctor info
$sql = $pdo->prepare(
    "SELECT * FROM `date` WHERE del_flg=0
    "
);
$sql->execute();
$doctorDressingTime = $sql->fetchAll(PDO::FETCH_ASSOC);
?>