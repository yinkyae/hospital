<?php
session_start();
if (isset($_SESSION["centerInfo"])) {
    //print_r($_SESSION["centerInfo"]);
    $editCenter = $_SESSION["centerInfo"];
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
    <title>Edit Blog Center</title>

    <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
    <script src="./resources/js/editblog.js" defer></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Side Bar Menu Copy Here -->
            <?php
            include("./common/nav.php")
            ?>

            <div class=" data_box   col-sm-9  col-md-8 col-xl-10 mt-3">
                <!-- Header -->
                <div class="header_wrapper bg_header ">
                    <div class="header_box">
                        <span class="navbar-brand ttl_admin" href="#">EDIT BLOOD CENTER INFORMATION</span>
                    </div>
                </div>
                <div class="sec_input mb-2">
                    <a href="./donation.php" class="common_btn add_btn back_btn">Go to Center Info
                        <i class="fa-solid fa-arrow-left arrow_left"></i>
                    </a>
                </div>
                <!--Add Form -->
                <div class="m-3 d-flex justify-content-center border border-primary rounded">
                    <form action="../Controller/bloodDonationCenter/updateCentercontroller.php" method="post">
                        <div class="form-group row mb-3 mt-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Center Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control common_input" name="center" placeholder="header" value="<?php echo $editCenter[0]["center_name"] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Contact</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control common_input" name="contact" placeholder="header" value="<?php echo $editCenter[0]["center_contact"] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control common_input" name="email" placeholder="header" value="<?php echo $editCenter[0]["center_email"] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control common_input text_area" id="exampleFormControlTextarea1" name="address" rows="5"><?php echo $editCenter[0]["center_address"] ?></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $editCenter[0]["id"] ?>">
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" name="updateCenter" class="btn btn-primary mb-2 w-50">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>