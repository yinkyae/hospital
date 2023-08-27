<?php
session_start();
include("../../Model/dbConnection.php");

$loginEmail =$_SESSION["email"];
 $sql = $pdo->prepare(
    "SELECT * FROM user_register WHERE email_address = :Email
    "
);
$sql->bindValue(":Email", $loginEmail);
$sql->execute();
$userInfo = $sql->fetchAll(PDO::FETCH_ASSOC);
$_SESSION["userInfo"] = $userInfo;

header("Location: ../../View/profile.php");
