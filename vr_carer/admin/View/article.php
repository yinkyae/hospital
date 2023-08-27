<?php
include("../Controller/article/articleInfoController.php");
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
    <title>Article</title>
    <!-- Css -->
    <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
    <link rel="stylesheet" href="./resources/css/article.css">
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
                        <span class="navbar-brand ttl_admin" href="#">Home Articles</span>
                    </div>
                </div>

                <!-- Show Article Table -->
                <section class="first_aid_table mt-4">
                    <table class="table">
                        <thead class="table_bgcolor" id="table_header">
                            <tr>
                                <td>No.</td>
                                <td>Header</td>
                                <td>Header for paragraph</td>
                                <td>Paragraph</td>
                                <td id="img_header">Image</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="table_text">
                        <?php $number = ($page * $rowLimit) - ($rowLimit - 1) ?>
                            <?php foreach ($homeArticleInfo as $info) { ?>
                                <tr>
                                    <td id="number"><?= $number++ ?></td>
                                    <td><?= $info["header"] ?></td>
                                    <td id="paraHeader"> <?= $info["para_header"] ?></td>
                                    <td id="paragraph"><?= $info["para_text"] ?></td>
                                    <td id="image"><img src="./storages/article/<?= $info["image"] ?>" alt="" class="image"></td>
                                    <td class="pt-3">
                                        <a href="../Controller/articleEditController.php?id=<?= $info["id"] ?>" class="edit_btn me-4 mt-3">
                                            Edit</a>
                                        <a href="../Controller/articleEditController.php?delId=<?= $info["id"] ?>" class="trash "><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                    </span>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    include "./common/pagination.php"
                    ?>
                    <hr />
                </section>


                <!-- Add First Aid Tab Form -->
                <section class="first_aid_tab">
                    <form action="../Controller/article/articleController.php" method="POST"  enctype="multipart/form-data" class="input_set">
                        <h2 class="input_set_header my-4">Add New Article</h2>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Header </span>
                            <input type="text" class="common_input form-control" name="homeArticleHeader" required />
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Header for paragraph</span>
                            <input type="text" class="common_input form-control" name="homeArticleParaHeader" required />
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Text for paragraph</span>
                            <textarea class="common_input form-control text_area" placeholder="Text" name="homeArticlePara" required></textarea>
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Page Link Name</span>
                            <textarea class="common_input form-control text_area" placeholder="Text" name="pageLink" required></textarea>
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text add_file">Article Photo</span>
                            <input type="file"  class="form-control common_input"  name="homeArticlePhoto" id="file_input" onchange="setImage()"  required />
                        </div>
                        <!-- Add Btn -->
                        <button type="submit" name="homeArticleAdd" class="common_btn add_btn">Add</button>
                        <hr />
                    </form>
                </section>

            </div>
        </div>
    </div>
</body>

</html>