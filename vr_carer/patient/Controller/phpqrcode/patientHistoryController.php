<?php
include("../Model/dbConnection.php");
$userEmail = $_SESSION["email"] ;
$sql = $pdo->prepare(
    "SELECT * FROM patient_history WHERE email = :Email ;
    "
);

$sql->bindValue(":Email", $userEmail);
$sql->execute();
$history = $sql->fetchAll(PDO::FETCH_ASSOC);

?>