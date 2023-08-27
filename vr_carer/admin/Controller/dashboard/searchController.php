<?php
if (isset($view)) {
    include "../Model/dbConnection.php";
} else {
    include "../../Model/dbConnection.php"; // call ajax
}

if (isset($_POST["searchText"])) {
    $search = $_POST["searchText"];

    $sql = $pdo->prepare("SELECT *
    FROM patient_history WHERE booking_date  LIKE :search");
    $sql->bindValue(":search", $search);
    $sql->execute();
    $todaypatient = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($todaypatient);
}
