<?php
session_start();
include("../../Model/dbConnection.php");

if (isset($_POST["changeProfile"])) {
    // User changed name
    $changeName = $_POST["changeName"];
    $id = $_POST["id"];

    if ($_FILES["changePhoto"]["name"] == "") {
        $sql = $pdo->prepare(
            "UPDATE
            user_register SET 
            register_name=:name,
            update_date=:updatedDate WHERE id=:id"
        );
    } else {
        $file = $_FILES['changePhoto']['name'];
        $location = $_FILES['changePhoto']['tmp_name'];
        $extension = pathinfo($file)['extension'];
        $path = $id . "." . $extension;

        if (move_uploaded_file($location, "../../View/storages/userprofile/" . $id . "." . $extension)) {
            $sql = $pdo->prepare(
                "UPDATE
                user_register SET 
                register_name=:name,
                profile_image=:photo,
                update_date=:updatedDate WHERE id=:id"
            );
            $sql->bindValue(":photo", $path);
        } else {
            echo 'There was some error moving the file to upload directory.';
        }
    }
    $sql->bindValue(":id", $id);
    $sql->bindValue(":name", $changeName);
    $sql->bindValue(":updatedDate", date("Y/m/d"));
    $sql->execute();
    header("Location: ./updatedprofileController.php");
}
