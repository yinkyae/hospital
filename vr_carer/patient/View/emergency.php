<?php
session_start();
include("../Controller/emergencyPage/emergencyController.php");
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
<link rel="icon" type="image/png" sizes="32x32" href="./storages/logo/VR1.png" />
    <title>First Aid For Emergency Situations</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./resources/css/root.css">
    <!-- Css -->
    <link rel="stylesheet" href="./resources/css/emergency.css?v=" <?= time() ?>>
    <script src="./resources/js/jquery3.6.0.js"></script>
    <script src="./resources/js/emergency.js" defer></script>

</head>

<body>
    <!-- Header -->
    <?php
    include("./common/head.php")
    ?>

    <!-- Search Box -->
    <div id="first_aid_search" class="me-4">
        <div class="searchbox mt-2 mb-4">
            <select name="" id="first_aid_select" class="form-select">
                <?php foreach ($emergencyInfo as $emergency) { ?>
                    <option value="<?= $emergency["article_header"] ?>"><?= $emergency["article_header"] ?></option>
                <?php }
                ?>
            </select>
            <button id="search" class="fw-bold mt-2 allDoctor">Search</button>
            <button class="mt-3 ms-4 allDoctor" id="allFirstAid">Show All First Aid</button>
        </div>
    </div>
    <!-- First Tab -->
    <div class="important_tab text-center mt-5">
        <h3 class="text-uppercase important_tab_header ">
            <?php
            if (count($emergencyTab) == 0) {
                "";
            } else { ?>
                <p><?= $emergencyTab[0]["header"] ?></p>
            <?php }
            ?>
        </h3>
        <div class="important_tab_para">
            <?php
            if (count($emergencyTab) == 0) {
                "";
            } else { ?>
                <p><?= $emergencyTab[0]["text"] ?></p>
            <?php
            } ?>
        </div>
        <hr class="line" />
    </div>

    <!-- Cards -->

    <div class="first_aid_card my-4" id="articleSearch">
        <?php foreach ($emergencyInfo as $emergency) { ?>
            <div class="first_aid_card">
                <h1 class="first_aid_card_header mb-3">First Aid For <span>
                        <?= $emergency["article_header"] ?>
                    </span>
                </h1>
                <div class="wrapper">
                    <div>
                    <img src="./storages~HEAD/emergency/<?= $emergency["article_image"] ?>" alt="" class="card_img " />
                    </div>
                    <div class="info">
                        <h2 class="first_aid_para_header">What to Do?</h2>
                        <?= $emergency["article_text"] ?>
                    </div>
                </div>
                <hr class="line" />
            </div>
        <?php }
        ?>
    </div>


    <!-- Footer -->
    <?php
    include("./common/footer.php")
    ?>
</body>

</html>
