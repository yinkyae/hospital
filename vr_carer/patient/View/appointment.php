x<?php
session_start();
include "../Controller/doctor/doctorDressingTimeController.php";
if (isset($_SESSION["appointmentDoctorInfo"])) {
    $docotrInfo = $_SESSION["appointmentDoctorInfo"];
}
if (isset($_SESSION["userInfo"])) {
    $userInfo = $_SESSION["userInfo"];
}
if (isset($_SESSION["selectedDoctorDuty"])) {
    $selectedDoctorDuty = $_SESSION["selectedDoctorDuty"];
}
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
    <title>Appointment</title>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <!--Css Root-->
    <link rel="stylesheet" href="./resources/css/root.css">
    <link rel="stylesheet" href="./resources/css/appointment.css?v=" <?= time() ?>>

</head>

<body>
    <!-- Alert Box -->
    <?php
    if (isset($_SESSION["alreadyBookedDoctor"])) {
        echo
        "
        <div class='modal' tabindex='-1' id='myModal'>
            <div class='modal-dialog ' >
                <div class='modal-content bookingAlert'  >
                    <div class='modal-body'>
                        <p class='alert_text'>Alerady Book With This Doctor.</p>
                    </div>
                    <div class='aler_btn'>
                        <button type='button' class='btn  alert_btn_text '>
                        <a href='./doctor.php' class=' alert_btn_a_text text-decoration-none'>OK</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
    if (isset($_SESSION["bookingSuccess"])) {
        echo
        "
        <div class='modal' tabindex='-1' id='myModal'>
            <div class='modal-dialog ' >
                <div class='modal-content bookingAlert'  >
                    <div class='modal-body'>
                    <p class='alert_text'><span><i class='fa-solid fa-check'></i></span>SUCCESS!</p>
                        <p class='alert_text'>Go to Booking Status and Check Your Booking.</p>
                    </div>
                    <div class='aler_btn'>
                        <button type='button' class='btn  alert_btn_text' >
                        <a href='./booking.php' class='alert_btn_a_text text-decoration-none'>OK</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
    ?>
    <!-- Header -->
    <?php
    include("./common/head.php")
    ?>
    
    <div class="container body mb-4">
        <div class="row">
            <div class="col-md-6 col-sm-12 inputbox_wrapper">
                <!-- Page title -->
                <h3 class="appointment_header my-4 ">Make an Appointment</h3>
                <!-- Appointment form -->
                <form class="form_box border border-2 border-warning rounded" action="../Controller/booking/appointmentController.php" method="POST">
                    <div class="input_align m-3">
                        <input type="text" id="TextInput" class="form-control" name="doctor" value=" <?= $docotrInfo[0]["doctor_name"] ?>" readonly>
                    </div>
                    <div class="input_align m-3">
                        <input type="text" id="TextInput" class="form-control" name="speciality" value=" <?= $docotrInfo[0]["speciality"] ?>" readonly>
                    </div>
                    <div class="input_align m-3">
                        <input type="date" id="TextInput" class="form-control" name="date" placeholder="Booking Date" required>
                    </div>
                    <div class="input_align m-3">
                        <input type="text" id="TextInput" class="form-control" placeholder="Patient Name" name="patient" value="<?= $userInfo[0]["register_name"] ?>" required>
                    </div>
                    <div class="input_align m-3">
                        <input type="number" id="TextInput" class="form-control" name="age" placeholder="Patient Age" required>
                    </div>
                    <div class="input_align m-3">
                        <input type="number" id="TextInput" class="form-control" name="contact" placeholder="Phone Number" required>
                    </div>
                    <div class="input_align m-3">
                        <input type="text" id="TextInput" class="form-control" name="address" placeholder="address" required>
                    </div>
                    <div class="input_align m-3">
                        <input type="text" id="TextInput" class="form-control" name="remark" placeholder="Remark From Doctor If Have">
                    </div>
                    <div class="input_align m-3">

                        <input type="email" id="TextInput" class="form-control" placeholder="Email Address" name="email" value="<?= $userInfo[0]["email_address"] ?>" readonly>
                    </div>
                    <input type="hidden" name="id" value="<?= $userInfo[0]["id"] ?>">
                    <input type="hidden" name="doctorId" value="<?= $docotrInfo[0]["id"] ?>">
                    <!-- Button -->
                    <div class="d-flex justify-content-center m-3">
                        <button type="submit" name="makeBooking" class=" btn fw-bold submit_btn text-white ">Submit Appointment</button>
                    </div>
                </form>

            </div>
            <div class="col-md-6 col-sm-12">

                <!-- Image-->
                <div>
                    <div class="doctorInfo mt-5">
                        <div class="doctorCard">
                            <div class="doctorImg">
                                <img src="./storages~HEAD/doctor/<?= $docotrInfo[0]["profile_photo"] ?>" alt="" class="doctorImgSize">
                            </div>
                            <div class="doctorDuty mt-3 pt-3">
                                <h5> <?= $docotrInfo[0]["doctor_name"] ?></h5>
                                <p><?= $docotrInfo[0]["speciality"] ?></p>
                                <div class="text">
                                    <?php foreach ($selectedDoctorDuty as $time) { ?>
                                        <p> <?= $time["date"] ?> <span><?= $time["startTime"] ?> </span> ~ <span> <?= $time["endTime"] ?></span></p>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Footer -->
    <?php
    include("./common/footer.php")
    ?>



    <?php
    if (isset($_SESSION["alreadyBookedDoctor"]) ||isset($_SESSION["bookingSuccess"]) ) {
        echo
        "
    <script>
    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
        keyboard: false
    })
    myModal.show()
    </script>
    ";
    }
    ?>
</body>

</html>
