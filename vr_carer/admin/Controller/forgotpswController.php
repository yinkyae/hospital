<!-- 

<?php

include "../Model/dbConnection.php";
include "./common/commonFunction2.php";
include "./common/mailSender.php";

if (isset($_POST["resetPwd"])) {
    $userEmail = $_POST["email"];

    echo $userEmail;
    $sql = $pdo->prepare("SELECT * FROM user_register WHERE email_address = :email");
    $sql->bindValue(":email", $userEmail);
    $sql->execute();
    $userInfo = $sql->fetchAll(PDO::FETCH_ASSOC);



    if (count($userInfo) != 0) {

        // new password
        $newPassword = getRamdom(10);

        $sql = $pdo->prepare(
            "UPDATE user_register SET
                password = :password
                WHERE id = :id
            "
        );

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
            "<h2>Hello!</h2>
            <h3>We received a request to reat your password and we'll give a new paassword.</h3>
            <p>Here a new password : $newPassword</p>"
        );
        header("Location: ../View/login.php");
    } else {
    }
}
?>
 -->
