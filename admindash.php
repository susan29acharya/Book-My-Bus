<?php
session_start();

// Check if user is logged in as admin
if (!isset($_SESSION['loggedin']) || $_SESSION['username'] !== 'admin') {
    header('Location: login.php');
    exit();
}

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

// Check if a delete request was made
if (isset($_GET['delete_ticket'])) {
    $ticketnumber = $_GET['delete_ticket'];
    
    // Prepare and execute the deletion query
    $stmt = $conn->prepare("DELETE FROM tickets WHERE ticketnumber = ?");
    $stmt->bind_param("s", $ticketnumber);
    if ($stmt->execute()) {
        echo "<script>alert('Ticket deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting ticket');</script>";
    }
    $stmt->close();
}

// Fetch ticket data
$sql = "SELECT ticketnumber, date, fullname, mobilenumber,busname, seatsnumber FROM tickets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="admindash.css">
</head>

<body>
    <div class="contact-page">
        <div class="nav">
            <div class="nav-content">
                <div class="follow">
                    <p>Follow:</p>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <i class="fa-solid fa-phone"></i>
                <p>9800000000</p>
                <i class="fa-solid fa-phone"></i>
                <p>9800000000</p>
                <i class="fa-regular fa-envelope"></i>
                <p>bookmybus@gmail.com</p>
                <div class="login-signup">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    <a href="logout.php">
                        <p>Logout</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="nav2">
            <div class="logo-sec">
                <i class="fa-solid fa-bus"></i>
                <h3>Book My Bus</h3>
            </div>
        </div>

        <div class="ticket-booked">
            <h2>List of Tickets Booked</h2>

            <table>
                <thead>
                    <tr>
                        <th>Ticket Number</th>
                        <th>Date</th>
                        <th>Full Name</th>
                        <th>Mobile Number</th>
                        <th>Bus name</th>
                        <th>Seats Number</th>
                        <th>Extra</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['ticketnumber']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['mobilenumber']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['busname']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['seatsnumber']) . "</td>";
                            echo "<td><a href='admindash.php?delete_ticket=" . htmlspecialchars($row['ticketnumber']) . "' onclick='return confirm(\"Are you sure you want to delete this ticket?\");'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No tickets found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>

<?php
$conn->close();
?>
