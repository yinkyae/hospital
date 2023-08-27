<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["userInfo"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" sizes="32x32" href="./storages/logo/VR1.png" />
    <title>Login to your account</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <!-- Css Root  -->
    <link rel="stylesheet" href="./resources/css/root.css">
    <!-- Css -->
    <link rel="stylesheet" href="./resources/css/login.css?v=" <?php time() ?>>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/fa91b09b37.js" crossorigin="anonymous"></script>
    <!-- script -->
    <script src="./resources/js/jquery3.6.0.js"></script>
    <script src="./resources/js/signUp.js" defer></script>


</head>

<body>
    <div class="conainer">
        <!-- Logo  -->
        <img class="mt-5 ms-5" src="../View/storages/logo/VR2.png" alt="LOGO" width="104px">
        <!-- body -->
        <div class="body mt-5 mx-2">
            <div class="inputbox_wrapper">
                <div class="header">
                    <p class="wclback">Welcome back</p>
                    <p class="login  text-white">Login to your account</p>
                </div>
                <!-- input box -->
                <form method="POST" action="../Controller/login,signUp,profile/loginController.php" class="inpbox">
                    <br>
                    <input type="email" name="email" class="name form-control mb-3" placeholder="Login with email" value="<?php
                    if (isset($_SESSION["wrongEmail"])) {
                        echo $_SESSION["wrongEmail"];
                    } ?>" required>
                    <?php
                    if (isset($_SESSION["wrongEmail"])) { ?>
                        <p id="alreadyExist" class="icon fw-bold"><i class="fa-solid fa-triangle-exclamation  "></i>  Email Address Wrong</p>
                    <?php } ?>
                    <div class="password_box">
                        <input type="password" name="pwd" class="name form-control mb-3" placeholder="Password"  id="pw" value="<?php
                    if (isset($_SESSION["wrongLoginPwd"])) {
                        echo $_SESSION["wrongLoginPwd"];
                    } ?>"  required>
                        <i class="fa-solid fa-eye-slash" id="eye"></i>
                    </div>
                   
                    <?php
                    if (isset($_SESSION["wrongLoginPwd"])) { ?>
                         <p id="alreadyExist" class="icon fw-bold"><i class="fa-solid fa-triangle-exclamation "></i>  Password Wrong</p>
                    <?php } ?>
                    <a href="./forgotpsw.php">
                        <p class="forgotpsw text-decoration-underline text-white">Forgot Password?</p>
                    </a>
                    <button type="submit" name="logIn" class="btnsignup mt-1 form-control">
                        Log In
                    </button>
                    <a href="./signUp.php">
                        <p class="mt-2 reg text-white fs-6 text-decoration-underline ">Not Registered yet?</p>
                    </a>
                </form>
            </div>
            <div>
                <img class="login_img ms-5" src="../View/components/card/image/image_login.png.png" alt="">
            </div>
        </div>
</body>

</html>
