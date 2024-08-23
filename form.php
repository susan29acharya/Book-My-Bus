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

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$username = $isLoggedIn ? htmlspecialchars($_SESSION['username']) : '';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book My Bus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="form.css">
</head>

<body>

    <!--span body page section ---------------------------------------->
    <div id="spanbody">

        <!--nav bar section ---------------------------------------->
        <div class="nav">
            <div class="nav-content">

                <!--follow section ---------------------------------------->
                <div class="follow">
                    <p>Follow:</p>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-whatsapp"></i>
                </div>

                <!--contact section ---------------------------------------->
                <i class="fa-solid fa-phone"></i>
                <p>9800000000</p>
                <i class="fa-solid fa-phone"></i>
                <p>9800000000</p>
                <i class="fa-regular fa-envelope"></i>
                <p>bookmybus@gmail.com</p>

                <p id="user-message">Hello, <?php echo $username; ?>!</p>

                <!--login signup section ---------------------------------------->
                <div class="login-signup">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    <a href="logout.php">
                        <p>Logout</p>
                    </a>
                </div>
            </div>
        </div>
        <!--End of nav bar section ---------------------------------------->

        <!-- nav bar 2 section ---------------------------------------->
        <div id="nav2">
            <!-- logo sec section ---------------------------------------->
            <div class="logo-sec">
                <i class="fa-solid fa-bus"></i>
                <h3>Book My Bus</h3>
            </div>
            <!-- nav list  section ---------------------------------------->
            <div class="nav-list">
                <ul>
                    <li><a href="span.php">home</a></li>
                    <li><a href="print.php">manage ticket</a></li>
                    <li><a href="tours.php">tour</a></li>
                    <li><a href="contact.php">contact us</a></li>
                </ul>
            </div>
        </div>

        <div class="form-flex">
            <div class="left-form">
                <h3>fill your information</h3>

                <form action="submit_ticket.php" method="post">
                    <div class="kt-flex">
                        <label>From:</label>
                        <input type="text" name="fromdesti" value="kakarvitta" readonly>
                        <label>To:</label>
                        <input type="text" name="todesti" value="kathmandu" readonly>
                        <label>Date:</label>
                        <input type="date" id="dateInput" name="date" readonly>
                    </div>
                    <h5>Bus name: <span id="busNameDisplay"></span></h5>
                    <input type="hidden" id="busNameHidden" name="busname">

                    <h5>Seats: <span id="seatsDisplay"></span></h5>
                    <input type="hidden" id="seatsHidden" name="seatnumber">
                    <div class="ticket-amount-zindex">
                        <h5>Total amount: <span id="totalAmountDisplay"></span></h5>
                        <input type="hidden" id="totalAmountHidden" name="ticketprice">
                    </div>
                    <div class="form">
                        <input type="text" name="fullname" placeholder="Enter your name" required>
                        <input type="number" name="mobilenumber" placeholder="Enter your number" required>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <button type="submit">Pay</button>
                </form>
            </div>

            <div class="right-payment">
                <h3>payment</h3>

                <p>Pay via online</p>
                <div class="payment-gateway">
                    <img src="All image/esewa.png">
                    <img src="All image/ime-main.svg">
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function () {
            // Retrieve and set the bus name
            const busName = localStorage.getItem('busName');
            if (busName) {
                document.getElementById('busNameDisplay').innerText = busName;
                document.getElementById('busNameHidden').value = busName;
            }

            // Retrieve and set the selected seats
            const seats = localStorage.getItem('selectedSeats');
            if (seats) {
                document.getElementById('seatsDisplay').innerText = seats;
                document.getElementById('seatsHidden').value = seats;
            }

            // Retrieve and set the total amount
            const totalAmount = localStorage.getItem('totalAmount');
            if (totalAmount) {
                document.getElementById('totalAmountDisplay').innerText = totalAmount;
                document.getElementById('totalAmountHidden').value = totalAmount;
            }

            // Retrieve and set the selected date
            const selectedDate = localStorage.getItem('selectedDate');
            if (selectedDate) {
                const dateInput = document.getElementById('dateInput');
                if (dateInput) {
                    dateInput.value = selectedDate;
                }
            }
        };
    </script>

</body>

</html>