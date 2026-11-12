<?php

$conn = new mysqli("sql213.infinityfree.com", "if0_43398010", "ANBU122004", "if0_43398010_contact_db");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>