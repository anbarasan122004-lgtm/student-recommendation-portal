<?php

session_start();

include("db.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

if ($_SESSION["role"] != "admin") {
    header("Location: employee.php");
    exit();
}


$query = "SELECT id, name, email, department, created_at
          FROM users
          WHERE role = 'employee'
          ORDER BY id DESC";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - CompanyHub</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


    <nav class="navbar">

        <div class="logo">
            COMPANY<span>HUB</span>
        </div>

        <div class="nav-links">

            <a href="admin.php">Dashboard</a>

            <a href="logout.php">Logout</a>

        </div>

    </nav>



    <section class="dashboard-section">

        <div class="dashboard-container">

            <div class="dashboard-header">

                <div>

                    <p class="dashboard-label">
                        ADMIN DASHBOARD
                    </p>

                    <h1>
                        Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
                    </h1>

                    <p>
                        View and manage registered employee information.
                    </p>

                </div>

                <div class="role-badge">
                    ADMINISTRATOR
                </div>

            </div>



            <div class="details-card">

                <div class="details-heading">

                    <h2>Employee Details</h2>

                    <span>
                        All registered employees
                    </span>

                </div>


                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Registered On</th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php

                            if (mysqli_num_rows($result) > 0) {

                                while ($employee = mysqli_fetch_assoc($result)) {

                            ?>

                            <tr>

                                <td>
                                    <?php echo $employee["id"]; ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($employee["name"]); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($employee["email"]); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($employee["department"]); ?>
                                </td>

                                <td>
                                    <?php echo $employee["created_at"]; ?>
                                </td>

                            </tr>

                            <?php

                                }

                            } else {

                            ?>

                            <tr>

                                <td colspan="5" class="no-data">
                                    No employees registered yet.
                                </td>

                            </tr>

                            <?php

                            }

                            ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section>


    <footer>

        <p>
            © 2026 CompanyHub. Employee & Admin Portal.
        </p>

    </footer>

</body>

</html>

<?php

mysqli_close($conn);

?>