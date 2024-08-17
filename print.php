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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>print\cancel</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link rel="stylesheet" href="print.css">
    </head>
    <body>
        <div class="print_ticket">

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
            <div class="nav2">

                <!-- logo sec section ---------------------------------------->
                <div class="logo-sec">
                    <i class="fa-solid fa-bus"></i><h3>Book My Bus</h3>
                </div>

                <!-- nav list  section ---------------------------------------->
                <div class="nav-list">
                    <ul>
                        <li><a href="span.php">home</a></li>
                        <li><a href="print.php" target="_blank">manage
                                ticket</a></li>
                        <li><a href="#">home</a></li>
                        <li><a href="contact.php">contact us</a></li>
                    </ul>

                </div>

            </div>

            <!-- cancle and print ticket section  ---------------------------->
            <div class="cancle-print-section">



                <div class="ticket-flex">

                    <div class="print-form">
                        <form>

                            <h1>Print Ticket</h1>

                            <input type="number"
                                placeholder="Ticket number"><br>

                            <input type="number" placeholder="Ticket date"><br>

                            <button><a href="#">search</a></button>

                        </form>
                    </div>

                    <div class="cancle-form">
                        <form>

                            <h1>Cancle Ticket</h1>
                            <p><b>Note:</b> <span>Please be advised that tickets for
                                today's trip date cannot be canceled.</span></p>

                            
                            <input type="number" placeholder="Ticket number"><br>

                          
                            <input type="number" placeholder="Ticket date"><br>

                            <button><a href="#">search</a></button>

                        </form>
                    </div>

                </div>

            </div>

        </div>
    </body>
</html>