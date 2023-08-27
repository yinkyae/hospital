<?php
include "../Model/dbConnection.php";
$sql = $pdo->prepare("SELECT * FROM blog");
$sql->execute();
$blogList = $sql->fetchAll(PDO::FETCH_ASSOC);
