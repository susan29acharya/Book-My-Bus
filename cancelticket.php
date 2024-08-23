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

// Initialize variables
$noData = false;
$ticketDetails = null;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get ticket number and mobile number from POST request
    $ticketnumber = $_POST['cancel_ticket_number'];
    $mobilenumber = $_POST['cancel_date'];

    // Sanitize inputs
    $ticketnumber = $conn->real_escape_string($ticketnumber);
    $mobilenumber = $conn->real_escape_string($mobilenumber);

    // Prepare and execute SQL query to check if the ticket exists
    $stmt = $conn->prepare("SELECT fromdesti, todesti, date, busname, seatsnumber, ticketnumber, fullname, mobilenumber, ticketprice 
                            FROM tickets 
                            WHERE ticketnumber = ? AND mobilenumber = ?");
    $stmt->bind_param("ss", $ticketnumber, $mobilenumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Ticket found, fetch data
        $ticketDetails = $result->fetch_assoc();

        // Handle ticket cancellation if the button is clicked
        if (isset($_POST['cancel_ticket'])) {
            $stmt_delete = $conn->prepare("DELETE FROM tickets WHERE ticketnumber = ?");
            $stmt_delete->bind_param("s", $ticketnumber);
            $stmt_delete->execute();

            if ($stmt_delete->affected_rows > 0) {
                echo "<script>alert('Ticket is canceled successfully'); window.location.href = 'print.php';</script>";
            } else {
                echo "<script>alert('Failed to cancel the ticket');</script>";
            }
            $stmt_delete->close();
        }
    } else {
        // Ticket not found
        $noData = true;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Ticket</title>
    <style>
        .print {
            font-family: Arial, sans-serif;
            height: 90vh;
            width: 62%;
            margin-left: 18%;
            margin-top: 2%;
            border: 1px solid black;
            border-radius: 10px;
        }
        .print p {
            font-size: 16px;
            margin-left: 7%;
            letter-spacing: 1px;
        }
        .print strong {
            color: #f9004d;
        }
        h1 {
            text-align: center;
            color: #f9004d;
            font-family: "Poppins", sans-serif;
        }
        h2 {
            text-align: center;
            padding-bottom: 2%;
            color: black;
            font-family: "Poppins", sans-serif;
            font-size: 21px;
        }
        .destination {
            display: flex;
            margin-left:2%;
        }
        .destination p {
            font-size: 16px;
            padding-right: 4%;
            letter-spacing: 1px;
        }
        .ticket-details {
            margin: 1px 0;
            display: flex;
            margin-left:2%;
        }
        .ticket-details p {
            font-size: 16px;
            margin: 5px 0;
        }
        .businfo {
            margin-left: 7%;
            margin-right: 15%;
        }
        .businfo h4 {
            font-size: 19px;
            letter-spacing: 1px;
        }
        .businfo p {
            font-size: 16px;
            padding-bottom: 10px;
            letter-spacing: 1px;
        }
        .personal h4 {
            font-size: 19px;
            letter-spacing: 1px;
        }
        .personal p {
            font-size: 16px;
            padding-bottom: 10px;
            letter-spacing: 1px;
        }
        .amt h4 {
            font-size: 19px;
            letter-spacing: 1px;
            margin-left: 4%;
        }
        .print-btn {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px 20px;
            text-align: center;
            background-color: #007bff;
            color: white;
            border: none;
            margin-top: 4%;
            font-size:16px;
            letter-spacing:1px;
            border-radius: 5px;
            cursor: pointer;
        }
        .print-btn:hover {
            background-color: #0056b3;
        }
        .note {
            height: 8vh;
            width: 90%;
        }
        .note p {
            text-align: center;
            font-size: 16px;
        }
        .note span{
            color:red;
        }
       
    </style>
</head>
<body>
<?php if ($noData): ?>
    <script>
        alert('Invalid ticket number or mobile number');
        window.location.href = 'print.php'; // Redirect back to the form page
    </script>
<?php elseif ($ticketDetails): ?>
    <div class="print">
        <h1>Book My Bus</h1>
        <h2>Ticket Details</h2>
        <p><strong>Ticket Number:</strong> <?php echo htmlspecialchars($ticketDetails['ticketnumber']); ?></p>
        <p><strong>Ticket Price:</strong> <?php echo htmlspecialchars($ticketDetails['ticketprice']); ?></p>
        <div class="destination">
            <p><strong>From:</strong> <?php echo htmlspecialchars($ticketDetails['fromdesti']); ?></p>
            <p><strong>To:</strong> <?php echo htmlspecialchars($ticketDetails['todesti']); ?></p>
            <p><strong>Date:</strong> <?php echo htmlspecialchars($ticketDetails['date']); ?></p>
        </div>
        <div class="ticket-details">
            <div class="businfo">
                <h4>Bus Info</h4>
                <p><strong>Bus Name:</strong> <?php echo htmlspecialchars($ticketDetails['busname']); ?></p>
                <p><strong>Seat Number:</strong> <?php echo htmlspecialchars($ticketDetails['seatsnumber']); ?></p>
            </div>
            <div class="personal">
                <h4>Personal Info</h4>
                <p><strong>Full Name:</strong> <?php echo htmlspecialchars($ticketDetails['fullname']); ?></p>
                <p><strong>Mobile Number:</strong> <?php echo htmlspecialchars($ticketDetails['mobilenumber']); ?></p>
            </div>

        </div>

        <form method="post">
            <input type="hidden" name="cancel_ticket_number" value="<?php echo htmlspecialchars($ticketDetails['ticketnumber']); ?>">
            <input type="hidden" name="cancel_date" value="<?php echo htmlspecialchars($ticketDetails['mobilenumber']); ?>">
            <button type="submit" name="cancel_ticket" class="print-btn">Cancel Ticket</button>
        </form>
        <div class="note">
            <p>Note: <span>Please be advised that all tickets are non-refundable.</span></p>
        </div>
    </div>
<?php endif; ?>
</body>
</html>
