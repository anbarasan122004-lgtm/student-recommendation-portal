<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>

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
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #777;
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
            outline: none;
        }

        input:focus {
            border-color: #667eea;
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
            margin-top: 10px;
        }

        button:hover {
            background: #5568d9;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Employee Details</h1>
        <p class="subtitle">Enter Employee Information</p>

        <form action="insert.php" method="POST">

            <div class="form-group">
                <label>Employee Name</label>
                <input type="text" name="name" placeholder="Enter employee name" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter email address" required>
            </div>

            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" placeholder="Enter phone number" required>
            </div>

            <div class="form-group">
                <label>Department</label>
                <input type="text" name="department" placeholder="Enter department" required>
            </div>

            <div class="form-group">
                <label>Salary</label>
                <input type="number" name="salary" placeholder="Enter salary" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Joining Date</label>
                <input type="date" name="joining_date" required>
            </div>

            <button type="submit">Save Employee Details</button>

        </form>

    </div>

</body>
</html>