<?php
include "../Model/dbConnection.php";

// get doctor info
$sql = $pdo->prepare(
    "SELECT  COUNT(id) AS total_user,date FROM `booking` GROUP BY  date
    "
);
$sql->execute();
$bookingInfo = $sql->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($bookingInfo);