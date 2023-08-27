<?php
include "../../Model/dbConnection.php";
if (isset($_GET["id"])) {
    $delete = $_GET["id"];
    $sql = $pdo->prepare(
        "DELETE FROM `booking` WHERE id=:id"
    );
    $sql->bindValue(":id", $delete);
    $sql->execute();
    header("Location: ../../View/booking.php");
}
