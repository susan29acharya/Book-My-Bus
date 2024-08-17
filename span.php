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
        <link rel="stylesheet" href="span.css">
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
                        <li><a href="print.php" >manage
                                ticket</a></li>
                        <li><a href="#">home</a></li>
                        <li><a href="contact.php">contact us</a></li>
                    </ul>

                </div>

            </div>

            <!-- end of nav bar 2 section ---------------------------------------->

            <!--main body section ---------------------------------------->
            <div id="span-body">

                <!--left span body section ---------------------------------------->
                <div class="left-span-body">
                

                    <h1><span>"</span>Difficult roads often lead to beautiful
                        destinations<span>"</span></h1>
                </div>

                <!--right span body section ---------------------------------------->
                <div class="right-span-body">
                    <h2>search bus</h2>

                    <!--search form section ---------------------------------------->
                    <div class="search-form">
                    <form>
        <i class="fa-solid fa-bus-simple"></i><label>from</label><br>
        <input type="text" value="KAKARVITTA" disabled><br>

        <i class="fa-solid fa-location-dot"></i><label>to</label><br>
        <input type="text" value="KATHMANDU" disabled><br>

        <i class="fa-regular fa-calendar-days"></i><label>date</label><br>
        <input type="date" id="date-input"><br>

        <div class="search-button">
            <button type="button" onclick="searchBus()">Search</button>
        </div>
    </form>
                    </div>

                </div>

            </div>
            <!--End of main body section ---------------------------------------->

        </div>
        <!-- End of span body page section ---------------------------------------->

        <!-- about book my bus ---------------------------------------------------->

        <div id="book-my-bus-info">
            <h1>Welcome to <span>Book My Bus</span></h1>
            <p> "Book My Bus" came into existence with a vision of innovating
                business processes of Travel Operators in Nepal to provide
                quality service to road passengers. Book My Bus ensures the
                tickets
                booking accessible to passengers at transparent prices with no
                booking charges. Passengers can get the most accurate real time
                data of bus seat availability from among the list of operators.
            </p>

            <h2>Feature Buses</h2>

            <!-- div for buses list---------------------------------------->
            <div class="buses">

                <div class="bus-container">
                    <div class="bus-img">
                        <img src="All image/diamond.jpg">
                    </div>

                    <div class="bus-info">
                        <h5>Diamond</h5>

                        <p>Facilities</p>

                        <div class="facilities">
                            <i class="fa-solid fa-wifi"></i><p>Wifi</p>
                            <i class="fa-solid fa-bowl-food"></i><p>Food</p>
                            <i class="fa-solid fa-music"></i><p>Music</p>
                            <i class="fa-solid fa-fan"></i><p>Ac</p>

                        </div>

                    </div>

                </div>

                <div class="bus-container">
                    <div class="bus-img">
                        <img src="All image/rocket.jpg">
                    </div>

                    <div class="bus-info">
                        <h5>Rocket</h5>

                        <p>Facilities</p>

                        <div class="facilities">
                            <i class="fa-solid fa-wifi"></i><p>Wifi</p>
                            <i class="fa-solid fa-bowl-food"></i><p>Food</p>
                            <i class="fa-solid fa-music"></i><p>Music</p>
                            <i class="fa-solid fa-fan"></i><p>Ac</p>

                        </div>
                    </div>

                </div>

                <div class="bus-container">
                    <div class="bus-img">
                        <img src="All image/prime.jpg">
                    </div>

                    <div class="bus-info">
                        <h5>Prime</h5>

                        <p>Facilities</p>

                        <div class="facilities">
                            <i class="fa-solid fa-wifi"></i><p>Wifi</p>
                            <i class="fa-solid fa-bowl-food"></i><p>Food</p>
                            <i class="fa-solid fa-music"></i><p>Music</p>
                            <i class="fa-solid fa-fan"></i><p>Ac</p>

                        </div>
                    </div>

                </div>

                <div class="bus-container">
                    <div class="bus-img">
                        <img src="All image/sagarmatha.jpg">
                    </div>

                    <div class="bus-info">
                        <h5>Sagarmatha</h5>

                        <p>Facilities</p>

                        <div class="facilities">
                            <i class="fa-solid fa-wifi"></i><p>Wifi</p>
                            <i class="fa-solid fa-bowl-food"></i><p>Food</p>
                            <i class="fa-solid fa-music"></i><p>Music</p>
                            <i class="fa-solid fa-fan"></i><p>Ac</p>

                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div id="review-events">

            <h2>customer <span>feedbacks</span></h2>

            <div class="feedback-flex">

                <div class="feedback-box1">

                    <div class="box1">
                        <div class="img">
                            <img src="./All image/vinay.jpg" />
                        </div>

                        <div class="feedback-p">
                            <p><b>Vinay sonar</b> | <span> kakarvitta -
                                    kathmandu </span></p>
                            <p>Good Platform for getting appropriate route !</p>
                        </div>
                    </div>

                    <div class="box1">
                        <div class="img">
                            <img src="./All image/susan.jpg" />
                        </div>

                        <div class="feedback-p">
                            <p><b>Susan acharya</b> | <span> kakarvitta -
                                    kathmandu </span></p>
                            <p>Good Platform for getting appropriate route !</p>
                        </div>
                    </div>

                </div>

                <div class="feedback-box2">
                    <div class="box1">
                        <div class="img">
                            <img src="./All image/manjil.jpg" />
                        </div>

                        <div class="feedback-p">
                            <p><b>Manjil bhattarai</b> | <span> kakarvitta -
                                    kathmandu </span></p>
                            <p>Good Platform for getting appropriate route !</p>
                        </div>
                    </div>

                    <div class="box1">
                        <div class="img">
                            <img src="./All image/santosh.jpg" />
                        </div>

                        <div class="feedback-p">
                            <p><b>Santosh bhandari</b> | <span> kakarvitta -
                                    kathmandu </span></p>
                            <p>Good Platform for getting appropriate route !</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="useful-links">

            <div class="about">
                <h5>About us</h5>
                <li><a href="#book-my-bus-info">About</a></li>
                <li><a href="#review-events">Reviews</a></li>
                <li><a href="contact.html">Contact</a></li>

            </div>

            <div class="links">
                <h5>Useful links</h5>
                <li><a href="#nav2">Home</a></li>
                <li><a href="print.html">Manage Tickets</a></li>
                <li><a href="#">abcd</a></li>
                <li><a href="contact.html">Contact</a></li>

            </div>

            <div class="routs">
                <h5>Routs</h5>
                <p>kakarvitta - Kathmandu</p>
            </div>

            <div class="social-media">
                <h5>Stay connected</h5>
                <div class="icon-flex">
                    <div class="facebook"> <i class="fa-brands fa-facebook"
                            class="face"></i></div>
                    <div class="instagram"><i
                            class="fa-brands fa-instagram"></i></div>
                    <div class="whatsapp"><i
                            class="fa-brands fa-whatsapp"></i></div>

                </div>
            </div>

        </div>


<script>
function checkLogin(event) {
    event.preventDefault();
    // Get the content of the <p> tag
    var userMessage = document.getElementById("user-message").textContent.trim();
    var dateInput = document.getElementById("date-input").value;
    
    // Check if the <p> tag is empty
    if (userMessage === "") {
        alert("Login first");
    } 
    else if (dateInput === "") {
        alert("enter date");
    } 
    else {
        // If the <p> tag has content, navigate to the buslist.html page
        window.location.href = "http://localhost/Book-My-Bus/buslist.php";
    }
}
function searchBus() {
            const date = document.getElementById("date-input").value;
            if (date) {
                // Redirect to buslist.php with the selected date as a query parameter
                window.location.href = "buslist.php?date=" + date;
            } else {
                alert("Please select a date.");
            }
        }    
        
        
        </script>
    </body>
</html>