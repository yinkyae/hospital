<?php
include "../Model/dbConnection.php";
// get article info
$sql = $pdo->prepare(
    "SELECT * FROM `article` WHERE del_flg = 0
    "
);
$sql->execute();
$homeArticleInfo = $sql->fetchAll(PDO::FETCH_ASSOC);
?>