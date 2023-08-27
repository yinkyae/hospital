<?php
include("../Controller/medicineInfoController.php");
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
    <title>Add Medicine</title>
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
                        <span class="navbar-brand ttl_admin" href="#">Add Medicine</span>
                    </div>
                </div>
                <section class="medicine_table">
                    <div class="input_set">
                        <h2 class="input_set_header my-4">Medicine List</h2>
                    </div>
                    <table class="table">
                        <thead class="table_bgcolor" id="table_header">
                            <tr>
                                <td>No.</td>
                                <td>Medicine Name</td>
                                <td>Description</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = ($page * $rowLimit) - ($rowLimit - 1) ?>
                            <?php foreach ($medicineInfo as $medicine) { ?>
                                <tr class="row_bdr">
                                    <td><?= $number++ ?></td>
                                    <td><?= $medicine["medicine_name"] ?></td>
                                    <td><?= $medicine["description"] ?></td>
                                    <td class="p-3">
                                        <a href="../Controller/medicineController.php?delId=<?= $medicine["id"] ?>" class="trash "><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    include "./common/pagination.php"
                    ?>
                    <hr />
                </section>
                <section class="add_medicine">
                    <form action="../Controller/medicineController.php" method="post" enctype="multipart/form-data">
                        <div class="input_set">
                            <h2 class="input_set_header my-4">Add Medicine</h2>
                            <div class="input_one mb-2">
                                <span class="input_set_text">Medicine Name</span>
                                <input type="text" name="name" class="common_input form-control" />
                            </div>
                            <div class="input_one mb-2">
                                <span class="input_set_text">Description</span>
                                <textarea class="common_input form-control text_area" name="description" placeholder="Text"></textarea>
                            </div>
                            <div class="input_one mb-2">
                                <span class="input_set_text add_file">Add Medicine Image</span>
                                <input type="file" name="medicineImg" class="form-control common_input " />
                            </div>
                            <div class=" mb-2  ">
                                <!-- Add Btn -->
                                <button type="submit" name="addMedicine" class="common_btn add_btn">Add</button>

                            </div>
                        </div>
                    </form>
                </section>
            </div>

        </div>
    </div>
</body>

</html>