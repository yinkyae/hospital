<?php
include "../../Model/dbConnection.php";
include "../common/commonFunction.php";
if (isset($_GET["id"])) {
    $qrcode = getQrcode();
    echo $qrcode;
    $id = $_GET["id"];

    $sql = $pdo->prepare(
        "UPDATE booking SET
        qrcode=:qrcode,
        status=:status,
        update_date=:update_date
        where id=:id
        "
    );
    $sql->bindValue(":qrcode", $qrcode);
    $sql->bindValue(":status", 1);
    $sql->bindValue(":update_date", date("Y/m/d"));
    $sql->bindValue(":id", $id);
    $sql->execute();
    header("Location: ../../View/booking.php");
}
