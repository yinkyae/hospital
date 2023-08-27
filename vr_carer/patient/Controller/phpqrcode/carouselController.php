<?php
include "../Model/dbConnection.php";
// get doctor info
$sql = $pdo->prepare(
    "SELECT * FROM `carousel`
    "
);
$sql->execute();
$carouselInfo = $sql->fetchAll(PDO::FETCH_ASSOC);
?>