<?php
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
    <title>Carousel</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
</head>

<body>
    <!-- Side Bar -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Side Bar Menu Copy Here -->
            <?php
            include("./common/nav.php")
            ?>
            <div class=" data_box   col-sm-9  col-md-8 col-xl-10 mt-3">
                <div class="header_wrapper bg_header ">
                    <div class="header_box">
                        <span class="navbar-brand ttl_admin" href="#">Carousel</span>
                    </div>
                </div>
                <form class="input_set" action="../Controller/carouselController.php" method="POST"  enctype="multipart/form-data">
                    <h2 class="input_set_header my-4">Edit Carousel Image</h2>
                    <div class="input_one mb-2">
                        <span class="input_set_text add_file">Carousel Image 1</span>
                        <input type="file"  class="form-control  common_input " name="carousel_1"  />
                    </div>
                    <div class="input_one mb-2">
                        <span class="input_set_text add_file">Carousel Image 2</span>
                        <input type="file" id="formFileLg" class="form-control  common_input " name="carousel_2" accept="image/*" />
                    </div>
                    <div class="input_one mb-2">
                        <span class="input_set_text add_file">Carousel Image 3</span>
                        <input type="file" id="formFileLg" class="form-control  common_input " name="carousel_3" accept="image/*" />
                    </div>
                    <div class="input_one mb-2">
                        <span class="input_set_text add_file">Carousel Image 4</span>
                        <input type="file" id="formFileLg" class="form-control common_input " name="carousel_4" accept="image/*" />
                    </div>
                    <div class=" mb-2  ">
                        <!-- Add Btn -->
                        <button type="submit" class="common_btn add_btn" name="carouselUpdate" >Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
