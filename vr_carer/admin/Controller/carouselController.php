<?php
include "../Model/dbConnection.php";
if (isset($_POST["carouselUpdate"])) {
    if ($_FILES["carousel_1"]["name"] != "") {

        $file = $_FILES['carousel_1']['name'];
        $location = $_FILES['carousel_1']['tmp_name'];
        $extension = pathinfo($file)['extension'];
        $path = "carousleOne" . "." . $extension;

        if (move_uploaded_file($location, "../View/storages/image/" . "carousleOne"   . "." . $extension)) {
        }
        $sql = $pdo->prepare(
            "UPDATE carousel SET 
            caroussel_image=:image,
            update_date=:updatedDate WHERE id=1
            "
        );
    }
    if ($_FILES["carousel_2"]["name"] != "") {
        $file = $_FILES['carousel_2']['name'];
        $location = $_FILES['carousel_2']['tmp_name'];
        $extension = pathinfo($file)['extension'];
        $path = "carousleTwo" . "." . $extension;

        if (move_uploaded_file($location, "../View/storages/image/" . "carousleTwo"   . "." . $extension)) {
        }
        $sql = $pdo->prepare(
            "UPDATE carousel SET 
            caroussel_image_2=:image,
            update_date=:updatedDate WHERE id=1"
        );
    }
    if ($_FILES["carousel_3"]["name"] != "") {
        $file = $_FILES['carousel_3']['name'];
        $location = $_FILES['carousel_3']['tmp_name'];
        $extension = pathinfo($file)['extension'];
        $path = "carousleThree" . "." . $extension;

        if (move_uploaded_file($location, "../View/storages/image/" . "carousleThree"   . "." . $extension)) {
        }
        $sql = $pdo->prepare(
            "UPDATE carousel SET 
            caroussel_image_3=:image,
            update_date=:updatedDate WHERE id=1"
        );
    }
    if ($_FILES["carousel_4"]["name"] != "") {
        $file = $_FILES['carousel_4']['name'];
        $location = $_FILES['carousel_4']['tmp_name'];
        $extension = pathinfo($file)['extension'];
        $path = "carousleFour" . "." . $extension;

        if (move_uploaded_file($location, "../View/storages/image/" . "carousleFour"   . "." . $extension)) {
        }
        $sql = $pdo->prepare(
            "UPDATE carousel SET 
            caroussel_image_4=:image,
            update_date=:updatedDate WHERE id=1"
        );
    }
    $sql->bindValue(":image", $path);
    $sql->bindValue(":updatedDate", date("Y/m/d"));
    $sql->execute();
    header("Location: ../View/carousel.php");
}
