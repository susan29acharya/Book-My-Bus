<?php
session_start(); // Start the session

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password are correct
    if ($username === 'admin' && $password === 'admin') {
        // Redirect to admin dashboard
        header('Location: admindash.php');
        exit();
    } else {
        // Invalid username or password
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="adminlogin.css">
    <title>Login</title>

</head>

<body>
    <div class="login-container">
        <div class="login-section">
            <h1>Admin login</h1>
            <div class="login-form">
                <form method="POST" action="login.php">
                    <i class="fa-regular fa-user"></i><label>Username</label><br>
                    <input type="text" name="username" required><br>

                    <i class="fa-solid fa-unlock"></i><label>Password</label><br>
                    <input type="password" name="password" required><br>

                    <button type="submit">Login</button>
                    <div class="admin">
                    <p><a href="login.php">User login</a></p>
                </div>
                </form>

            </div>
        </div>
        <div class="book-bus-info">
            <div class="image-p-section">
                <img src="All image/logo.png">
                <p>“Book my Bus” lets people find buses, check for bus/seat availability, book tickets, and pay online
                    without any problem.</p>
            </div>
        </div>
    </div>
</body>

</html>