<?php
session_start(); // Start session to use session variables

// Database configuration
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "BookMyBus";

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$message = "";
$redirect = "";

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if fields are not empty
    if (!empty($username) && !empty($password)) {
        // Check for admin login
        if ($username === 'admin' && $password === 'admin') {
            $_SESSION['loggedin'] = true; // Set session variable for logged in
            $_SESSION['username'] = $username; // Optionally store username in session
            $redirect = "http://localhost/Book-My-Bus/admindash.php"; // Redirect to admin dashboard
        } else {
            // Prepare and execute SQL statement for customer login
            $sql = "SELECT password FROM signup WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // Bind the result
                $stmt->bind_result($hashed_password);
                $stmt->fetch();

                // Verify the password
                if (password_verify($password, $hashed_password)) {
                    $_SESSION['loggedin'] = true; // Set session variable for logged in
                    $_SESSION['username'] = $username; // Optionally store username in session
                    $redirect = "http://localhost/Book-My-Bus/span.php"; // Redirect to customer dashboard
                } else {
                    $message = "Invalid password.";
                }
            } else {
                $message = "No user found with that username.";
            }

            $stmt->close();
        }
    } else {
        $message = "All fields are required.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var message = "<?php echo addslashes($message); ?>";
            var redirect = "<?php echo addslashes($redirect); ?>";

            if (message) {
                alert(message);
            }

            if (redirect) {
                setTimeout(function () {
                    window.location.href = redirect;
                }, 500); // Delay for alert to be processed
            }
        });
    </script>
</head>

<body>
    <div class="login-container">
        <div class="login-section">
            <h1>Login</h1>
            <div class="login-form">
                <form method="POST" action="login.php">
                    <i class="fa-regular fa-user"></i><label>Username</label><br>
                    <input type="text" name="username" required><br>

                    <i class="fa-solid fa-unlock"></i><label>Password</label><br>
                    <input type="password" name="password" required><br>

                    <button type="submit">Login</button>
                </form>
            </div>
            <p>New to Book My Bus? <a href="signup.php">Sign up</a> </p>
            <div class="admin">
            <p><a href="adminlogin.php">Admin login</a></p>
            </div>
        </div>
        <div class="book-bus-info">
            <div class="image-p-section">
                <img src="All image/logo.png">
                <p>“Book my Bus” lets people find buses, check for bus/seat availability, book tickets, and pay online without any problem.</p>
            </div>
        </div>
    </div>
</body>

</html>
