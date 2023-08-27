<?php
$hostname = "localhost";
$port = "3306";
$dbname = "vr_carer";
$username = "root";
$password = "";
$pdo = new PDO(
    "mysql:host=$hostname;port=$port;dbname=$dbname", 
$username, $password);
