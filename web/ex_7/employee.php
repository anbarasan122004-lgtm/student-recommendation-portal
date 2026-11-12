<?php

session_start();

include("db.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

if ($_SESSION["role"] != "employee") {
    header("Location: admin.php");
    exit();
}


$query = "SELECT id, name, email, department, created_at
          FROM users
          WHERE role = 'admin'
          ORDER BY id DESC";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Dashboard - CompanyHub</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


    <nav class="navbar">

        <div class="logo">
            COMPANY<span>HUB</span>
        </div>

        <div class="nav-links">

            <a href="employee.php">Dashboard</a>

            <a href="logout.php">Logout</a>

        </div>

    </nav>



    <section class="dashboard-section">

        <div class="dashboard-container">

            <div class="dashboard-header">

                <div>

                    <p class="dashboard-label">
                        EMPLOYEE DASHBOARD
                    </p>

                    <h1>
                        Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
                    </h1>

                    <p>
                        View administrator information available in the company portal.
                    </p>

                </div>

                <div class="role-badge">
                    EMPLOYEE
                </div>

            </div>


    

            <div class="details-card">

                <div class="details-heading">

                    <h2>Administrator Details</h2>

                    <span>
                        All registered administrators
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

                                while ($admin = mysqli_fetch_assoc($result)) {

                            ?>

                            <tr>

                                <td>
                                    <?php echo $admin["id"]; ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($admin["name"]); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($admin["email"]); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($admin["department"]); ?>
                                </td>

                                <td>
                                    <?php echo $admin["created_at"]; ?>
                                </td>

                            </tr>

                            <?php

                                }

                            } else {

                            ?>

                            <tr>

                                <td colspan="5" class="no-data">
                                    No administrators registered yet.
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