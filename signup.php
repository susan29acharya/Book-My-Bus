<?php
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

// Initialize a message variable
$message = "";

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if fields are not empty
    if (!empty($username) && !empty($email) && !empty($password)) {
        // Check if the username or email already exists
        $checkSql = "SELECT id FROM signup WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($checkSql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // User already exists
            $message = "Already have an account.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Prepare and execute SQL statement
            $insertSql = "INSERT INTO signup (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($insertSql);
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {
                // Display alert and redirect to login page
                echo "<script>
                        alert('Signup successful!');
                        window.location.href = 'login.php';
                      </script>";
                exit(); // Ensure no further code is executed after the script
            } else {
                $message = "Error: " . $stmt->error;
            }
        }

        $stmt->close();
    } else {
        $message = "All fields are required.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="signup.css">
    <title>Signup</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            <?php if (!empty($message)) { ?>
                alert("<?php echo $message; ?>");
            <?php } ?>
        });
    </script>
</head>

<body>
    <div class="login-container">
        <div class="login-section">
            <h1>Sign up</h1>
            <div class="login-form">
                <form method="POST" action="signup.php">
                    <i class="fa-regular fa-user"></i><label>Username</label><br>
                    <input type="text" name="username" required><br>

                    <i class="fa-regular fa-envelope"></i><label>Email</label><br>
                    <input type="email" name="email" required><br>

                    <i class="fa-solid fa-unlock"></i><label>Password</label><br>
                    <input type="password" name="password" required><br>

                    <button type="submit">Sign Up</button>
                </form>
            </div>
            <p>Already have an account? <a href="login.php">Login</a></p>
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