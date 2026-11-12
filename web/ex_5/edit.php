<?php

$servername = "sql213.infinityfree.com";
$username = "if0_43398010";
$password = "ANBU122004";
$database = "if0_43398010_employee_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get employee ID from URL
$id = $_GET['id'];

// Fetch employee details
$sql = "SELECT * FROM employees WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$employee = $result->fetch_assoc();

if (!$employee) {
    die("Employee not found.");
}

$stmt->close();


// Update employee details
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];
    $joining_date = $_POST['joining_date'];

    $update_sql = "UPDATE employees 
                   SET name = ?, 
                       email = ?, 
                       phone = ?, 
                       department = ?, 
                       salary = ?, 
                       joining_date = ?
                   WHERE id = ?";

    $update_stmt = $conn->prepare($update_sql);

    $update_stmt->bind_param(
        "ssssisi",
        $name,
        $email,
        $phone,
        $department,
        $salary,
        $joining_date,
        $id
    );

    if ($update_stmt->execute()) {

        header("Location: view.php");
        exit();

    } else {

        echo "Error updating employee: " . $update_stmt->error;
    }

    $update_stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Employee</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f2f4f8;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .container {
            width: 100%;
            max-width: 650px;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #444;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 13px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #5568d9;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #667eea;
            text-decoration: none;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Edit Employee</h1>

    <form method="POST">

        <div class="form-group">

            <label>Employee Name</label>

            <input
                type="text"
                name="name"
                value="<?php echo htmlspecialchars($employee['name']); ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>Email</label>

            <input
                type="email"
                name="email"
                value="<?php echo htmlspecialchars($employee['email']); ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>Phone Number</label>

            <input
                type="text"
                name="phone"
                value="<?php echo htmlspecialchars($employee['phone']); ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>Department</label>

            <input
                type="text"
                name="department"
                value="<?php echo htmlspecialchars($employee['department']); ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>Salary</label>

            <input
                type="number"
                name="salary"
                step="0.01"
                value="<?php echo htmlspecialchars($employee['salary']); ?>"
                required
            >

        </div>


        <div class="form-group">

            <label>Joining Date</label>

            <input
                type="date"
                name="joining_date"
                value="<?php echo htmlspecialchars($employee['joining_date']); ?>"
                required
            >

        </div>


        <button type="submit">
            Update Employee
        </button>

    </form>

    <a href="view.php" class="back">
        ← Back to Employee List
    </a>

</div>

</body>

</html>

<?php
$conn->close();
?>