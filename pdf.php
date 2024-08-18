<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Update with your password if applicable
$dbname = "BookMyBus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch ticket data from the database
$sql = "SELECT fromdesti, todesti, date, busname, seatsnumber, ticketnumber, fullname, mobilenumber, ticketprice FROM tickets ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Assign fetched data to variables
    $fromdesti = $row['fromdesti'];
    $todesti = $row['todesti'];
    $date = $row['date'];
    $busname = $row['busname'];
    $seatsnumber = $row['seatsnumber'];
    $ticketnumber = $row['ticketnumber'];
    $fullname = $row['fullname'];
    $mobilenumber = $row['mobilenumber'];
    $ticketprice = $row['ticketprice'];
} else {
    die("No ticket data found.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Ticket Details</title>
    <style>
        .print {
            font-family: Arial, sans-serif;
            height: 92vh;
            width: 70%;
            margin-left: 15%;
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
        }
        .destination p {
            font-size: 16px;
            padding-right: 4%;
            letter-spacing: 1px;
        }
        .ticket-details {
            margin: 1px 0;
            display: flex;
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
            font-size:16px;
            letter-spacing:1px;
            border: none;
            margin-top: 4%;
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
            text-align: justify;
            font-size: 16px;
        }
        @media print {
            .print {
                font-family: Arial, sans-serif;
                height: 90vh;
                width: 90%;
                margin-left: 5%;
                margin-top: 2%;
            }
            .print p {
                font-size: 15px;
                margin-left: 7%;
                letter-spacing: 1px;
            }
            .print strong {
                color: #f9004d;
            }
            h1 {
                text-align: center;
                color: #f9004d;
                margin-top: 10%;
                font-family: "Poppins", sans-serif;
            }
            h2 {
                text-align: center;
                padding-bottom: 10%;
                color: black;
                font-family: "Poppins", sans-serif;
                font-size: 21px;
            }
            .destination {
                display: flex;
                margin-top: 10%;
            }
            .destination p {
                font-size: 15px;
                padding-right: 4%;
                letter-spacing: 1px;
            }
            .ticket-details {
                margin-top: 8%;
                display: flex;
            }
            .ticket-details p {
                font-size: 15px;
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
                font-size: 15px;
                padding-bottom: 10px;
                letter-spacing: 1px;
            }
            .personal h4 {
                font-size: 19px;
                letter-spacing: 1px;
            }
            .personal p {
                font-size: 15px;
                padding-bottom: 10px;
                letter-spacing: 1px;
            }
            .amt h4 {
                font-size: 19px;
                letter-spacing: 1px;
                margin-left: 4%;
            }
            .note {
                margin-top: 30%;
            }
            .print-btn {
                display: none; /* Hide print button during printing */
            }
        }
    </style>
</head>
<body>
    <div class="print">
        <h1>Book My Bus</h1>
        <h2>Ticket Details</h2>
        <p><strong>Ticket Number:</strong> <?php echo $ticketnumber; ?></p>
        <p><strong>Ticket Price:</strong> <?php echo $ticketprice; ?></p>
        <div class="destination">
            <p><strong>From:</strong> <?php echo $fromdesti; ?></p>
            <p><strong>To:</strong> <?php echo $todesti; ?></p>
            <p><strong>Date:</strong> <?php echo $date; ?></p>
        </div>
        <div class="ticket-details">
            <div class="businfo">
                <h4>Bus Info</h4>
                <p><strong>Bus Name:</strong> <?php echo $busname; ?></p>
                <p><strong>Seat Number:</strong> <?php echo $seatsnumber; ?></p>
            </div>
            <div class="personal">
                <h4>Personal Info</h4>
                <p><strong>Full Name:</strong> <?php echo $fullname; ?></p>
                <p><strong>Mobile Number:</strong> <?php echo $mobilenumber; ?></p>
            </div>
        </div>
        <button class="print-btn" onclick="printAndRedirect()">Print Ticket</button>
        <div class="note">
            <p>Thank you for choosing BookMyBus for your travel needs. We are delighted to have been a part of your journey and appreciate your trust in our services.</p>
        </div>
    </div>

    <script>
        function printAndRedirect() {
            window.print();
            // Delay the redirection to allow the print dialog to close
            setTimeout(function() {
                window.location.href = 'span.php';
            }, 500); // Adjust the delay as needed
        }
    </script>
</body>
</html>