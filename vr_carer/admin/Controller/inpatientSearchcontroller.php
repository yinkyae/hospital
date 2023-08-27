<?php
include "../Model/dbConnection.php";

if (isset($_POST["searchText"])) {
   $search = $_POST["searchText"];

    $sql = $pdo->prepare(
        "SELECT * FROM inpatient WHERE del_flg != 1 AND name LIKE :name");
    $sql->bindValue(":name","%".$search."%");
    $sql->execute();
    $inpatientList = $sql->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($inpatientList);
 }
?>

    




