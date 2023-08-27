<?php
include "../Controller/doctor/getDoctorInfoController.php";
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
    <title>Doctor</title>
    <!-- Css root -->
    <link rel="stylesheet" href="./resources/css/root.css">
    <link rel="stylesheet" href="./resources/css/doctor.css">
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
    <!-- js -->
    <script src="./resources/js/jquery3.6.0.js"></script>
    <script src="./resources/js/doctor.js" defer></script>
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
                        <span class="navbar-brand ttl_admin" href="#">Doctor</span>
                    </div>
                </div>
                <div class="sec_input mb-2">
                    <div class="searchbox search">
                        <input type="text" class="search_input  ps-5" id="searchDoctor" />
                        <i class="fa-solid fa-magnifying-glass search_icon text_white"></i>
                        <button id="search" class="search_text">Search</button>
                    </div>
                </div>
                <button id="allDoctor">All Doctors</button>
                <section class="doctor_list">
                    <div class="input_set">
                        <h2 class="input_set_header  my-4"><u>Doctor List</u></h2>

                    </div>
                    <table class="table">
                        <thead class="table_bgcolor" id="table_header">
                            <tr>
                                <td>No.</td>
                                <td>Doctor Name</td>
                                <td>Age</td>
                                <td>Specility</td>
                                <td>Contact</td>
                                <td>Profile Photo</td>
                                <td>Add Dressing Time</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="table_text">
                            <?php $number = ($page * $rowLimit) - ($rowLimit - 1) ?>
                            <?php foreach ($doctorInfo as $doctor) { ?>
                                <tr class="row_bdr">
                                    <td><?= $number++ ?></td>
                                    <td><?= $doctor["doctor_name"] ?></td>
                                    <td><?= $doctor["age"] ?></td>
                                    <td><?= $doctor["speciality"] ?></td>
                                    <td><?= $doctor["contact"] ?></td>
                                    <td id="image">
                                        <img src="./storages/doctor/<?= $doctor["profile_photo"] ?>" alt="" class="image">
                                    </td>
                                    <td>
                                        <a href="../Controller/dateController.php?id=<?= $doctor["id"] ?>" class="color_sixth"><button class="edit_btn me-4" value="<?= $doctor["id"] ?>">Add</button></a>
                                    </td>
                                    <td class="p-3">
                                        <a href="../Controller/doctorEditController.php?id=<?= $doctor["id"] ?>" class="edit_btn me-4">
                                            Edit</a>
                                        <a href="../Controller/doctorEditController.php?delId=<?= $doctor["id"] ?>" class="trash "><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    include "./common/pagination.php";
                    ?>
                    <hr />
                </section>
                <form action="../Controller/doctor/doctorAddController.php" method="POST" class="add_doctor" enctype="multipart/form-data">
                    <div class="input_set">
                        <h2 class="input_set_header my-4"><u>Add Doctor</u></h2>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Doctor Name</span>
                            <input type="text" class="common_input form-control " name="doctorName" required />
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Age</span>
                            <input type="text" class="common_input form-control " name="doctorAge" required />
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Gender</span>
                            <select name="doctorGender" id="" class="common_input form-control" required>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Speciality</span>
                            <select name="doctorSpeciality" id="" class="common_input form-control" required>
                                <option value="General Health">General Health</option>
                                <option value="Pulmonology">Pulmonology</option>
                                <option value="Paediatric">Paediatric</option>
                                <option value="Ophthalmology">Ophthalmology</option>
                                <option value="Neurology">Neurology</option>
                                <option value="OB-GYN">OB-GYN</option>
                                <option value="Dentist">Dentist</option>
                            </select>
                       
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Contact</span>
                            <input type="text" class="common_input form-control " name="doctorPhone" required />
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text add_file">Profile Photo</span>
                            <input type="file" id="formFileLg" class="form-control common_input" accept="image/*" name="doctorPhoto" required />
                        </div>

                        <div class=" mb-2  ">
                            <!-- Add Btn -->
                            <button type="submit" href="" class="common_btn add_btn" name="doctorAdd">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>