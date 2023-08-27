<?php
include("../Controller/inpatientController.php");
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
    <title>Add Inpatient</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
    <link rel="stylesheet" href="./resources/css/addInpatient.css" <?= time() ?> />
    <!-- js -->
    <script src="./resources/js/jquery3.6.0.js"></script>
    <script src="./resources/js/script.js"></script>
    <script src="./resources/js/inpatientSearch.js?v=" <?= time() ?> defer></script>

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
                <!-- Header -->
                <div class="header_wrapper bg_header ">
                    <div class="header_box">
                        <span class="navbar-brand ttl_admin" href="#">Add Inpatient</span>
                    </div>
                </div>
                <div class="sec_input mb-2">
                    <a href="./inpatientList.php" class="common_btn add_btn back_btn">Back to Inpatient List
                        <i class="fa-solid fa-arrow-left arrow_left"></i>
                    </a>
                </div>
                <form action="../Controller/inpatientController.php" method="post">
                    <div class="input_set">
                        <h2 class="input_set_header my-4">Add Inpatient</h2>
                        <div class="input_one mb-2 display_top">
                            <span class="input_set_text text_display">Date</span>
                            <input type="date" class="common_input form-control" name="date" />
                        </div>
                        <div class="input_one mb-2 display_top">
                            <span class="input_set_text text_display">Patient Name</span>
                            <input type="text" class="common_input form-control" name="name" />
                        </div>
                        <div class="input_one mb-2 display_top">
                            <span class="input_set_text text_display">Age</span>
                            <input type="text" class="common_input form-control" name="age" />
                        </div>
                        <div class="input_one mb-2 display_top">
                            <span class="input_set_text text_display">Disease</span>
                            <input type="text" class="common_input form-control" name="disease" />
                        </div>
                        <div class="input_one mb-2 display_top">
                            <span class="input_set_text text_display">Status</span>
                            <!-- <input type="text" class="common_input form-control" name="status" /> -->
                            <select name="status" id="" class="common_input form-control" required>
                                <option value="0">Normal</option>
                                <option value="1">HCU</option>
                                <option value="2">ICU</option>
                            </select>
                        </div>
                        <div class="input_one mb-2 display_top">
                            <span class="input_set_text text_display">Room</span>
                            <input type="text" class="common_input form-control" name="room" />
                        </div>
                        <div class="input_one mb-2 display_top">
                            <span class="input_set_text text_display">Address</span>
                            <input type="text" class="common_input form-control" name="address" />
                        </div>
                        <div class=" mb-2  display_top ">
                            <button type="submit" class="common_btn add_btn input_box display_bottom display_top" name="addbtn">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>