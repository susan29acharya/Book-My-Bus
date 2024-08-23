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
    <title>contact</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="tour.css">
</head>

<body>
    <div class="contact-page">

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

                <!--login signup section ---------------------------------------->
                <div class="login-signup">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    <a href="login.php">
                        <p>Login</p>
                    </a>

                    <i class="fa-solid fa-user-plus"></i>
                    <a href="signup.php">
                        <p>Signup</p>
                    </a>

                </div>
            </div>

        </div>
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
        <div class="nav2">

            <!-- logo sec section ---------------------------------------->
            <div class="logo-sec">
                <i class="fa-solid fa-bus"></i>
                <h3>Book My Bus</h3>
            </div>

            <!-- nav list  section ---------------------------------------->
            <div class="nav-list">
                <ul>
                    <li><a href="span.php">home</a></li>
                    <li><a href="print.php" target="_blank">manage ticket</a></li>
                    <li><a href="tours.php">tour</a></li>
                    <li><a href="contact.php">contact us</a></li>
                </ul>

            </div>

        </div>

        <div class="tours">
            <h2>Popular Tours</h2>

            <div class="container">

                <div class="info">
                    <h3>Muktinath</h3>
                    <p>Muktinath, nestled in the heart of Nepal, is a sacred destination revered by both Hindus and
                        Buddhists. Known for its ancient temple and natural beauty, Muktinath offers a peaceful escape
                        and spiritual rejuvenation.</p>

                    <div class="priceinfo">
                        <a href="https://en.wikipedia.org/wiki/Muktinath" target="_blank">Read more</a>
                        <h4>NPR 10000/P</h4>
                    </div>
                </div>
                <div class="image">
                    <img src="All image/mukti.jpg">
                </div>



            </div>

            <div class="container2">

                <div class="info">
                    <h3>Pathivara</h3>
                    <p>Pathibhara Devi Temple is a sacred Hindu pilgrimage site located in the Taplejung district of
                        eastern Nepal. It is dedicated to Goddess Pathibhara, who is believed to fulfill the wishes of
                        her devotees.</p>

                    <div class="priceinfo">
                        <a href="https://en.wikipedia.org/wiki/Pathibhara_Devi_Temple" target="_blank">Read more</a>
                        <h4>NPR 4000/P</h4>
                    </div>
                </div>
                <div class="image">
                    <img src="All image/pathi.webp">
                </div>



            </div>

            <div class="container3">

                <div class="info">
                    <h3>Pokhara</h3>
                    <p>Pokhara is a metropolitan city located in central Nepal, which serves as the capital of Gandaki
                        Province and is declared as the tourism capital of Nepal.It is the second most populous city of
                        the nation after Kathmandu. </p>


                    <div class="priceinfo">
                        <a href="https://en.wikipedia.org/wiki/Pokhara" target="_blank">Read more</a>

                        <h4>NPR 11000/P</h4>
                    </div>
                </div>
                <div class="image">
                    <img src="All image/pokhara.jfif">
                </div>



            </div>




        </div>


    </div>

    </div>
</body>

</html>