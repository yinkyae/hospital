<?php
include("../Model/dbConnection.php");


$rowLimit = 3;
$page = (isset($_GET["page"])) ? $_GET["page"] : 1 ;
$startPage = ($page-1)*$rowLimit;


// Get Hospital Info
$sql = $pdo->prepare(
    "SELECT * FROM `hospital_location` WHERE del_flg != 1  LIMIT  $startPage,$rowLimit 
    "
);
$sql->execute();
$hospitalInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

// Pagination
$sql = $pdo->prepare(
    "SELECT COUNT(id) As total FROM `hospital_location`  WHERE del_flg != 1 
    "
);
$sql->execute();
$totalRecord = $sql->fetchAll(PDO::FETCH_ASSOC) [0]["total"];

$totalPages = ceil($totalRecord/$rowLimit);

// Add Hospital Info
if(isset($_POST["hospitalInfo"])){
    $hospitalName = $_POST["hospitalName"];
    $hospitalAddress  = $_POST["hospitalAddress"];
    $hospitalPhone  = $_POST["hospitalPhone"];
    $hospitalEmail  = $_POST["hospitalEmail"];
    $hospitalMap  = $_POST["hospitalMap"];

    $sql = $pdo->prepare(
        "INSERT INTO 
        hospital_location (
        hospital_name,
        address,
        email,
        contact,
        google_map_image,
        create_date) 
        VALUES 
        (
        :name,
        :address,
        :email,
        :contact,
        :map,
        :createdDate); 
        "
    );
    $sql->bindValue(":name",$hospitalName);
    $sql->bindValue(":address",$hospitalAddress);
    $sql->bindValue(":email",$hospitalEmail);
    $sql->bindValue(":contact",$hospitalPhone);
    $sql->bindValue(":map",$hospitalMap);
    $sql->bindValue(":createdDate", date("Y/m/d"));

    $sql->execute();

    header("Location: ../View/hospitalLocation.php");
}
