<?php
include("../../Model/dbConnection.php");
if(isset($_POST["searchText"])){
    $search = $_POST["searchText"];
    
    $sql = $pdo->prepare("SELECT * FROM doctor WHERE del_flg != 1 AND doctor_name LIKE :search");
    $sql->bindValue(":search","%".$search."%");
    $sql->execute();
    $doctorList = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($doctorList);

}
?>