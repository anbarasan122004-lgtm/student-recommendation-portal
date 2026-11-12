<?php

$servername = "sql213.infinityfree.com";
$username = "if0_43398010";
$password = "ANBU122004";
$database = "if0_43398010_employee_db";

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$department = $_POST['department'];
$salary = $_POST['salary'];
$joining_date = $_POST['joining_date'];

// Insert data into employees table
$sql = "INSERT INTO employees 
        (name, email, phone, department, salary, joining_date)
        VALUES (?, ?, ?, ?, ?, ?)";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssssis",
    $name,
    $email,
    $phone,
    $department,
    $salary,
    $joining_date
);

// Execute the query
if ($stmt->execute()) {

    header("Location: view.php");
    exit();

} else {

    echo "Error: " . $stmt->error;

}

$stmt->close();
$conn->close();

?>