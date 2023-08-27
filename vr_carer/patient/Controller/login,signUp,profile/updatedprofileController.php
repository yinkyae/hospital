<?php
session_start();
include("../../Model/dbConnection.php");

// Get Update UserInfo
$loginEmail =$_SESSION["email"];
 $sql = $pdo->prepare(
    "SELECT * FROM user_register WHERE email_address = :Email
    "
);
$sql->bindValue(":Email", $loginEmail);
$sql->execute();
$updatedInfo = $sql->fetchAll(PDO::FETCH_ASSOC);
$_SESSION["updatedInfo"] = $updatedInfo;

header("Location: ../../View/home1.php");
?>