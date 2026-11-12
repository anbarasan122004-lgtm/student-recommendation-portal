<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit();
}

$userName = $_SESSION["user_name"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Computer Science Department</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- Navigation -->

    <header class="navbar">

        <div class="logo">

            <div class="logo-mark">CS</div>

            <div class="logo-text">

                <span>DEPARTMENT</span>

                <strong>COMPUTER SCIENCE</strong>

            </div>

        </div>


        <nav class="nav-links">

            <a href="index.html">Home</a>

            <a href="about.html">About</a>

            <a href="index.html#programs">Programs</a>

            <a href="index.html#highlights">Highlights</a>

            <a href="logout.php"
               class="login-btn">
                Logout
            </a>

        </nav>

    </header>


    <!-- Dashboard -->

    <main class="dashboard">

        <div class="dashboard-content">

            <p class="eyebrow">
                DEPARTMENT PORTAL
            </p>

            <h1>
                Welcome,
                <span><?php echo htmlspecialchars($userName); ?></span>
            </h1>

            <p class="dashboard-description">

                You are successfully signed in to the
                Computer Science Department portal.

            </p>


            <div class="dashboard-actions">

                <a href="index.html"
                   class="primary-btn">

                    Explore Department

                </a>

                <a href="about.html"
                   class="secondary-btn">

                    About Us

                </a>

            </div>

        </div>


        <!-- Portal Card -->

        <div class="dashboard-card">

            <div class="dashboard-card-top">

                <span class="status-dot"></span>

                <span>ACCOUNT ACTIVE</span>

            </div>


            <div class="dashboard-icon">
                CS
            </div>


            <h2>
                Department Member
            </h2>

            <p>
                Your account is connected to the
                Computer Science Department portal.
            </p>


            <div class="dashboard-line"></div>


            <div class="dashboard-info">

                <span>ACCESS</span>

                <strong>Member Portal</strong>

            </div>

        </div>

    </main>


    <!-- Footer -->

    <footer>

        <div class="footer-brand">

            <div class="logo-mark">
                CS
            </div>

            <div>

                <strong>
                    COMPUTER SCIENCE
                </strong>

                <span>
                    Department Portal
                </span>

            </div>

        </div>


        <p>
            © 2026 Department of Computer Science.
            All rights reserved.
        </p>

    </footer>


</body>

</html>