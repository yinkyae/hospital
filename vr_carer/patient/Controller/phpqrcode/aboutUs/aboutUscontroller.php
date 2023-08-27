<?php
include "../Model/dbConnection.php";
// get article info
$sql = $pdo->prepare(
    "SELECT * FROM `about_us` 
    "
);
$sql->execute();
$aboutInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

// get article info
$sql = $pdo->prepare(
    "SELECT * FROM `policy` 
    "
);
$sql->execute();
$policyInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

