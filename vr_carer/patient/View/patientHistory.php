<?php
session_start();
if (!isset($_SESSION["email"])) {
  header("Location: ./login.php");
}
include "../Controller/patientHistoryController.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" sizes="32x32" href="./storages/logo/VR1.png" />
  <title>Patient History</title>
  <!--css-->
  <link rel="stylesheet" href="./resources/css/root.css?v=" <?= time() ?>>
  <link rel="stylesheet" href="./resources/css/patientHistory.css?v" <?= time() ?>>

  <!-- Pdf Download -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <!-- JS -->

  <script src="./resources/js/jquery3.6.0.js"></script>
  <script src="./resources/js/patientHIstory.js" defer></script>
</head>

<body>
  <?php
  include("./common/head.php");
  ?>
  <!-- hospital location Header -->
  <h3 class="hospital_location_header text-center text-white mt-3">Patient History</h3>
  <button class="d-block mx-auto my-4" id="download">Download History</button>
  <div id="pdf_download">


    <p class=" fw-bold email_text">Email : <?= $_SESSION["email"] ?> / From VR Carer</p>

    <table class="table  mt-3">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Patient Name</th>
          <th scope="col">Doctor Name</th>
          <th scope="col">Booking Date</th>
          <th scope="col">Disease</th>
          <th scope="col">Medicine</th>
          <th scope="col">Next Appointment</th>
          <th scope="col">Symptoms</th>
          <th scope="col">To Avoid</th>
        </tr>
      </thead>
      <tbody>
        <?php $number = 1 ?>
        <?php foreach ($history as $userHistory) { ?>
          <tr>
            <th scope="row"><?= $number++ ?></th>
            <td><?= $userHistory["patient_name"] ?></td>
            <td><?= $userHistory["doctor_name"] ?></td>
            <td id="booking_date"><?= $userHistory["booking_date"] ?></td>
            <td><?= $userHistory["disease"] ?></td>
            <td><?= $userHistory["medicine"] ?></td>
            <td><?php
                if ($userHistory["next_appointment_date"] != "") {
                  echo $userHistory["next_appointment_date"];
                } else {
                  echo "-";
                }
                ?></td>
            <td>
              <?= $userHistory["symptoms"] ?>
            </td>
            <td>
              <?php
              if ($userHistory["to_avoid"] != "") {
                echo $userHistory["to_avoid"];
              } else {
                echo "-";
              }
              ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

<!-- 
    <div class="historyCard">
      <?php foreach ($history as $userHistory) { ?>
        <div class="history_card">
          <p>No. <span><?= $number++ ?></span> </p>
          <p>Patient Name <span><?= $userHistory["patient_name"] ?></span> </p>
          <p>Booking Date<span><?= $userHistory["doctor_name"] ?></span> </p>
          <p>Disease<span>1</span> </p>
          <p>Medicine<span>1</span> </p>
          <p>Next Appointment<span>1</span> </p>
          <p>Symptons<span>1</span> </p>
          <p>To Avoid<span>1</span> </p>
        </div>
      <?php } ?>
    </div>-->
  </div> 

  <br>
  <br>

  <br>
  <!-- Footer -->
  <?php
  include("./common/footer.php")
  ?>
</body>

</html>
