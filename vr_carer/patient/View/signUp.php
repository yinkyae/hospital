<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" sizes="32x32" href="./storages/logo/VR1.png" />
    <title>Sign Up</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <!-- Css Root  -->
    <link rel="stylesheet" href="./resources/css/root.css">
    <!-- Css -->
    <link rel="stylesheet" href="./resources/css/signUp.css">
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/fa91b09b37.js" crossorigin="anonymous"></script>

    <script src="./resources/js/signUp.js" defer></script>
</head>

<body>
    <div class="conainer-fluid">
        <!-- Logo  -->
        <img class="mt-5 ms-5" src="../View/storages/logo/VR2.png" alt="LOGO" width="104px">
        <!-- body -->
        <div class="body ">
            <div class="inputbox_wrapper">
                <p class="sign_up mt-3">Sign Up</p>
                <!-- input box -->
                <form method="POST" action="../Controller/login,signUp,profile/signupController.php" class="inpbox mt-3">
                    Name* <br>
                    <input type="text" name="reg_name" class="name form-control" placeholder="username" required>
                    <br>
                    Email* <br>
                    <input type="email" name="reg_email" class="name form-control" placeholder="email" value="
                    <?php
                    if (isset($_SESSION["aleradyExistEmail"])) {
                        echo $_SESSION["aleradyExistEmail"];
                    } ?>
                    " required>
                    <?php
                    if (isset($_SESSION["aleradyExistEmail"])) { ?>
                        <p id="alreadyExist"><u>This Email Address Already has an Account</u></p>
                    <?php } ?>

                    <br>
                    Password* <br>
                    <div class="password_box">
                        <input type="password" name="reg_pwd" class="name form-control" placeholder="password" id="pw" required>
                        <i class="fa-solid fa-eye-slash" id="eye"></i>
                    </div>
                    <br>
                    <br>
                    <button type="submit" name="signUp" class="btnsignup mt-1 form-control">
                        Sign up
                    </button>
                    <a href="./login.php">
                        <p class="mt-2 reg text-white fs-6 text-decoration-underline ">Already have an account?</p>
                    </a>
                </form>
            </div>
            <div>
                <img class="signup_img ms-5" src="../View/components/card/image/image_login.png.png" alt="">
            </div>
        </div>
</body>

</html>
