<?php
include "../Controller/booking/approvedPatientListController.php";
session_start();
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
    <title>Patient history</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
    <!-- js -->
    <script src="./resources/js/jquery3.6.0.js"></script>
</head>

<body>
    <!-- Side Bar -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Side Bar Menu Copy Here -->
            <?php
            include("./common/nav.php")
            ?>

            <div class="data_box col-sm-9 col-md-8 col-xl-10 mt-3">
                <div class="header_wrapper bg_header ">
                    <div class="header_box">
                        <span class="navbar-brand ttl_admin" href="#">Patient History</span>
                    </div>
                </div>
                <div class="input_set">
                    <h2 class="input_set_header my-4">Today Approved Patient List</h2>
                </div>
                <table class="table" id="table-id">
                    <thead class="table_bgcolor" id="table_header">
                        <tr>
                            <td>No.</td>
                            <td>Patient Name</td>
                            <td>Age</td>
                            <td>Contact</td>
                            <td>Address</td>
                            <td>Doctor Name</td>
                            <td>Specility</td>
                            <td>Booking Date</td>
                            <td>Status</td>
                            <td>Add</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0; ?>
                        <?php foreach ($approved as $patient) { ?>
                            <tr class="row_bdr">
                                <td><?php echo ++$count ?></td>
                                <td><?php echo $patient["patient_name"] ?></td>
                                <td><?php echo $patient["age"] ?></td>
                                <td><?php echo $patient["contact"] ?></td>
                                <td><?php echo $patient["address"] ?></td>
                                <td><?php echo $patient["doctor_name"] ?></td>
                                <td><?php echo $patient["speciality"] ?></td>
                                <td><?php echo $patient["date"] ?></td>
                                <td><?php echo $patient["patient_status"] ?></td>
                                <td>
                                    <a href="../Controller/patientHistoryController.php?id=<?php echo $patient["id"] ?>" class="color_sixth"><button class="edit_btn me-4" value="">Add</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <div class="input_set">
                    <h2 class="input_set_header my-4">Patient History List</h2>
                </div>
                <table class="table" id="table-id">
                    <thead class="table_bgcolor" id="table_header">
                        <tr>
                            <td>No.</td>
                            <td>Patient Name</td>
                            <td>Doctor Name</td>
                            <td>Booking Date</td>
                            <td>Disease</td>
                            <td>Medicine</td>
                            <td>Next Appointment</td>
                            <td>Symptoms</td>
                            <td>To Avoid</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = ($page * $rowLimit) - ($rowLimit - 1) ?>
                        <?php foreach ($historyList as $history) { ?>
                            <tr class="row_bdr">
                                <td><?php echo $number++ ?></td>
                                <td><?php echo $history["patient_name"] ?></td>
                                <td><?php echo $history["doctor_name"] ?></td>
                                <td><?php echo $history["booking_date"] ?></td>
                                <td><?php echo $history["disease"] ?></td>
                                <td><?php echo $history["medicine"] ?></td>
                                <td><?php echo $history["next_appointment_date"] ?></td>
                                <td><?php echo $history["symptoms"] ?></td>
                                <td><?php echo $history["to_avoid"] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                include "./common/pagination.php";
                ?>
            </div>
        </div>
    </div>
</body>

</html>