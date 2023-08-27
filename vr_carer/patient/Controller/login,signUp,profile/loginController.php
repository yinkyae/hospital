<?php
session_start();
include("../../Model/dbConnection.php");

if (isset($_POST["logIn"])) {
    $loginEmail = $_POST["email"];
    $loginPwd = $_POST["pwd"];
    // Get User Info to Check Email and Password correct
    $sql = $pdo->prepare(
        "SELECT * FROM user_register WHERE email_address = :Email
        "
    );
    $sql->bindValue(":Email", $loginEmail);
    $sql->execute();
    $login_check = $sql->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["email"] = $loginEmail;
    $_SESSION["userName"] = $login_check[0]["register_name"];
    $_SESSION["defaultPhoto"] = $login_check[0]["profile_image"];
   
        // Check Email and Password Correct
    if (
        password_verify($loginPwd, $login_check[0]["password"]) &&
        $loginEmail == $login_check[0]["email_address"]
    ) {
        unset($_SESSION["wrongEmail"]);
        unset($_SESSION["wrongLoginPwd"]);
        header("Location: ../../View/home1.php");
    } else if($loginEmail != $login_check[0]["email_address"]) {
        $_SESSION["wrongEmail"] =  $loginEmail ;
        header("Location: ../../View/login.php");
    }else if($loginPwd != $login_check[0]["password"]){
        $_SESSION["wrongLoginPwd"] =  $loginPwd ;
        header("Location: ../../View/login.php");
    }

};
