
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

// Fetch all employee records
$sql = "SELECT * FROM employees ORDER BY id DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee List</title>

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
            padding: 40px;
        }

        .container {
            width: 95%;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .add-btn {
            display: inline-block;
            padding: 12px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #5568d9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #667eea;
            color: white;
        }

        tr:nth-child(even) {
            background: #f8f9fa;
        }

        .edit-btn {
            background: #28a745;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 5px;
        }

        .edit-btn:hover {
            background: #218838;
        }

        .delete-btn:hover {
            background: #c82333;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Employee List</h1>

    <div class="top-section">

        <span>
            All Employee Details
        </span>

        <a href="index.php" class="add-btn">
            + Add Employee
        </a>

    </div>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Joining Date</th>
            <th>Action</th>
        </tr>

        <?php

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo "<tr>";

                echo "<td>" . htmlspecialchars($row['id']) . "</td>";

                echo "<td>" . htmlspecialchars($row['name']) . "</td>";

                echo "<td>" . htmlspecialchars($row['email']) . "</td>";

                echo "<td>" . htmlspecialchars($row['phone']) . "</td>";

                echo "<td>" . htmlspecialchars($row['department']) . "</td>";

                echo "<td>" . htmlspecialchars($row['salary']) . "</td>";

                echo "<td>" . htmlspecialchars($row['joining_date']) . "</td>";

                echo "<td>";

                echo "<a class='edit-btn' href='edit.php?id=" . $row['id'] . "'>Edit</a>";

                echo "<a class='delete-btn' href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this employee?\");'>Delete</a>";

                echo "</td>";

                echo "</tr>";

            }

        } else {

            echo "<tr>";

            echo "<td colspan='8'>No employee records found</td>";

            echo "</tr>";

        }

        ?>

    </table>

</div>

</body>

</html>

<?php

$conn->close();

?>
```
