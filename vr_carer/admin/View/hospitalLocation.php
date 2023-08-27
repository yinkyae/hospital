<?php
include("../Controller/hosLocationController.php");
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
  <title>Hospital Location</title>
  <!-- Css -->
  <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?> />
  <link rel="stylesheet" href="./resources/css/hospital_location.css" <?= time() ?> />
  <!-- Boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/0442ff9845.js" crossorigin="anonymous"></script>
  <!-- js -->
  <script src="./resources/js/jquery3.6.0.js"></script>
</head>

<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <!-- Side Bar Menu -->
      <?php
      include("./common/nav.php")
      ?>
      <div class="data_box col-sm-9 col-md-8 col-xl-10 mt-3">
        <!-- Header -->
        <div class="header_wrapper bg_header ">
          <div class="header_box">
            <span class="navbar-brand ttl_admin" href="#">Hospital Location</span>
          </div>
        </div>
        <!-- Hospital List -->
        <table class="table mt-4" id="table-id">
          <thead class="table_bgcolor" id="table_header">
            <tr>
              <td>No.</td>
              <td>Hospital Name</td>
              <td>Contact</td>
              <td id="map_header">Map</td>
              <td>Address</td>
              <td id="email_header">Mail</td>
              <td>Remove </td>
            </tr>
          </thead>
          <tbody>
            <?php $number = ($page * $rowLimit) - ($rowLimit - 1) ?>
            <?php foreach ($hospitalInfo as $hospital) { ?>
              <tr class="row_bdr">
                <td><?= $number++ ?></td>
                <td><?= $hospital["hospital_name"] ?></td>
                <td><?= $hospital["contact"] ?></td>
                <td id="map">
                  <iframe src="<?= $hospital["google_map_image"] ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
                <td><?= $hospital["address"] ?></td>
                <td id="email"><?= $hospital["email"] ?></td>
                </td>
                <td class="p-3">
                  <a href="../Controller/hospitalEditController.php?delId=<?= $hospital["id"] ?>" class="trash "><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>
            <?php }
            ?>
          </tbody>
        </table>
        <!-- Pagination -->
        <?php
        include "./common/pagination.php"
        ?>
        <hr class="about_line mt-5" />
        <!-- Add Hospital Info Form -->
        <form action="../Controller/hosLocationController.php" method="POST" class="input_set">
          <h2 class="input_set_header my-4">Add Hospital</h2>
          <div class="input_one mb-2 display_top">
            <span class="input_set_text text_display">Hospital Name</span>
            <input type="text" name="hospitalName" class="common_input form-control" />
          </div>
          <div class="input_one mb-2 display_top">
            <span class="input_set_text text_display">Address</span>
            <input type="text" name="hospitalAddress" class="common_input form-control" />
          </div>
          <div class="input_one mb-2 display_top">
            <span class="input_set_text text_display">Phone Number</span>
            <input type="text" name="hospitalPhone" class="common_input form-control" />
          </div>
          <div class="input_one mb-2 display_top">
            <span class="input_set_text text_display">Email</span>
            <input type="text" name="hospitalEmail" class="common_input form-control" />
          </div>
          <div class="input_one mb-2 display_top">
            <span class="input_set_text text_display">Google Map</span>
            <textarea id="" class="common_input form-control text_area" placeholder="Only src attribute" name="hospitalMap" rows="5"></textarea>
          </div>
          <div class=" mb-2  display_top ">
            <!-- Add Btn -->
            <button type="submit" class="common_btn add_btn input_box display_bottom display_top" name="hospitalInfo">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>