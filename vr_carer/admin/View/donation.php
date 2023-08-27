<?php
include "../Controller/bloodDonationCenter/donationListController.php";
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
    <title>Blood Donation</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Side Bar Menu Copy Here -->
            <?php
            include("./common/nav.php")
            ?>

            <div class="data_box col-sm-9 col-md-8 col-xl-10 mt-3">
                <div class="header_wrapper bg_header ">
                    <div class="header_box">
                        <span class="navbar-brand ttl_admin" href="#">Blood Donation</span>
                    </div>
                </div>
                <section class="center_list">
                    <div class="input_set">
                        <h2 class="input_set_header my-4">Blood Donation Center List</h2>
                    </div>
                    <table class="table">
                        <thead class="table_bgcolor" id="table_header">
                            <tr>
                                <td>No.</td>
                                <td>Center Name</td>
                                <td>Contact</td>
                                <td>Email</td>
                                <td>Address</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            <?php foreach ($centerList as $center) {

                            ?>
                                <tr class="row_bdr">
                                    <td><?php echo ++$count ?></td>
                                    <td><?php echo $center["center_name"] ?></td>
                                    <td><?php echo $center["center_contact"] ?></td>
                                    <td><?php echo $center["center_email"] ?></td>
                                    <td><?php echo $center["center_address"] ?></td>
                                    <td class="p-3">
                                        <a href="../Controller/bloodDonationCenter/EditDonationController.php?id=<?php echo $center["id"] ?>" class="edit_btn me-4">Edit</a>
                                    </td>
                                    <td class="p-3">
                                        <a href="../Controller/bloodDonationCenter/deleteCenterController.php?id=<?php echo $center["id"] ?>" class="trash"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                   <?php
                   include "./common/pagination.php";
                   ?>
                    <hr />
                </section>
                <section class="add_center">
                    <div class="input_set mt-3">
                        <div class="input_set">
                            <h2 class="input_set_header my-4">Add New Blood Donation Center</h2>
                        </div>
                        <form action="../Controller/bloodDonationCenter/addBloodDonation.php" method="post">
                            <div class="form-group row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Center Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control common_input" name="center" placeholder="Center Name">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Contact</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control common_input" name="contact" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control common_input" name="email" placeholder="Center Email">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control common_input text_area" id="exampleFormControlTextarea1" name="address" rows="5" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <button type="submit" name="addCenter" class="btn btn-primary mb-2 w-50">Save</button>
                            </div>
                        </form>

                    </div>
                </section>
                
            </div>
        </div>
    </div>
</body>

</html>