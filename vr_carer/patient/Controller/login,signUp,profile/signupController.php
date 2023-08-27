<?php
session_start();
include("../../Model/dbConnection.php");

// Get User Info to check Email Exist 
if (isset($_POST["signUp"])) {
    $regName = $_POST["reg_name"];
    $regEmail = $_POST["reg_email"];
    $regPwd = $_POST["reg_pwd"];

    $sql = $pdo->prepare(
        "SELECT email_address FROM user_register WHERE email_address = :regEmail
        "
    );
    $sql->bindValue(":regEmail", $regEmail);
    $sql->execute();
    $reg_email_check = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Account already exist OR Not 
    if (count($reg_email_check) == 0) {
        // Add user info to user_register table
        $sql = $pdo->prepare(
            "INSERT INTO 
            user_register (register_name,email_address,password,create_date) 
            VALUES 
            (:regName,:regEmail,:regPwd,:createdDate); 
            "
        );
        $sql->bindValue(":regName", $regName);
        $sql->bindValue(":regEmail", $regEmail);
        $sql->bindValue(":regPwd", password_hash($regPwd, PASSWORD_DEFAULT));
        $sql->bindValue(":createdDate", date("Y/m/d"));
        $sql->execute();
        $_SESSION["defaultPhoto"] = "profile.jpg";
        $_SESSION["email"] = $regEmail;
        $_SESSION["userName"] = $regName;
        header("Location: ../../View/home1.php");
    } else {
        $_SESSION["aleradyExistEmail"] =  $regEmail ;
        header("Location: ../../View/signUp.php");
    }
}
