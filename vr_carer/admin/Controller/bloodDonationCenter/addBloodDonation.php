<?php

include "../../Model/dbConnection.php";

if (isset($_POST["addCenter"])) {
    $center = $_POST["center"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    echo $contact;
    $sql = $pdo->prepare(
        "INSERT INTO blood_donation
        (
            center_name,
            center_address,
            center_contact,
            center_email,
            created_date
        ) 
        VALUES 
        (
            :name,
            :address,
            :contact,
            :email,
            :created_date
        )"
    );

    $sql->bindValue(":name", $center);
    $sql->bindValue(":address", $address);
    $sql->bindValue(":contact", $contact);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":created_date", date("Y/m/d"));

    $sql->execute();

    header("Location: ../../View/donation.php");
}
