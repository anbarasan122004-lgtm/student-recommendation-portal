<?php

$host = "sql213.infinityfree.com";
$username = "if0_43398010";
$password = "ANBU122004";
$database = "if0_43398010_cs_department_db";

$conn = mysqli_connect(
    $host,
    $username,
    $password,
    $database
);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>