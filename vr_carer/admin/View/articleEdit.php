<?php
include("../Controller/articleEditController.php");
if(isset($_SESSION["homeArticleInfo"])){
    $info = $_SESSION["homeArticleInfo"];
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
                        <span class="navbar-brand ttl_admin" href="#">Edit Articles</span>
                    </div>
                </div>

                <!-- Go Back Button -->
                <div class="sec_input mb-2">
                    <a href="./article.php" class="common_btn add_btn back_btn">Back to Article List
                        <i class="fa-solid fa-arrow-left arrow_left"></i>
                    </a>
                </div>

                <!-- Add First Aid Tab Form -->
                <section class="first_aid_tab">
                    <form action="../Controller/articleEditController.php" method="POST" enctype="multipart/form-data" class="input_set">
                        <h2 class="input_set_header my-4">Edit New Article</h2>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Header </span>
                            <input type="text" class="common_input form-control" name="homeArticleHeader" required value="<?= $info[0]["header"] ?>" />
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Header for paragraph</span>
                            <input type="text" class="common_input form-control" name="homeArticleParaHeader" required  value="<?= $info[0]["para_header"] ?>" />
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Text for paragraph</span>
                            <textarea class="common_input form-control text_area" placeholder="Text" name="homeArticlePara" required ><?= $info[0]["para_text"] ?></textarea>
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text">Page Link Name</span>
                            <textarea class="common_input form-control text_area" placeholder="Text" name="pageLink" required ><?= $info[0]["page_link"] ?></textarea>
                        </div>
                        <div class="input_one mb-2">
                            <span class="input_set_text add_file">Article Photo</span>
                            <input type="file" class="form-control common_input" name="homeArticlePhoto" id="file_input" onchange="setImage()"  value="<?= $info[0]["image"] ?>" />
                        </div>
                        <input type="hidden" name="homeArticleId" value="<?= $info[0]["id"] ?>">
                        <!-- Add Btn -->
                        <button type="submit" name="homeArticleEdit" class="common_btn add_btn">Update</button>
                        <hr />
                    </form>
                </section>

            </div>
        </div>
    </div>
</body>

</html>