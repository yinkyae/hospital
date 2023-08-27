<?php
include "../../Model/dbConnection.php";
if (isset($_POST["updateCenter"])) {
    $center = $_POST["center"];
    $id = $_POST["id"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $sql = $pdo->prepare(
        "UPDATE blood_donation SET
        center_name=:name,
        center_address=:address,
        center_contact=:contact,
        center_email=:email,
        updated_date=:updated_date
        where id=:id
        "
    );
    $sql->bindValue(":name", $center);
    $sql->bindValue(":address", $address);
    $sql->bindValue(":contact", $contact);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":updated_date", date("Y/m/d"));
    $sql->bindValue(":id", $id);
    $sql->execute();
    header("Location: ../../View/donation.php");
}
