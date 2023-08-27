<?php
$hostname = "vr-carer-ykw-do-user-14558665-0.b.db.ondigitalocean.com";
$port = "25060";
$dbname = "vr_carer";
$username = "doadmin";
$password = "AVNS_m-RTT37nVjprBga87zK";
$pdo = new PDO(
    "mysql:host=$hostname;port=$port;dbname=$dbname",
    $username,
    $password
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
