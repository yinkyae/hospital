<?php

include "../../Model/dbConnection.php";

// Add Home Article
if (isset($_POST["homeArticleAdd"])) {
    $header = $_POST["homeArticleHeader"];
    $paraHeader = $_POST["homeArticleParaHeader"];
    $paragraph = $_POST["homeArticlePara"];
//    $photo = $_POST["homeArticlePhoto"];
    $link = $_POST["pageLink"];

    $file = $_FILES['homeArticlePhoto']['name'];
    $location = $_FILES['homeArticlePhoto']['tmp_name'];
    $extension = pathinfo($file)['extension'];
    $path = $header . "." . $extension;

    if (move_uploaded_file($location, "../../View/storages/article/" . $header . "." . $extension)) {
        $sql = $pdo->prepare(
            "INSERT INTO 
                article (
                header,
                para_header,
                para_text,
                image,
                page_link,
                create_date
                ) 
                VALUES 
                (
                :header,
                :para_header,
                :para_text,
                :image,
                :link,
                :createdDate
                );"
        );
    }

    $sql->bindValue(":header", $header);
    $sql->bindValue(":para_header", $paraHeader);
    $sql->bindValue(":para_text", $paragraph);
    $sql->bindValue(":image", $path);
    $sql->bindValue(":link", $link);
    $sql->bindValue(":createdDate", date("Y/m/d"));

    $sql->execute();
    header("Location: ../../View/article.php");
}
