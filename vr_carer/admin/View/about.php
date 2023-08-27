<?php
include("../Controller/aboutusController.php");
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
    <title>About Us</title>
    <!-- Css root -->
    <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
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
            <div class="col-sm-9  col-md-8 col-xl-10 mt-3">
                <form action="../Controller/aboutusController.php" method="post" enctype="multipart/form-data">
                    <!-- Header -->
                    <div class="header_wrapper bg_header ">
                        <div class="header_box">
                            <span class="navbar-brand ttl_admin" href="#">About Us and Privacy Policy</span>
                        </div>
                    </div>
                    <section class="about">
                        <div class="input_set">
                            <h2 class="input_set_header my-4">Update About Us Info</h2>
                            <div class="input_one mb-2">
                                <span class="input_set_text">Add new info</span>
                                <textarea class="form-control common_input text_area " placeholder="Text" name="text1" value="<?php echo $about[0]["text1"] ?>"></textarea>
                            </div>
                            <div class="input_one mb-2">
                                <span class="input_set_text">Header for paragraph</span>
                                <input type="text" class="common_input form-control" name="header" />
                            </div>
                            <div class="input_one mb-2">
                                <span class="input_set_text">Add new paragraph</span>
                                <textarea class=" form-control common_input text_area" placeholder="Text" name="text2"></textarea>

                            </div>
                            <div class="input_one mb-2">
                                <span class="input_set_text add_file">Add new image</span>
                                <input type="file" id="formFileLg" class="form-control form-control-lg common_input " accept="image/*" name="image2" />
                            </div>
                            <div class="mb-2  ">
                                <!-- Add Btn -->
                                <button type="submit" class="common_btn add_btn" name="update">Update</button>
                            </div>
                            <hr />
                        </div>


                    </section>

                    <section class="policy">
                        <div class="input_set">
                            <h2 class="input_set_header my-4">Update Privacy Policy Info</h2>
                            <div class="input_one mb-2">
                                <span class="input_set_text">Add new Privacy Policy info</span>
                                <textarea class="text_area common_input form-control" placeholder="Text" name="policy_text"></textarea>
                            </div>
                            <div class=" mb-2  ">
                                <!-- Add Btn -->
                                <button type="submit" class="common_btn add_btn" name="update2">Update</button>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
</body>

</html>