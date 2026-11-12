<?php

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $role = $_POST["role"];
    $department = trim($_POST["department"]);


    $check = mysqli_prepare(
        $conn,
        "SELECT id FROM users WHERE email = ?"
    );

    mysqli_stmt_bind_param($check, "s", $email);

    mysqli_stmt_execute($check);

    mysqli_stmt_store_result($check);


    if (mysqli_stmt_num_rows($check) > 0) {

        echo "
        <script>
            alert('Email already registered. Please use another email.');
            window.location.href = 'register.html';
        </script>
        ";

        exit();
    }


    $hashed_password = password_hash(
        $password,
        PASSWORD_DEFAULT
    );



    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO users
        (name, email, password, role, department)
        VALUES (?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $name,
        $email,
        $hashed_password,
        $role,
        $department
    );


    if (mysqli_stmt_execute($stmt)) {

        echo "
        <script>
            alert('Registration successful!');
            window.location.href = 'login.html';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Registration failed. Please try again.');
            window.location.href = 'register.html';
        </script>
        ";
    }


    mysqli_stmt_close($stmt);
    mysqli_stmt_close($check);
    mysqli_close($conn);

}

?>