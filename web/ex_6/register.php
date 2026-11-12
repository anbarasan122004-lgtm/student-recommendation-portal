<?php

error_reporting(E_ALL);
ini_set('display_error', 1);

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if ($name == "" || $email == "" || $password == "") {
        die("All fields are required.");
    }

    $check = mysqli_prepare(
        $conn,
        "SELECT id FROM users WHERE email = ?"
    );

    mysqli_stmt_bind_param($check, "s", $email);

    mysqli_stmt_execute($check);

    mysqli_stmt_store_result($check);

    if (mysqli_stmt_num_rows($check) > 0) {

        echo "An account with this email already exists.";

        mysqli_stmt_close($check);
        mysqli_close($conn);

        exit();

    }

    mysqli_stmt_close($check);


    /* Securely hash the password */

    $hashedPassword = password_hash(
        $password,
        PASSWORD_DEFAULT
    );


    /* Insert user into database */

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO users (full_name, email, password)
         VALUES (?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "sss",
        $name,
        $email,
        $hashedPassword
    );


    if (mysqli_stmt_execute($stmt)) {

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">

        <title>Registration Successful</title>

        <link rel="stylesheet" href="style.css">

    </head>

    <body>

        <main class="result-page">

            <div class="result-card">

                <div class="result-icon">
                    ✓
                </div>

                <p class="eyebrow">
                    ACCOUNT CREATED
                </p>

                <h1>
                    Registration
                    <span>Successful.</span>
                </h1>

                <p>
                    Your department account has been created
                    successfully. You can now sign in using
                    your registered email and password.
                </p>

                <a href="login.html"
                   class="primary-btn result-btn">
                    Continue to Login →
                </a>

            </div>

        </main>

    </body>

    </html>

    <?php

} else {

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">

        <title>Registration Failed</title>

        <link rel="stylesheet" href="style.css">

    </head>

    <body>

        <main class="result-page">

            <div class="result-card">

                <div class="result-icon error-icon">
                    !
                </div>

                <p class="eyebrow">
                    REGISTRATION ERROR
                </p>

                <h1>
                    Something went
                    <span>wrong.</span>
                </h1>

                <p>
                    We couldn't create your account.
                    Please check your details and try again.
                </p>

                <a href="register.html"
                   class="primary-btn result-btn">
                    Try Again →
                </a>

            </div>

        </main>

    </body>

    </html>

    <?php

}

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

?>