<?php
session_start();
include("../Controller/aboutUs/aboutUsController.php");
if (!isset($_SESSION["email"])) {
    header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
<link rel="icon" type="image/png" sizes="32x32" href="./storages/logo/VR1.png" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <!-- Css -->
    <link rel="stylesheet" href="./resources/css/about_us.css?v=" time()>
    <!-- Css Root  -->
    <link rel="stylesheet" href="./resources/css/root.css">
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
    <!-- Header -->
    <?php
    include("./common/head.php")
    ?>
    <div class="container">
        <!-- Page header -->
        
        <?php foreach ($aboutInfo as $info) { ?>
            <h3 class="about_header my-4">About Us</h3>
            <!-- Page Tab -->
            <p class="text-center first_aid_para"><?= $info["text1"] ?></p>
            <!-- <img src="./storages/image/<?= $info["image1"] ?>" alt="" class="about_us_center mt-5" /> -->
            <hr class="about_line mt-5" />
        <?php  } ?>

        <!-- Section-2 -->

        <div class="first_aid_card my-4">
            <div class="wrapper">
                <div class="info" data-aos="flip-down">
                    <h2 class="display_top header-2"><?= $info["header"] ?></h2>
                    <ol class="first_aid_para">
                    <p class="first_aid_para"><?= $info["text2"] ?></p>
                    </ol>
                </div>
                <img src="./storages~HEAD/about/<?= $info["image2"] ?>" alt="" class="" />

            </div>
        </div>
        <hr class="about_line mt-4" />
        <!-- dropdown section -->
        <div class="policy">
            <h2 class="display_top header-2 mt-2">Privacy Policy</h2>

            <?php foreach ($policyInfo as $info1) { ?>
                <!-- Page Tab -->
                <p class="text-center first_aid_para"><?= $info1["policy_text"] ?></p>
                <!-- Page Tab -->
                <!-- <p class="text-center first_aid_para"><?= $info1["policy_text"] ?></p> -->
            <?php } ?>
        </div>
        <hr class="about_line mt-4" />
    </div>
    </div>
    <!-- Footer -->
    <?php
    include("./common/footer.php")
    ?>

    <script>
        AOS.init();
    </script>
</body>

</html>

