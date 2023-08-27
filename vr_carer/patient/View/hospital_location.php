<?php
session_start();
include("../Controller/hospitalLocations/hospitalLocationController.php");
if (!isset($_SESSION["email"])) {
  header("Location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" sizes="32x32" href="./storages/logo/VR1.png" />
  <title>Hospital Locations</title>
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Source+Sans+Pro&display=swap" rel="stylesheet">

  <!-- Css Root  -->
  <link rel="stylesheet" href="./resources/css/root.css">
  <!-- Css -->
  <link rel="stylesheet" href="./resources/css/hospital_location.css?v=" <?php echo time() ?>>
  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Js -->
  <script src="./resources/js/jquery3.6.0.js"></script>
  <script src="./resources/js/hospital.js" defer></script>

</head>

<body>
  <!-- Header -->
  <?php
  include("./common/head.php");
  ?>

  <div class="searcBox mt-3 ms-3">
    <input type="text" id="searchHospital">
    <button id="search">Search</button>
    <br>
    <button id="allHospital" class="mt-3">Show All Hospitals</button>

  </div>

  <div id="hospitalCard">
    <?php foreach ($hospitalInfo as $hospital) { ?>
      <div class="card_wrapper mb-5">
        <h2 data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000" class="text-center text-white my-4 fw-bold" id="hosname"><?= $hospital["hospital_name"] ?></h2>
        <div class="location_box">
          <div class="map_image ">
            <div class="map">
              <iframe src="<?= $hospital["google_map_image"] ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
            </div>
          </div>
          <div class="hospitalInfo mt-3">
            <p class="yellow_color  location_data"> Hospital Name : <span class="white_color">
                <?= $hospital["hospital_name"] ?>
              </span>
            </p>
            <p class="yellow_color  location_data">Address :
              <span class="white_color">
                <?= $hospital["address"] ?>
              </span>
            </p>
            <p class="yellow_color  location_data ">Phone Number :
              <span class="white_color"><?= $hospital["contact"] ?></span>
            </p>
            <p class="yellow_color  location_data">Email :
              <span class="white_color"><?= $hospital["email"] ?></span>
            </p>
          </div>

        </div>
        <hr class="line ">
      </div>
      <br>
    <?php }
    ?>
  </div>







  <!-- Footer -->
  <?php
  include("./common/footer.php")
  ?>

  <script>
    AOS.init();
  </script>
</body>



</html>
