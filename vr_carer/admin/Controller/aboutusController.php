<?php
session_start();
include("../Model/dbConnection.php");

// Add About Us Info
if (isset($_POST["update"])) {
    $text1 = $_POST["text1"];
    $header = $_POST["header"];
    $text2 = $_POST["text2"];


    if ($_FILES["image2"]["name"] == "") {
        $sql = $pdo->prepare(
        "UPDATE
            about_us SET 
            text1=:text1,
            header=:header,
            text2=:text2,
            update_date=:updatedDate "
        );
    } else {
        $file = $_FILES['image2']['name'];
        $location = $_FILES['image2']['tmp_name'];
        $extension = pathinfo($file)['extension'];
        $path = $header . "." . $extension;

        if (move_uploaded_file($location, "../View/storages/about/" . $header . "." . $extension)) {
            $sql = $pdo->prepare(
                "UPDATE
            about_us SET 
             text1=:text1,
             header=:header,
             text2=:text2,
             image2=:image2,
             update_date=:updatedDate "
            );
            $sql->bindValue(":image2", $path);
        } else {
            echo 'There was some error moving the file to upload directory.';
        }
    
    }
    $sql->bindValue(":text1", $text1);
    $sql->bindValue(":header", $header);
    $sql->bindValue(":text2", $text2);
    $sql->bindValue(":updatedDate", date("Y/m/d"));
    $sql->execute();
    header("Location: ../View/about.php");
}

// Add Privacy Policy Info
if (isset($_POST["update2"])) {
    $text3 = $_POST["policy_text"];
    $sql = $pdo->prepare(
        "UPDATE
        policy SET 
        policy_text=:policy_text
        "
    );
    $sql->bindValue(":policy_text", $text3);


    $sql->execute();
    header("Location: ../View/about.php");
}