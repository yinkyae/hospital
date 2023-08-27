<?php
session_start();
if (isset($_SESSION["blogInfo"])) {
    $blogInfo = $_SESSION["blogInfo"];
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
    <title>Add Patient</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
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
                        <span class="navbar-brand ttl_admin" href="#">Edit Blog</span>
                    </div>
                </div>
                <div class="sec_input mb-2">
                    <a href="./blog.php" class="common_btn add_btn back_btn">Back to Blogs Page
                        <i class="fa-solid fa-arrow-left arrow_left"></i>
                    </a>
                </div>
                <!--Add Form -->
                <div class="m-3 d-flex justify-content-center border border-primary rounded">
                    <form action="../Controller/blog/updateBlogController.php" method="post" enctype="multipart/form-data">
                        <div class="image-box d-flex justify-content-center m-3">
                            <img src="./storages/blog/<?php echo $blogInfo[0]["image"] ?>" alt="" width="100" id="image" class="rounded-circle">
                        </div>
                        <div class="form-group row mb-3">
                            <label for="formFileMultiple" class="col-sm-2">Image</label>
                            <div class=" col-sm-10">
                                <input class="form-control common_input" type="file" id="uploadFile" name="uploadFile" onchange="setImage()" />
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">header</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control common_input" name="header" placeholder="header" value="<?php echo $blogInfo[0]["header"] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Warning</label>
                            <div class="col-sm-10">
                                <textarea class="form-control common_input text_area" id="exampleFormControlTextarea1" name="description" rows="5"><?php echo $blogInfo[0]["description"] ?></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $blogInfo[0]["id"] ?>">
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" name="updateBlog" class="btn btn-primary mb-2 w-50">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>