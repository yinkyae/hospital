<?php
session_start();
if (isset($_SESSION["patientInfoHistory"])) {
    $patientInfo = $_SESSION["patientInfoHistory"];
}
if (!isset($_SESSION["login"])) {
    header("Location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add History</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Side Bar Menu Copy Here -->
            <?php
            include("./common/nav.php")
            ?>

            <div class="data_box col-sm-9 col-md-8 col-xl-10 mt-3">
                <div class="header_wrapper bg_header ">
                    <div class="header_box">
                        <span class="navbar-brand ttl_admin" href="#">Add Patient History</span>
                    </div>
                </div>
                <div class="sec_input mb-2">
                    <a href="./patientHistory.php" class="common_btn add_btn back_btn">Back to History List
                        <i class="fa-solid fa-arrow-left arrow_left"></i>
                    </a>
                </div>
                <form action="../Controller/patientHistoryController.php" method="POST" class="input_set">
                    <h2 class="input_set_header my-4">Add Patient History</h2>
                    <div class="input_one mb-2">
                        <span class="input_set_text">Patient Name</span>
                        <input type="text" class="common_input form-control" value="<?= $patientInfo[0]["patient_name"] ?>" disabled />
                        <input type="text" name="patientName" value="<?= $patientInfo[0]["patient_name"] ?>" hidden>
                    </div>
                    <div class="input_one mb-2">
                        <span class="input_set_text">Date</span>
                        <input type="text" class="common_input form-control " value="<?= $patientInfo[0]["date"] ?>" disabled />
                        <input type="text" name="dateBooking" value="<?= $patientInfo[0]["date"] ?>" hidden>
                    </div>
                    <div class="input_one mb-2">
                        <span class="input_set_text">Doctor Name</span>
                        <input type="text" class="common_input form-control " value="<?= $patientInfo[0]["doctor_name"] ?>" disabled />
                        <input type="text" name="doctorName" value="<?= $patientInfo[0]["doctor_name"] ?>" hidden>
                    </div>
                    <div class="input_one mb-2">
                        <span class="input_set_text">Disease</span>
                        <input type="text" class="common_input form-control " name="diseaseHistory" required />
                    </div>
                    <div class="input_one mb-2">
                        <span class="input_set_text">Medicine</span>
                        <input type="text" class="common_input form-control " name="medicineHistory" required/>
                    </div>
                    <div class="input_one mb-2">
                        <span class="input_set_text">Next Appointment</span>
                        <input type="date" class="common_input form-control " name="nextAppointment" />
                    </div>
                    <div class="input_one mb-2">
                        <span class="input_set_text">Symptoms</span>
                        <input type="text" class="common_input form-control " name="symptoms" required />
                    </div>
                    <div class="input_one mb-2">
                        <span class="input_set_text">To Avoid</span>
                        <input type="text" class="common_input form-control " name="avoid" />
                    </div>
                    <div class=" mb-2  ">
                        <!-- Add Btn -->
                        <button type="submit" href="" class="common_btn add_btn " name="addHistory">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>