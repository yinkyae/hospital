<?php
include("../../Model/dbConnection.php");
if(isset($_POST["searchText"])){
    $search = $_POST["searchText"];
    
    $sql = $pdo->prepare("SELECT * FROM hospital_location WHERE del_flg != 1 AND  hospital_name LIKE :search");
    $sql->bindValue(":search","%".$search."%");
    $sql->execute();
    $hospitalName = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($hospitalName);

}
?>