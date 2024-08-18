<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BookMyBus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$fromdesti = $_POST['fromdesti'];
$todesti = $_POST['todesti'];
$date = $_POST['date'];
$busname = $_POST['busname'];
$seatsnumber = $_POST['seatnumber'];
$ticketnumber = mt_rand(100000, 999999); // Generate a random ticket number
$fullname = $_POST['fullname'];
$mobilenumber = $_POST['mobilenumber'];
$email = $_POST['email'];
$ticketprice = $_POST['ticketprice'];

// Insert data into the tickets table
$sql = "INSERT INTO tickets (fromdesti, todesti, date, busname, seatsnumber, ticketnumber, fullname, mobilenumber, email, ticketprice)
        VALUES ('$fromdesti', '$todesti', '$date', '$busname', '$seatsnumber', '$ticketnumber', '$fullname', '$mobilenumber', '$email', '$ticketprice')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Ticket booked successfully!'); window.location.href='pdf.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.location.href='form.php';</script>";
}

$conn->close();
?>
