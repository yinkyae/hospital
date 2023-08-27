 <?php
    include "../../Model/dbConnection.php";
    session_start();
    $userEmail = $_SESSION["email"];
    //echo $userEmail;
    if (isset($_POST["makeBooking"])) {

        $patientId = $_POST["id"];
        $name = $_POST["patient"];
        $email = $_POST["email"];
        $age = $_POST["age"];
        $address = $_POST["address"];
        $contact = $_POST["contact"];
        $remark = $_POST["remark"];
        $date = $_POST["date"];
        $doctor = $_POST["doctor"];
        $doctorId = $_POST["doctorId"];
        $special = $_POST["speciality"];

        $sql = $pdo->prepare(
            "SELECT doctor_id FROM booking WHERE email = :useremail AND history=0"
        );
        $sql->bindValue(":useremail", $userEmail);
        $sql->execute();
        $check = $sql->fetchAll(PDO::FETCH_ASSOC);

        if ((count($check) == 0)) {
            $sql = $pdo->prepare(
                "INSERT INTO booking
            (
                date,
                doctor_id,
                doctor_name,
                speciality,
                patient_status,
                patient_id,
                patient_name,
                email,
                address,
                contact,
                age,
                created_date

            ) 
            VALUES 
            (
                :date,
                :doctor_id,
                :doctor_name,
                :speciality,
                :patient_status,
                :patient_id,
                :patient_name,
                :email,
                :address,
                :contact,
                :age,
                :created_date
            )"
            );

            $sql->bindValue(":date", $date);
            $sql->bindValue(":doctor_id", $doctorId);
            $sql->bindValue(":doctor_name", $doctor);
            $sql->bindValue(":speciality", $special);
            $sql->bindValue(":patient_status", $remark);
            $sql->bindValue(":patient_id", $patientId);
            $sql->bindValue(":patient_name", $name);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":address", $address);
            $sql->bindValue(":contact", $contact);
            $sql->bindValue(":age", $age);
            $sql->bindValue(":created_date", date("Y/m/d"));
            $sql->execute();

            $_SESSION["bookingSuccess"] = "bookingSuccess";
            header("Location: ../../View/appointment.php");
        } else {
            $count = 0;
            for ($i = 0; $i < count($check); $i++) {
                if ($check[$i]["doctor_id"] == $doctorId) $count++;
            }
            if ($count == 0) {
                $sql = $pdo->prepare(
                    "INSERT INTO booking
                (
                    date,
                    doctor_id,
                    doctor_name,
                    speciality,
                    patient_status,
                    patient_id,
                    patient_name,
                    email,
                    address,
                    contact,
                    age,
                    created_date
    
                ) 
                VALUES 
                (
                    :date,
                    :doctor_id,
                    :doctor_name,
                    :speciality,
                    :patient_status,
                    :patient_id,
                    :patient_name,
                    :email,
                    :address,
                    :contact,
                    :age,
                    :created_date
                )"
                );

                $sql->bindValue(":date", $date);
                $sql->bindValue(":doctor_id", $doctorId);
                $sql->bindValue(":doctor_name", $doctor);
                $sql->bindValue(":speciality", $special);
                $sql->bindValue(":patient_status", $remark);
                $sql->bindValue(":patient_id", $patientId);
                $sql->bindValue(":patient_name", $name);
                $sql->bindValue(":email", $email);
                $sql->bindValue(":address", $address);
                $sql->bindValue(":contact", $contact);
                $sql->bindValue(":age", $age);
                $sql->bindValue(":created_date", date("Y/m/d"));
                $sql->execute();
                $_SESSION["bookingSuccess"] = "bookingSuccess";
                header("Location: ../../View/appointment.php");
            } else {
                header("Location: ../../View/appointment.php");
                $_SESSION["alreadyBookedDoctor"] = "Already Book This Doctor! ";
            }
        }
    }
