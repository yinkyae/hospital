<?php
session_start();
include "../Controller/bloodDonation/showCenterController.php";
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
    <title>Blood Donation</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!-- Css -->
    <!-- Css Root  -->
    <link rel="stylesheet" href="./resources/css/root.css">
    <link rel="stylesheet" href="./resources/css/blooddonation.css?v=" <?php time() ?>>
</head>

<body>
    <!-- Header -->
    <?php
    include("./common/head.php");
    ?>
    <!-- Blood Donation Header -->
    <h3 class="blood_donate_header my-5">Blood Donation Center</h3>
    <!-- Blood Donation Center Cards -->
    <?php foreach ($centerList as $center) { ?>
        <div class="center_card_wrapper mb-5">
            <div class="center_card">
                <div class="center_name_div">
                    <h2 class="center_name"><?php echo $center["center_name"] ?></h2>
                </div>
                <div class="center_address_div">
                    <p class="yellow_color center_phone">Phone Number : <span class="white_color"><?php echo $center["center_contact"] ?></span></p>
                    <p class="yellow_color center_phone">Email: <span class="white_color"><?php echo $center["center_email"] ?></span></p>
                    <p class="yellow_color center_address">Address : <span class="white_color">
                            <?php echo $center["center_address"] ?>
                        </span></p>
                </div>
            </div>
            
        </div>
        <hr class="line " />
    <?php } ?>
    <!-- Blood Donation Center Cards -->
    <!-- Footer -->
    <?php
    include("./common/footer.php")
    ?>
</body>

</html>
