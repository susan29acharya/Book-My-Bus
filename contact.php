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
    <link rel="stylesheet" href="contact.css">
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
                <i class="fa-solid fa-phone"></i><p>9800000000</p>
                <i class="fa-solid fa-phone"></i><p>9800000000</p>
                <i
                    class="fa-regular fa-envelope"></i><p>bookmybus@gmail.com</p>

                <!--login signup section ---------------------------------------->
                <div class="login-signup">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    <a href="login.php"><p>Login</p></a>

                    <i class="fa-solid fa-user-plus"></i>
                    <a href="signup.php"><p>Signup</p></a>

                </div>
            </div>

        </div><div class="nav">
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
                    <li><a href="print.php" target="_blank">manage ticket</a></li>
                    <li><a href="#">home</a></li>
                    <li><a href="contact.php">contact us</a></li>
                </ul>

            </div>

        </div>

        <!-- cancle and print ticket section  ---------------------------->
         <div class="contact-form">

            <h2>Send a message</h2>
            <p>Our team will contact you soon !</p>

            <div class="flex-container">

                <form action="">
                    <div class="form-left-section">
                        <label>Name</label><br>
                        <input type="text" id="name"><br>

                        <label>Mobile</label><br>
                        <input type="number" id="mobile"><br>

                        <label>Subject</label><br>
                        <input type="text" id="subject"><br>

                        <button onclick="submitform(event)"><a href="#">Submit</a></button>
                    </div>

                    <div class="form-right-section">
                        <label>Email</label><br>
                        <input type="email" id="email"><br>

                        <label>Address</label><br>
                        <input type="text" id="Address"><br>

                        <label>Message</label><br>
                        <textarea id="message"></textarea>

                    </div>
                </form>

            </div>




         </div>






    </div>
</body>
<script>
    let name =document.getElementById('name');
    let mobile = document.getElementById('mobile');
    let subject =document.getElementById('subject');
    let email =document.getElementById('email');
    let Address = document.getElementById('Address');
    let message = document.getElementById('message');

    function submitform (event){
        event.preventDefault();
        if(name.value === "" || mobile.value === "" || subject.value === "" || email.value === "" || Address.value === "" || message.value === "")
    {
        alert("Fill the form");
    }
    else{
        alert("Message sent!! we will contact you soon");
        name.value ="";
        mobile.value = "";
        subject.value = "";
        email.value = "";
        Address.value = "";
        message.value = "";
    }
    }
</script>
</html>