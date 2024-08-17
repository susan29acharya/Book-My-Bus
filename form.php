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
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous">
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
                    <i class="fa-solid fa-phone"></i><p>9800000000</p>
                    <i class="fa-solid fa-phone"></i><p>9800000000</p>
                    <i
                        class="fa-regular fa-envelope"></i><p>bookmybus@gmail.com</p>

                        <p id="user-message">Hello, <?php echo $username; ?>!</p>
        

                    <!--login signup section ---------------------------------------->
                    <div class="login-signup">

                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                <a href="logout.php"><p>Logout</p></a>

        </div>
                </div>

            </div>
            <!--End of nav bar section ---------------------------------------->

            <!-- nav bar 2 section ---------------------------------------->
            <div id="nav2">

                <!-- logo sec section ---------------------------------------->
                <div class="logo-sec">
                    <i class="fa-solid fa-bus"></i><h3>Book My Bus</h3>
                </div>

                <!-- nav list  section ---------------------------------------->
                <div class="nav-list">
                    <ul>
                        <li><a href="span.php">home</a></li>
                        <li><a href="print.php">manage
                                ticket</a></li>
                        <li><a href="#">home</a></li>
                        <li><a href="contact.php">contact us</a></li>
                    </ul>

                </div>

            </div>

            <div class="form-flex">

                <div class="left-form">
                    <h3>fill your information</h3>

                    <div class="kt-flex">
                     <input type="text" value="kakarvitta" disabled>
                     <input type="text" value="kathmandu" disabled>
                      <input type="date" >
                   </div>
                   <h5>Bus name: <span></span></h5>
                   <h5>Seats: <span></span></h5>
                   
                   <div class="form">
                   <form>
                   <input type="text" placeholder="Enter your name">
                   <input type="text" placeholder="Enter your number">
                   <input type="text" placeholder="Enter your email">
                   </form>
                   </div>

                </div>

                <div class="right-payment">
                    <h3>payment</h3>
           
                    <div class="price">

                                    <h5>Total amount: <span
                                            id="total-amount-1"></span></h5>
                                </div>

                                <p>Pay via online</p>
                                        <div class="payment-gateway">
                                <img src="All image/esewa.png" >
                                <img src="All image/ime-main.svg" >
                                </div>

                                <button>pay</button>
                </div>



            </div>

            


</div>

</body>