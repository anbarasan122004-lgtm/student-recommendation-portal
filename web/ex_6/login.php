```php
<?php

session_start();

include "db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];


    $stmt = mysqli_prepare(
        $conn,
        "SELECT id, full_name, password
         FROM users
         WHERE email = ?"
    );


    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $email
    );


    mysqli_stmt_execute($stmt);


    $result = mysqli_stmt_get_result($stmt);


    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);


        if (password_verify(
            $password,
            $user["password"]
        )) {

            $_SESSION["user_id"] = $user["id"];

            $_SESSION["user_name"] =
                $user["full_name"];


            header("Location: dashboard.php");
            exit();

        } else {

            ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>

                <meta charset="UTF-8">

                <meta name="viewport"
                      content="width=device-width, initial-scale=1.0">

                <title>Login Failed</title>

                <link rel="stylesheet" href="style.css">

            </head>

            <body>

                <main class="result-page">

                    <div class="result-card">

                        <div class="result-icon error-icon">
                            !
                        </div>

                        <p class="eyebrow">
                            LOGIN ERROR
                        </p>

                        <h1>
                            Incorrect
                            <span>Password.</span>
                        </h1>

                        <p>
                            The password you entered doesn't match
                            this account. Please check your password
                            and try again.
                        </p>

                        <a href="login.html"
                           class="primary-btn result-btn">
                            Try Again →
                        </a>

                    </div>

                </main>

            </body>

            </html>

            <?php

        }

    } else {

        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="UTF-8">

            <meta name="viewport"
                  content="width=device-width, initial-scale=1.0">

            <title>Account Not Found</title>

            <link rel="stylesheet" href="style.css">

        </head>

        <body>

            <main class="result-page">

                <div class="result-card">

                    <div class="result-icon error-icon">
                        !
                    </div>

                    <p class="eyebrow">
                        ACCOUNT NOT FOUND
                    </p>

                    <h1>
                        We couldn't
                        <span>find you.</span>
                    </h1>

                    <p>
                        No department account is registered
                        with this email address.
                    </p>

                    <a href="register.html"
                       class="primary-btn result-btn">
                        Create an Account →
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
```
