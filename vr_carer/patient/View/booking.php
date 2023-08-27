x`<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: ./login.php");
}
include "../Controller/phpqrcode/qrlib.php";
include "../Controller/booking/BookingStatusController.php";

unset($_SESSION["bookingSuccess"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking Status</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="32x32" href="./storages/logo/VR1.png" />
    <!--css-->
    <link rel="stylesheet" href="./resources/css/root.css?v=" <?php time() ?>>
    <link rel="stylesheet" href="./resources/css/booking.css?v=" <?php time() ?>>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Source+Sans+Pro&display=swap" rel="stylesheet">

</head>

<body>
    <?php
    include("./common/head.php");
    ?>
    <p class="warning">Only approved bookings will be displayed on this page
    </p>
    <div class="container bcontent">

        <div class="page-deader">Your Booking Status</div>
        <hr />
        <?php foreach ($status as $booking) {
            $text = $booking["qrcode"];
            QRcode::png($text, "./Qrcodes/" . $booking["id"] . ".png");
        ?>

            <div class="card cart mb-3" style="width: 500px;">
                <div class="row no-gutters">
                    <div class="col-sm-7">
                        <div class="fs-3 text-white text-center">Your Appointment</div>
                        <br>
                        <p class="text-center text-white"><?php echo $booking["doctor_name"] ?></p>
                        <br>
                        <p class="text-center text-white"><?php echo $booking["speciality"] ?></p>
                        <br>
                        <p class="schedule"><?php echo "Date" . "\x20\x20\x20" . $booking["date"] ?></p>
                    </div>
                    <div class="col-sm-5">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <p class="text-center text-white fs-3">
                                <?php
                                if ($booking["status"] == 1) {
                                ?>
                                    <img src="./Qrcodes/<?= $booking["id"] ?>.png" alt="" width="150">
                                <?php  } else {
                                    echo "Your Booking is Pending";
                                } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- Footer -->
    <?php
    include("./common/footer.php")
    ?>
</body>

</html>

<style>
    @media screen and (max-width: 600px) {
        .list-group-item {
            display: block;
            text-align: center;
        }

        .title {
            font-size: 0.3rem !important;
        }

    }
</style>
