<?php
session_start();
include "../Controller/blog/showblogController.php";
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
    <title>Blog</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- Css -->
    <link rel="stylesheet" href="./resources/css/blog.css?v=" time()>
    <!-- Css Root  -->
    <link rel="stylesheet" href="./resources/css/root.css">
</head>

<body>
    <!-- Header -->
    <?php
    include("./common/head.php")
    ?>
    <!-- Current Diseases header -->
    <h1 class="current_disease_header my-5">Current Diseases</h1>
    <!-- Current Diseases card -->
    <?php foreach ($blogList as $blog) { ?>
        <div class="first_aid_card my-4">
            <div class="wrapper">
                <div class="me-3">
                <img src="./storages/blog/<?php echo $blog["image"] ?>" alt="" class="card_img" />
                </div>
                <div class="info">
                    <h2 class="first_aid_para_header"><?php echo $blog["header"] ?></h2>
                    <p class="first_aid_para">
                        <?php echo $blog["description"] ?>
                    </p>
                </div>
            </div>
            <hr class="line" />
        </div>
    <?php } ?>
    <!-- Footer -->
    <?php
    include("./common/footer.php")
    ?>
</body>

</html>
