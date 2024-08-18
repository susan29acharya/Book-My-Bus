<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not logged in, redirect to login page
    header("Location: http://localhost/Book-My-Bus/login.php");
    exit;
}

// Get the username from the session if logged in
$username = htmlspecialchars($_SESSION['username']);

// Database connection
$servername = "localhost";
$dbusername = "root";
$password = ""; // Update with your password if applicable
$dbname = "BookMyBus";

// Create connection
$conn = new mysqli($servername, $dbusername, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message variable
$error = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ticketNumber = $_POST['ticket_number'];
    $mobileNumber = $_POST['mobile_number'];

    // Sanitize inputs
    $ticketNumber = $conn->real_escape_string($ticketNumber);
    $mobileNumber = $conn->real_escape_string($mobileNumber);

    // Check if the ticket number and mobile number match a record in the database
    $sql = "SELECT * FROM tickets WHERE ticketnumber = '$ticketNumber' AND mobilenumber = '$mobileNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ticket found, redirect to pdf.php with the ticket number and mobile number
        header("Location: pdf.php?ticketnumber=" . urlencode($ticketNumber) . "&mobilenumber=" . urlencode($mobileNumber));
        exit;
    } else {
        $error = "No matching ticket found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print/Cancel Ticket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="print.css">
    <script>
        window.onload = function() {
            <?php if ($error): ?>
                alert("<?php echo $error; ?>");
            <?php endif; ?>
        };
    </script>
</head>
<body>
    <div class="print_ticket">
        <!-- Navigation bar section -->
        <div class="nav">
            <div class="nav-content">
                <!-- Follow section -->
                <div class="follow">
                    <p>Follow:</p>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <!-- Contact section -->
                <i class="fa-solid fa-phone"></i><p>9800000000</p>
                <i class="fa-solid fa-phone"></i><p>9800000000</p>
                <i class="fa-regular fa-envelope"></i><p>bookmybus@gmail.com</p>
                <p id="user-message">Hello, <?php echo $username; ?>!</p>
                <!-- Login/signup section -->
                <div class="login-signup">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    <a href="logout.php"><p>Logout</p></a>
                </div>
            </div>
        </div>
        <!-- End of nav bar section -->

        <!-- Nav bar 2 section -->
        <div class="nav2">
            <!-- Logo section -->
            <div class="logo-sec">
                <i class="fa-solid fa-bus"></i><h3>Book My Bus</h3>
            </div>
            <!-- Nav list section -->
            <div class="nav-list">
                <ul>
                    <li><a href="span.php">Home</a></li>
                    <li><a href="print.php" target="_blank">Manage Ticket</a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <!-- Print and Cancel Ticket section -->
        <div class="cancle-print-section">
            <div class="ticket-flex">
                <!-- Print form -->
                <div class="print-form">
                <form action="pdf2.php" method="get">
    <h1>Print Ticket</h1>
    <input type="text" id="ticketnumber" name="ticketnumber" placeholder="Ticket number" required>
    <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Mobile number" required><br>
    <button type="submit">Search</button>
</form>
                </div>

                <!-- Cancel form -->
                <div class="cancle-form">
                    <form method="POST" action="cancel_ticket.php">
                        <h1>Cancel Ticket</h1>
                        <p><b>Note:</b> <span>Please be advised that all tickets are non-refundable.</span></p>
                        <input type="number" name="cancel_ticket_number" placeholder="Ticket number" required><br>
                        <input type="number" name="cancel_date" placeholder="Mobile number" required><br>
                        <button type="submit">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
        let ticket = document.getElementById('ticketnumber').value;
        let mobile = document.getElementById('mobilenumber').value;
        function remove(){
            ticket.value="";
            mobile.value="";
        }
    </script>
</body>
</html>
