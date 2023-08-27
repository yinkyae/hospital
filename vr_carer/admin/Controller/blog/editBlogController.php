<?php
session_start();
include "../../Model/dbConnection.php";
if (isset($_GET["id"])) {
    $updateId = $_GET["id"];

    $sql = $pdo->prepare("SELECT * FROM blog WHERE id= :id ");
    $sql->bindValue(":id", $updateId);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($result);
    $_SESSION["blogInfo"] = $result;

    header("Location: ../../View/blogEdit.php");
}
