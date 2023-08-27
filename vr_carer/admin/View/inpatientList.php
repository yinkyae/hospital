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
    <title>Inpatient</title>
    <!-- Css root -->
    <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
    <link rel="stylesheet" href="./resources/css/inpatientList.css?v=" <?= time() ?> />
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
    <!-- js -->
    <script src="./resources/js/jquery3.6.0.js"></script>
    <script src="./resources/js/inpatientSearch.js"  defer></script>
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
                        <span class="navbar-brand ttl_admin" href="#">Inpatient List</span>
                    </div>
                </div>
                <div class="sec_input mb-2">
                    <a href="./addInpatient.php" class="common_btn add_btn go_btn">Go to Add Inpatient
                        <i class="fa-solid fa-arrow-right arrow_right"></i>
                    </a>
                    <div class="searchbox search">
                        <input type="text" class="search_input  ps-5" id="searchText" name="text" />
                        <i class="fa-solid fa-magnifying-glass search_icon text_white"></i>
                        <button id="search" class="search_text" name="searchbtn">Search</button>
                    </div>
                </div>
                <button id="allInpatient" class="sec_input mb-2 common_btn add_btn">All Inpatients List</button>
                <div class="input_set">
                    <h2 class="input_set_header my-4">Inpatient List</h2>
                </div>
                <table class="table">
                    <thead class="table_bgcolor" id="table_header">
                        <tr>
                            <td>No.</td>
                            <td>Date</td>
                            <td>Name</td>
                            <td>Age</td>
                            <td>Disease</td>
                            <td>Status</td>
                            <td>Room</td>
                            <td>address</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="table_text">
                        <?php $number = 1 ?>
                        <?php foreach ($inpatient as $ipatient) { ?>
                            <tr class="row_bdr">
                                <td><?= $number++ ?></td>
                                <td><?= $ipatient["hospitalized_date"] ?></td>
                                <td><?= $ipatient["name"] ?></td>
                                <td><?= $ipatient["age"] ?></td>
                                <td><?= $ipatient["disease"] ?></td>
                                
                                <?php if ($ipatient["status"] == "0") { ?>
                                    <td style="color:#45B649; font-weight:bold"><?php echo "Normal" ?></td>
                                <?php } else if ($ipatient["status"] == "1") { ?>
                                    <td style="color:#fceabb; font-weight:bold"><?php echo "HCU" ?></td>
                                <?php } else { ?>
                                    <td style="color:#F00000; font-weight:bold"><?php echo "ICU" ?></td>
                                <?php } ?>
                                <td><?= $ipatient["room"] ?></td>
                                <td><?= $ipatient["address"] ?></td>
                                <td class="p-3">
                                        <a href="../Controller/inpatientEditController.php?id=<?= $ipatient["id"] ?>" class="edit_btn me-4">
                                            Edit</a>
                                        <a href="../Controller/inpatientEditController.php?delId=<?= $ipatient["id"] ?>" class="trash "><i class="fa-solid fa-trash"></i></a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- Pagination -->
                <?php
                    include "./common/pagination.php"
                    ?>
                <hr class="about_line mt-5" />
            </div>
        </div>
    </div>
</body>

</html>