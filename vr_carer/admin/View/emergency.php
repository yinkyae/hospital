<?php
include("../Controller/emergencyController.php");
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
    <title>Emergency</title>
    <!-- Css -->
    <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
    <link rel="stylesheet" href="./resources/css/emergency.css">
    <link rel="stylesheet" href="./resources/css/pagination.scss">
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
</head>

<body>
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
                        <span class="navbar-brand ttl_admin" href="#">Emergency</span>
                    </div>
                </div>


                <!-- Show Article Table -->
                <section class="first_aid_table mt-4">
                    <table class="table">
                        <thead class="table_bgcolor" id="table_header">
                            <tr>
                                <td>No.</td>
                                <td>Header</td>
                                <td id="img_header">Image</td>
                                <td id="text_header">Description</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="table_text">
                            <?php $number = ($page * $rowLimit) - ($rowLimit - 1) ?>
                            <?php foreach ($emergencyInfo as $emergency) { ?>
                                <tr class="row_bdr">
                                    <td id="number"><?= $number++ ?></td>
                                    <td id="header">
                                        <?= $emergency["article_header"] ?>
                                    </td>
                                    <td id="image">
                                        <img src="./storages/emergency/<?= $emergency["article_image"] ?>" alt="" class="image">
                                    </td>
                                    <td id="text"><?= $emergency["article_text"] ?></td>
                                    <td class="p-3">
                                        <a href="../Controller/emergencyEditController.php?id=<?= $emergency["id"] ?>" class="edit_btn me-4">
                                            Edit</a>
                                        <a href="../Controller/emergencyEditController.php?delId=<?= $emergency["id"] ?>" class="trash "><i class="fa-solid fa-trash"></i></a>
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
                <!-- Add First Aid Tab Form -->
                <section class="first_aid_tab">
                    <form action="../Controller/emergencyController.php" method="POST" class="input_set">
                        <h2 class="input_set_header my-4">Add First Aid Tab</h2>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Header for paragraph</span>
                            <input type="text" class="common_input form-control" name="header" />
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Add new paragraph</span>
                            <textarea class="common_input form-control text_area" placeholder="Text" name="paragraph" >
                            </textarea>
                        </div>
                        <!-- Add Btn -->
                        <button type="submit" name="addEmergencyTab" class="common_btn add_btn">Add</button>
                        <hr />
                    </form>
                </section>
                <!-- Add Article Form -->
                <section class="add_first_aid">
                    <form class="input_set" action="../Controller/emergencyController.php" method="POST" enctype="multipart/form-data">
                        <h2 class="input_set_header my-4">Add First Aid Kit</h2>
                        <div class="input_one mb-2">
                            <span class="input_set_text add_file">Add image</span>
                            <input type="file" name="emergencyImage" class="form-control  common_input "   />
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Header</span>
                            <input name="emergencyHeader" type="text" class="common_input form-control" />
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Add paragraph</span>
                            <textarea name="emergencyParagraph" class="common_input text_area  form-control" placeholder="<ol class='first_aid_para'><li></li></ol>"></textarea>
                        </div>
                        <div class=" mb-2  ">
                            <!-- Add Btn -->
                            <button type="submit" name="addEmergency" href="" class="common_btn add_btn">Add</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>