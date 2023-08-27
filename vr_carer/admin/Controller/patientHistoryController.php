<?php
include "../Model/dbConnection.php";
session_start();

if (isset($_GET["id"])) {
    $patientId = $_GET["id"];
    $sql = $pdo->prepare(
        "SELECT * FROM booking WHERE id=:id "
    );
    $sql->bindValue(":id", $patientId);
    $sql->execute();
    $patientInfo = $sql->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION["patientInfoHistory"] = $patientInfo;
    header("Location: ../View/historyAdd.php");
}



// Add History
if (isset($_POST["addHistory"])) {
    $name = $_POST["patientName"];
    $email = $_SESSION["email"] ;
    $date = $_POST["dateBooking"];
    $doctorName = $_POST["doctorName"];
    $diseaseHistory = $_POST["diseaseHistory"];
    $medicine = $_POST["medicineHistory"];
    $nextAppointment = $_POST["nextAppointment"];
    $symptoms = $_POST["symptoms"];
    $avoid = $_POST["avoid"];
    $sql = $pdo->prepare(
        "INSERT INTO 
        patient_history (
        patient_name,
        email,
        doctor_name,
        booking_date,
        disease,
        medicine,
        next_appointment_date,
        symptoms,
        to_avoid,
        create_date
        ) 
        VALUES 
        (
        :patient_name,
        :email,
        :doctor_name,
        :booking_date,
        :disease,
        :medicine,
        :next_appointment_date,
        :symptoms,
        :to_avoid,
        :createdDate
        );"
    );
    $sql->bindValue(":patient_name", $name);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":doctor_name", $doctorName);
    $sql->bindValue(":booking_date", $date);
    $sql->bindValue(":disease", $diseaseHistory);
    $sql->bindValue(":medicine", $medicine);
    $sql->bindValue(":next_appointment_date", $nextAppointment);
    $sql->bindValue(":symptoms", $symptoms);
    $sql->bindValue(":to_avoid", $avoid);
    $sql->bindValue(":createdDate", date("Y/m/d"));

    $sql->execute();

    if (isset($_SESSION["patientInfoHistory"])) {
        $patientInfo = $_SESSION["patientInfoHistory"];
        $id = $patientInfo[0]["id"];
        $sql = $pdo->prepare(
            "UPDATE booking SET
                history=:history,
                update_date=:update_date
                 WHERE id=:id
                "
        );
        $sql->bindValue(":history",1);
        $sql->bindValue(":id",$id);
        $sql->bindValue(":update_date", date("Y/m/d"));
        $sql->execute();
    }

    

    header("Location: ../View/patientHistory.php");
} else {
    echo "<script>
    alert ('Error');
    </script>";
}

