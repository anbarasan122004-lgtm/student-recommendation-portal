<?php

session_start();

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = mysqli_prepare(
        $conn,
        "SELECT id, name, password, role
         FROM users
         WHERE email = ?"
    );

    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);



    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);


        
        if (password_verify($password, $user["password"])) {

            
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["role"] = $user["role"];


        
            if ($user["role"] == "admin") {

                header("Location: admin.php");
                exit();

            } elseif ($user["role"] == "employee") {

                header("Location: employee.php");
                exit();

            }

        } else {

            echo "
            <script>
                alert('Incorrect password.');
                window.location.href = 'login.html';
            </script>
            ";

        }

    } else {

        echo "
        <script>
            alert('Email address not found.');
            window.location.href = 'login.html';
        </script>
        ";

    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

?>