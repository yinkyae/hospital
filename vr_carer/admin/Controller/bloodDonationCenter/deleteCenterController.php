<?php
include "../../Model/dbConnection.php";
if (isset($_GET["id"])) {
    $deleId = $_GET["id"];
    //for admin user name 
    $sql = $pdo->prepare(
        "DELETE FROM `blood_donation` WHERE id=:id"
    );
    $sql->bindValue(":id", $deleId);
    $sql->execute();
    header("Location: ../../View/donation.php");
}
