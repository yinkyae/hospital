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
    <title>Forgot Password</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/fa91b09b37.js" crossorigin="anonymous"></script>
    <script src="./resources/js/signUp.js" defer></script>

    <!-- Css -->
    <link rel="stylesheet" href="./resources/css/forgotpsw.css">
    <!-- Css Root  -->
    <link rel="stylesheet" href="./resources/css/root.css">
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
    <div class="conainer">
        <!-- Logo  -->
        <img class=" mt-5 ms-5" src="../View/storages/logo/VR2.png" alt="LOGO" width="104px">
        <!-- body -->
        <div class="body ">
            <form action="../Controller/forgotPasswordController.php" method="post">
                <br>
                <div class="inputbox_wrapper">
                    <p class="pasw mt-5 fw-semibold">Forgot Your Password?</p>
                    <!-- input box -->
                    <div class="inpbox ms-5 mt-5">
                        <input type="text" class="name form-control" name="email" placeholder="Email Address">
                        <br>
                        <?php
                        if (isset($_SESSION["forgotEmailWrong"])) { ?>
                            <p class="icon fw-bold">
                            <i class="fa-solid fa-triangle-exclamation  "></i>

                            Email Wrong Check Again!
                            </p>
                        <?php } ?>
                        <button type="submit" name="resetPsw" class="btnsignup mt-1 form-control">
                            Send Email
                        </button>
                        <a href="./login.php">
                        <p class="mt-2 reg text-white fs-6 text-decoration-underline ">Go to Login</p>
                    </a>
            </form>
        </div>
    </div>
    <div>
        <img class="login_img ms-5" src="../View/components/card/image/image_login.png.png" alt="">
    </div>
    </div>
</body>

</html>
