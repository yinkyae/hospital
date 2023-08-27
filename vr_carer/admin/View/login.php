<?php
session_start();
unset($_SESSION["login"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- root Css -->
    <link rel="stylesheet" href="./resources/css/root.css">
    <!-- Css -->
    <link rel="stylesheet" href="./resources/css/login.css">
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/fa91b09b37.js" crossorigin="anonymous"></script>
    <!-- JS-->
    <script src="./resources/js/logIn.js" defer></script>
</head>

<body>


    <!-- Main Content -->
    <div class="container">
        <p class="adm_login text-center align-items-center fw-bold">Admin Log In</p>
        <!-- Input Box -->
        <form action="../Controller/loginController.php" method="POST" class="inp_box">
            <p class="fw-semibold text-white fs-5">Admin Name*</p>
            <input type="text" value="<?php
                                        if (isset($_SESSION["wrongName"])) {
                                            echo $_SESSION["wrongName"];
                                        } ?>" class="form-control " name="adminName" required>
            <?php
            if (isset($_SESSION["wrongPwd"])) { ?>
                <p class="icon">
                    <i class="fa-solid fa-triangle-exclamation  "></i>
                    Name Wrong
                </p>
            <?php } ?>
            <p></p>
            <p class="fw-semibold text-white fs-5">Password*</p>
            <div class="password_box">
                <input type="password" id="pw" value="<?php
                                                        if (isset($_SESSION["wrongPwd"])) {
                                                            echo $_SESSION["wrongPwd"];
                                                        } ?>" class="form-control" name="adminPassword" required>

                <i class="fa-solid fa-eye-slash" id="eye"></i>
            </div>
            <?php
            if (isset($_SESSION["wrongPwd"])) { ?>
                <p class="icon">
                    <i class="fa-solid fa-triangle-exclamation  "></i>
                    Password Wrong
                </p>
            <?php } ?>
            <p></p>
            <br>
            <button type="submit" class="fw-bold  btn_login form-control " name="adminLogIn">
                Log In
            </button>
        </form>
    </div>


</body>

</html>