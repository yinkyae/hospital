<?php
include "../Model/dbConnection.php";
session_start();
if (isset($_POST["adminLogIn"])) {
    $name = $_POST["adminName"];
    $password = $_POST["adminPassword"];
    $_SESSION["login"] = $name;

    $sql = $pdo->prepare(
        "SELECT * FROM admin WHERE admin_name = :name "
    );
    $sql->bindValue(":name", $name);
    $sql->execute();
    $login_check = $sql->fetchAll(PDO::FETCH_ASSOC);

    if ($name == $login_check[0]["admin_name"] && $password == $login_check[0]["password"]
    ) {
        unset($_SESSION["wrongPwd"]);
        unset($_SESSION["wrongName"]);
        header("Location: ../View/adminDashboard.php");
    } else if($password != $login_check[0]["password"]) {
        $_SESSION["wrongPwd"] =  $password ;
        header("Location: ../View/login.php");
    } else if($name != $login_check[0]["admin_name"]){
        $_SESSION["wrongName"] =  $name ;
        header("Location: ../View/login.php");
    }
}
?>