<?php
include "../Controller/blog/listBlogController.php";
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
    <title>Blog</title>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
    <!-- Css -->
    <link rel="stylesheet" href="../View/resources/css/root.css" />
    <link rel="stylesheet" href="../View/resources/css/blog.css" />
    <script src="./resources/js/blog.js" defer></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Side Bar Menu Copy Here -->
            <?php
            include("./common/nav.php");

            ?>

            <div class=" data_box  col-sm-9  col-md-8 col-xl-10 mt-3">
                <!-- header -->
                <div class="header_wrapper bg_header ">
                    <div class="header_box">
                        <span class="navbar-brand ttl_admin" href="#">Blogs</span>
                    </div>
                </div>
                <!-- Table -->
                <section class="diseases_table">
                    <div class="input_set">
                        <h2 class="input_set_header my-4"> Current Diseases</h2>
                    </div>
                    <table class="table">
                        <thead class="table_bgcolor" id="table_header">
                            <tr>
                                <td>No.</td>
                                <td>Image</td>
                                <td>Header</td>
                                <td>Description</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = ($page * $rowLimit) - ($rowLimit - 1) ?>
                            <?php foreach ($blogList as $blog) {

                            ?>
                                <tr class="row_bdr">
                                    <td><?= $number++ ?></td>
                                    <td>
                                        <img src="./storages/blog/<?php echo $blog["image"] ?>" alt="" width="100">
                                    </td>
                                    <td><?php echo $blog["header"] ?></td>
                                    <td class="desc"><?php echo $blog["description"] ?></td>
                                    <td class="p-3">
                                        <a href="../Controller/blog/editBlogController.php?id=<?php echo $blog["id"] ?>" class="edit_btn">Edit</a>
                                    </td>
                                    <td class="p-3"><a href="../Controller/blog/deleteblog.php?id=<?php echo $blog["id"] ?>" class="trash "><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    include "./common/pagination.php"
                    ?>
                    <hr />
                </section>
                <!--Add Form -->
                <div class="input_set">
                    <h2 class="input_set_header my-4">Add Current Diseases</h2>
                </div>
                <div class="m-3 d-flex justify-content-center">
                    <form action="../Controller/blog/addBlogController.php" method="post" enctype="multipart/form-data">
                        <div class="image-box d-flex justify-content-center mb-3">
                            <img src="./storages/blog/default.png" alt="" width="100" id="image" class="rounded-circle">
                        </div>
                        <div class="form-group row mb-3">
                            <label for="formFileMultiple" class="col-sm-2">Image</label>
                            <div class=" col-sm-10">
                                <input class="form-control common_input" type="file" id="uploadFile" name="uploadFile" onchange="setImage()" required />
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">header</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control common_input" name="header" placeholder="header">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Causes</label>
                            <div class="col-sm-10">
                                <textarea class="form-control common_input text_area" id="exampleFormControlTextarea1" name="description" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" name="addDieses" class="btn btn-primary mb-2 w-30">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>