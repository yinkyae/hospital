<?php
include("../Model/dbConnection.php");
session_start();

// Get article info for Update
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $pdo->prepare(
        "SELECT * FROM `article` WHERE id=:id
        "
    );
    $sql->bindValue(":id", $id);
    $sql->execute();
    $articleInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION["homeArticleInfo"] = $articleInfo;
    header("Location: ../View/articleEdit.php");
}

// Update Article
if (isset($_POST["homeArticleEdit"])) {
    $id = $_POST["homeArticleId"];
    $link = $_POST["pageLink"];
    $articlePara = $_POST["homeArticlePara"];
    $articleParaHeader = $_POST["homeArticleParaHeader"];
    $articleHeader = $_POST["homeArticleHeader"];


    if ($_FILES["homeArticlePhoto"]["name"] == "") {
        $sql = $pdo->prepare(
            "UPDATE
            article SET 
            header=:header,
            para_header=:para_header,
            para_text=:para_text,
            page_link=:page_link,
            update_date=:updatedDate WHERE id=:id"
        );
    } else {
        $file = $_FILES['homeArticlePhoto']['name'];
        $location = $_FILES['homeArticlePhoto']['tmp_name'];
        $extension = pathinfo($file)['extension'];
        $path = $id  . "." . $extension;

        if (move_uploaded_file($location, "../View/storages/article/" . $id . "." . $extension)) {
            $sql = $pdo->prepare(
                "UPDATE
            article SET 
            header=:header,
            para_header=:para_header,
            para_text=:para_text,
            image=:image,
            page_link=:page_link,
            update_date=:updatedDate WHERE id=:id"
            );
            $sql->bindValue(":image", $path);
        } else {
            echo 'There was some error moving the file to upload directory.';
        }
    }


    $sql->bindValue(":id", $id);
    $sql->bindValue(":header", $articleHeader);
    $sql->bindValue(":para_header", $articleParaHeader);
    $sql->bindValue(":para_text", $articlePara);
    $sql->bindValue(":page_link", $link);

    $sql->bindValue(":updatedDate", date("Y/m/d"));

    $sql->execute();

    header("Location: ../View/article.php");
}

// Delete Article
if (isset($_GET["delId"])) {
    $id = $_GET["delId"];

    echo $id;

    $sql = $pdo->prepare(
        "UPDATE article SET 
    del_flg = 1
     WHERE id=:id"
    );
    $sql->bindValue(":id", $id);

    $sql->execute();

    header("Location: ../View/article.php");
}
