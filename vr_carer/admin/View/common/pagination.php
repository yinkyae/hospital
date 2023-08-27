<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Header</title>
    <!-- CSS File -->
    <link rel="stylesheet" href="../resources/css/root.css" />
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if ($totalPages < 3) { ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item pagination_li
                            <?php if ($page <= 1) {
                                echo "disabled";
                            } ?>
                            ">

                    <a class="page-link pagination_item" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true"><i class="fa-solid fa-angles-left"></i></span>
                    </a>
                </li>

                <li class="page-item pagination_li ">
                    <span class="page-link pagination_item" href="">
                        <?= $page ?>/<?= $totalPages ?>
                    </span>
                </li>


                <li class="page-item pagination_li  
                            <?php if ($page >= $totalPages) {
                                echo "disabled";
                            } ?>
                            ">
                    <a class="page-link pagination_item" href="?page=<?= $page + 1 ?>" aria-label="Next">
                        <span aria-hidden="true"><i class="fa-solid fa-angles-right"></i></span>
                    </a>
                </li>
            </ul>
        </nav>
    <?php
    } else { ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item 
                            <?php if ($page <= 1) {
                                echo "disabled";
                            } ?>
                            ">

                    <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true"><i class="fa-solid fa-angles-left"></i></span>
                    </a>
                </li>

                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item 
                                <?php
                                if ($page == $i) {
                                    echo "active";
                                }
                                ?>
                                "><a class="page-link 
                                " href="?page=<?= $i ?>"><?= $i ?></a></li>
                <?php } ?>


                <li class="page-item   
                            <?php if ($page >= $totalPages) {
                                echo "disabled";
                            } ?>
                            ">
                    <a class="page-link " href="?page=<?= $page + 1 ?>" aria-label="Next">
                        <span aria-hidden="true"><i class="fa-solid fa-angles-right"></i></span>
                    </a>
                </li>
            </ul>
        </nav>
    <?php
    }
    ?>
</body>

</html>