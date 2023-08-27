<?php

include "../../Model/dbConnection.php";
if (isset($_POST['addDieses'])) {
    $header = $_POST['header'];
    $description = $_POST['description'];
    $file = $_FILES["uploadFile"]['name'];
    $location = $_FILES['uploadFile']['tmp_name'];
    $extension = pathinfo($file)['extension'];
    $path = $header . "." . $extension;
    if (move_uploaded_file($location, "../../View/storages/blog/" . $header . "." . $extension)) {
        $sql = $pdo->prepare("INSERT INTO blog(
            image,
            header,
            description,
            created_date
        )
        VALUES(
            :image,
            :header,
            :description,
            :created_date
        )
        ");
        $sql->bindValue(":image", $path);
        $sql->bindValue(":header", $header);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":created_date", date("Y/m/d"));
        $sql->execute();
        header("Location: ../../View/blog.php");
    } else {
        echo 'There was some error moving to upload directory';
    }
}
