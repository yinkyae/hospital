<?php
session_start();
include "../../Model/dbConnection.php";
if (isset($_GET["id"])) {
    //echo $_GET["id"];
    $updateId = $_GET["id"];
    $sql = $pdo->prepare("SELECT * FROM blood_donation WHERE id= :id ");
    $sql->bindValue(":id", $updateId);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($result);
    $_SESSION["centerInfo"] = $result;
    header("Location: ../../View/editBloodCenter.php");
}
