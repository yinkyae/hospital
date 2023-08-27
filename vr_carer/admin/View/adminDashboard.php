<?php
$view = 1;
include "../Controller/dashboard/dashbaordController.php";

include "../Controller/dashboard/searchController.php";
$view = 2;

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
    <title>Admin Dashboard</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
    <link rel="stylesheet" href="./resources/css/adminDashboard.css" <?= time() ?> />
    <!-- chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./resources/js/chart.js" defer></script>
</head>

<body>
    <!-- Side Bar -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Side Bar Menu Copy Here -->
            <?php
            include("./common/nav.php")
            ?>
            <div class=" data_box col-sm-9 col-md-8 col-xl-10 mt-3">
                <!-- Header -->
                <div class="header_wrapper bg_header ">
                    <div class="header_box">
                        <span class="navbar-brand ttl_admin" href="#">Dashboard</span>
                    </div>
                </div>
                <!--Card-->
                <div class="container display">
                    <div class="row">
                        <div class="col ">
                            <div class="card  " style="width: 18rem;">
                                <div class="card-body cardColor">
                                    <h5 class="card-title text-center text-white"><i class="fa-sharp fa-solid fa-bed cardTextAlign"></i>Inpatient</h5>
                                    <div class="display_bottom">
                                        <p class="card-text text-center mt-4 text_color"><?= $inHospital[0]['COUNT(id)'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card  " style="width: 18rem;">
                                <div class="card-body cardColor">
                                    <h5 class="card-title text-center text-white"><i class="fa-solid fa-user-doctor cardTextAlign"></i></i>Doctors</h5>

                                    <div class="display_bottom">
                                        <p class="card-text text-center mt-4 text_color"><?= $countDoctor[0]['COUNT(id)'] ?> </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card  " style="width: 18rem;">
                                <div class="card-body cardColor">
                                    <h5 class="card-title text-center text-white"><i class="fa-solid fa-calendar-check cardTextAlign"></i>Bookings</h5>

                                    <div class="display_bottom">
                                        <p class="card-text text-center mt-4 text_color"><?= $countBooking[0]['COUNT(id)'] ?> </p>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Chart -->
                <div class="chart mx-auto my-5 col-sm-9 col-md-8 col-xl-8">
                    <canvas id="myChart"></canvas>
                </div>
                <hr>
                <!--Search Box-->
                <div class="sec_input mb-2 d-flex justify-content-end">
                    <input type="date" id="todayList" class="common_input form-control" name="serachText" placeholder="yyyy-mm-dd" width="150" />
                    <button class="px-5 searchDay ms-3 " id="boom">search</button>
                </div>
                <!-- <a href="#" class="stretched-link">Go somewhere</a> -->
                <div class="input_set">
                    <h2 class="input_set_header my-4">Today Patient List</h2>
                </div>

                <table class="table" id="table-id">
                    <thead class="table_bgcolor">
                        <tr class="text-white">
                            <td>No.</td>
                            <td>Patient Name</td>
                            <td>Email</td>
                            <td>Doctor Name</td>
                            <td>Dieses</td>
                            <td>Booking Date</td>
                            <td>Next Appointment</td>

                        </tr>
                    </thead>
                    <tbody id="resultData">

                        <!-- Table  -->

                    </tbody>
                </table>
                <hr class="about_line mt-5" />
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="../View/resources/js/jquery3.6.0.js"></script>
    <script src="../View/resources/js/dashboard.js"></script>
</body>

</html>