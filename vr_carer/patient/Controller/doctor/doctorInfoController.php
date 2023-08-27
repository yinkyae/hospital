<?php
include "../Model/dbConnection.php";

// get doctor info
$sql = $pdo->prepare(
    "SELECT * FROM `doctor` WHERE del_flg=0
    "
);
$sql->execute();
$doctorInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

?>