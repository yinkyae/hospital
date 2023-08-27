<?php
include "../../Model/dbConnection.php";
if (isset($_POST["updateBlog"])) {
    $header = $_POST["header"];
    $id = $_POST["id"];
    $description = $_POST["description"];


    //get imag info
    if ($_FILES["uploadFile"]["name"] == "") {
        //file not exist
        echo "File Not Exist";
        $sql = $pdo->prepare(
            "UPDATE blog SET
            header =:header,
            description=:description,
            updated_date=:updated_date 
            where id=:id
        "
        );
        $sql->bindValue(":header", $header);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":updated_date", date("Y/m/d"));
        $sql->bindValue(":id", $id);
        $sql->execute();
        header("Location: ../../View/blog.php");
    } else {
        echo "File Exist";
        $file = $_FILES["uploadFile"]['name'];
        $location = $_FILES['uploadFile']['tmp_name'];
        $extension = pathinfo($file)['extension'];
        $path = $header . "." . $extension;

        if (move_uploaded_file($location, "../../View/storages/blog/" . $header . "." . $extension)) {
            $sql = $pdo->prepare(
                "UPDATE blog SET
                image=:profile,
                header =:header,
                description=:description,
                updated_date=:updated_date
                where id=:id
            "
            );
            $sql->bindValue(":profile", $path);
            $sql->bindValue(":header", $header);
            $sql->bindValue(":description", $description);
            $sql->bindValue(":updated_date", date("Y/m/d"));
            $sql->bindValue(":id", $id);
            $sql->execute();
            header("Location: ../../View/blog.php");
        } else {
            echo 'Ther was some error moving to upload directory';
        }
    }
}
