<?php

include "../Model/dbConnection.php";
// Add Medicine
if (isset($_POST["addMedicine"])) {

    $name = $_POST['name'];
    $description = $_POST["description"];

    $file = $_FILES['medicineImg']['name'];
    $location = $_FILES['medicineImg']['tmp_name'];
    $extension = pathinfo($file)['extension'];
    $path = $name . "." . $extension;

    if (move_uploaded_file($location, "../View/storages/medicine/" . $name . "." . $extension)) {
        $sql = $pdo->prepare(
            "INSERT INTO medicine
    (   
        medicine_name,
        description,
        medicine_image,
        create_date
        
    )
    VALUES
    (
        :name,
        :description,
        :image,
        :createdDate
    )
    "
        );
    }

    $sql->bindValue(":name", $name);
    $sql->bindValue(":description", $description);
    $sql->bindValue(":image", $path );
    $sql->bindValue(":createdDate", date("Y/m/d"));

    $sql->execute();
    header("Location: ../View/medicineAdd.php");
} else {
    echo "<script>
    alert ('ERROR');
    </script>";
    // header("Location: ../View/medicineAdd.php");
};


// Remove Doctor
if (isset($_GET["delId"])) {
    $delId = $_GET["delId"];

    $sql = $pdo->prepare("UPDATE medicine SET 
    del_flg = 1
     WHERE id=:id
     ");
    $sql->bindValue(":id", $delId);

    $sql->execute();
    header("Location: ../View/medicineAdd.php");
}
