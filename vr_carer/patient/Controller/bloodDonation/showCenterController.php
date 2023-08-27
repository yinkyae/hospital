<?php
include "../Model/dbConnection.php";
$sql = $pdo->prepare("SELECT * FROM blood_donation");
$sql->execute();
$centerList = $sql->fetchAll(PDO::FETCH_ASSOC);
