<?php
if (isset($_SESSION["updatedInfo"])) {
  $updateInfo = $_SESSION["updatedInfo"];
  $name =  $updateInfo[0]["register_name"];
  $photo =  $updateInfo[0]["profile_image"];
} else {
  $name = $_SESSION["userName"];
  $photo =  $_SESSION["defaultPhoto"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="emoji.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title> 
  <!-- Boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- cnd-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/fa91b09b37.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg px-3 ">
    <div class="container-fluid">
  <a href="./home1.php" ><img class="vrcarer" src="./storages~origin_main/logo/VR2.png" alt="Vr_Carer" width="104px"> </a>
      <button class="navbar-toggler text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i></button>
      <div class="collapse navbar-collapse navbar_text_div" id="navbarNavAltMarkup">
        <div class="navbar-nav ">
          <a class="navbar_text mt-4  me-5" aria-current="page" href="./home1.php">Home</a>
          <a class="navbar_text mt-4 me-5" href="./doctor.php">Find Doctors</a>
          <a class="navbar_text mt-4 me-5" href="./booking.php">Booking Status</a>
          <a class="navbar_text mt-4 me-5 " href="./blog.php">Blogs</a>
          <a class="navbar_text mt-3 me-4 ">
            <span class="btn btn-outline-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
              <span class="navbarProfileText me-3" class="navbarProfileText">Profile</span>
              <img src="./storages/userprofile/<?= $photo?>" class="profile">
            </span>
          </a>
        </div>
      </div>
    </div>
  </nav>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div id="offcanvas">
      <div class="offcanvasheader mb-4">
        <h5 class="your_profile">Your Profile</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="box">
          <div class="mainbox">
            <a href="../Controller/login,signUp,profile/profileEditController.php
          " class="usersetting"><i class="fa-solid fa-gear"></i></a>
            <br>
            <br>
            <p class="text-center">
              <img src="./storages/userprofile/<?= $photo ?>" class="profile" id="offcanvas_photo">
            </p>
            <span class="text-center offcanvas_text">
              <label for="name" id="name">
                <?= $name ?>
              </label>
              </sp>
              <span class="text-center offcanvas_text">
                <label for="email" id="email">
                  <?= $_SESSION["email"] ?>
                </label>
              </span>
              <br>
              <br>
              <!-- Blue Square Btn -->
              <button class="square_blue_btn"><a href="./patientHistory.php" id="patient_history">Patient History</a></button>
              <br>
              <br>
              <!-- Blue Square Btn -->

              <a href="./login.php" class=" text-white " id="logoutbtn">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
