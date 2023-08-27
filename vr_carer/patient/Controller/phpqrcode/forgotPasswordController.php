
<?php

include "../Model/dbConnection.php";
include "./common/commonFunction.php";
include "./common/mailSender.php";
session_start();

if (isset($_POST["resetPsw"])) {
    $userEmail = $_POST["email"];

    $sql = $pdo->prepare("SELECT * FROM user_register WHERE email_address = :email");
    $sql->bindValue(":email", $userEmail);
    $sql->execute();
    $userInfo = $sql->fetchAll(PDO::FETCH_ASSOC);



    if (count($userInfo) != 0) {

        // new password
        $newPassword = getRamdom(10);

        $sql = $pdo->prepare(
            "UPDATE user_register SET
                password = :password,
                update_date = :updateDate
                WHERE id = :id
            "
        );
        $sql->bindValue(":updateDate", date("Y/m/d"));
        $sql->bindValue(
            ":password",
            password_hash($newPassword, PASSWORD_DEFAULT)
        );
        $sql->bindValue(":id", $userInfo[0]['id']);
        $sql->execute();

        //mail send
        $mail = new SendMail();
        $mail->sendMail(
            $userInfo[0]['email_address'],
            "Password Reset Complete",
            "<h1>Hello!!<h1>
            <h3><b>We received a request to reset your password and we'll give a new paassword.</b></h3>
            <h4><b>Here a new password : $newPassword</b></h4>
            <h4>Thank You for joining with us!!</h4>
            <h4>Vr Carer Team :<a> vrcarer1010@gmail.com <a/></h4>"
        );
        header("Location: ../View/login.php");
    } else {
        $_SESSION["forgotEmailWrong"] = $userEmail;
        header("Location: ../View/forgotpsw.php");
    }
}
?>


