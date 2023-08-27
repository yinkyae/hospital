<?php
session_start();
include "../Model/dbConnection.php";

// Get doctor info for Update Form
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $pdo->prepare(
        "SELECT * FROM `doctor` WHERE id=:id 
        "
    );
    $sql->bindValue(":id", $id);
    $sql->execute();
    $doctorInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION["doctorInfo"] = $doctorInfo;
    header("Location: ../View/doctorEdit.php");
}
// Update Doctor Information
if (isset($_POST["updateDoctorInfo"])) {
    $id = $_POST["updateDoctorId"];
    $name = $_POST["updateDoctorName"];
    $age = $_POST["updateDoctorAge"];
    $gender = $_POST["updateDoctorGender"];
    $speciality = $_POST["updateDoctorSpeciality"];
    $phone = $_POST["updateDoctorPhone"];

    if ($_FILES["updateDoctorPhoto"]["name"] == "") {
        $sql = $pdo->prepare(
            "UPDATE
            doctor SET 
            doctor_name=:name,
            speciality = :speciality,
            age=:age,
            contact=:contact,
            gender=:gender,
            update_date=:updatedDate WHERE id=:id"
        );
        $sql->bindValue(":id", $id);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":speciality", $speciality);
        $sql->bindValue(":age", $age);
        $sql->bindValue(":contact", $phone);
        $sql->bindValue(":gender", $gender);
        $sql->bindValue(":updatedDate", date("Y/m/d"));
        $sql->execute();
        header("Location: ../View/doctor.php");

    } else {
        $file = $_FILES['updateDoctorPhoto']['name'];
        $location = $_FILES['updateDoctorPhoto']['tmp_name'];
        $extension = pathinfo($file)['extension'];
        $path = $id . "." . $extension;

        if (move_uploaded_file($location, "../View/storages/doctor/" . $id . "." . $extension)) {
            $sql = $pdo->prepare(
                "UPDATE
            doctor SET 
            doctor_name=:name,
            speciality = :speciality,
            age=:age,
            contact=:contact,
            gender=:gender,
            profile_photo=:photo,
            update_date=:updatedDate WHERE id=:id"
            );
            $sql->bindValue(":photo", $path);
            $sql->bindValue(":id", $id);
            $sql->bindValue(":name", $name);
            $sql->bindValue(":speciality", $speciality);
            $sql->bindValue(":age", $age);
            $sql->bindValue(":contact", $phone);
            $sql->bindValue(":gender", $gender);
            $sql->bindValue(":updatedDate", date("Y/m/d"));
            $sql->execute();
            header("Location: ../View/doctor.php");
        } else {
            echo 'There was some error moving the file to upload directory.';
        }
    }

}


// Remove Doctor
if (isset($_GET["delId"])) {
    $delId = $_GET["delId"];

    $sql = $pdo->prepare("UPDATE doctor SET 
    del_flg = 1
     WHERE id=:id
     ");
    $sql->bindValue(":id", $delId);

    $sql->execute();
    header("Location: ../View/doctor.php");
}
