<?php
include "../Model/dbConnection.php";
session_start();

if (isset($_POST["changePwdBtn"])) {

    $currentPwd = $_POST["currentPwd"];
    $changePwd = $_POST["changePwd"];
    $email = $_SESSION["email"];


    $sql = $pdo->prepare("SELECT * FROM user_register WHERE email_address = :email");
    $sql->bindValue(":email", $email);
    $sql->execute();
    $userInfo = $sql->fetchAll(PDO::FETCH_ASSOC);


    if (password_verify($currentPwd, $userInfo[0]["password"])) {

        echo "<pre>";
        var_export($userInfo);
        echo "right";
        unset($_SESSION["currentPwdWrong"]);
        $sql = $pdo->prepare("UPDATE user_register SET password = :password,update_date = :updateDate WHERE id = :id
            "
        );
        $sql->bindValue(":updateDate", date("Y/m/d"));
        $sql->bindValue(
            ":password",
            password_hash($changePwd, PASSWORD_DEFAULT)
        );
        $sql->bindValue(":id", $userInfo[0]['id']);
        $sql->execute();
        header("Location: ../View/profile.php");
        $_SESSION["Successfully Change"] = "Successfully Change Your Password";
    } else {
        $_SESSION["currentPwdWrong"] = $currentPwd;
        header("Location: ../View/profile.php");
    }
}
