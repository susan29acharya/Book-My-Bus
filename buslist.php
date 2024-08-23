<?php
session_start();

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
    <link rel="stylesheet" href="buslist.css">
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
                    <li><a href="print.php">manage
                            ticket</a></li>
                    <li><a href="tours.php">tour</a></li>
                    <li><a href="contact.php">contact us</a></li>
                </ul>

            </div>

        </div>

        <div class="flexing">

            <div class="kd-kt">
                <h5>kakarvitta to kathmandu bus tickets</h5>

            </div>
            <?php
            // Retrieve the selected date from the query parameter
            $selectedDate = isset($_GET['date']) ? $_GET['date'] : '';
            ?>

            <div class="kt-flex">
                <input type="text" value="kakarvitta" disabled>
                <input type="text" value="kathmandu" disabled>
                <input type="date" id="dateInput" value="<?php echo htmlspecialchars($selectedDate); ?>" disabled>
            </div>

        </div>

        <div class="buslist-flex">

            <div class="desired-bus">

                <h4>Bus Lists</h4>

                <li>Diamond</li>
                <li>Rocket</li>
                <li>Prime</li>
                <li>Sagarmatha</li>

            </div>

            <div class="list-of-tickets">

                <div class="box1">

                    <div class="details">
                        <h5 id="busName1">Diamond Air bus</h5>
                        <p>Air bus</p>
                        <div class="time-flex">
                            <h4>05:00 PM </h4>
                            <p>--------------------------------</p>
                            <h4>
                                5:00 AM</h4>
                        </div>

                        <div class="h6-flex">
                            <h6>kakarvitta </h6>
                            <h6>kathmandu</h6>
                        </div>

                        <div class="icon-flex">
                            <h6>Facilities:</h6>
                            <i class="fa-solid fa-bottle-water"></i>
                            <i class="fa-solid fa-charging-station"></i>
                            <i class="fa-solid fa-fan"></i>
                            <i class="fa-solid fa-tv"></i>
                            <p>41 seats available</p>
                        </div>

                    </div>

                    <div class="price-book">

                        <h6>Per seat from </h6>
                        <h2>NPR 2000</h2>
                        <h5>Non-refundable</h5>

                        <button onclick="hideshow()">view seat</button>

                    </div>

                </div>

                <div class="seats" id="seat">

                    <div class="list-price-flex">
                        <div class="seat-list">
                            <div class="driver">
                                <img src="./All image/driver.svg">
                            </div>
                            <div class="whole-seat-flex">
                                <div class="first-flex">
                                    <div class="column1">
                                        <div class="seat" onclick="selectSeat('seatList1', 'A1')">A1</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'A2')">A2</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'A3')">A3</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'A4')">A4</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'A5')">A5</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'A6')">A6</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'A7')">A7</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'A8')">A8</div>
                                    </div>
                                    <div class="column2">
                                        <div class="seat" onclick="selectSeat('seatList1', 'B1')">B1</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'B2')">B2</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'B3')">B3</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'B4')">B4</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'B5')">B5</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'B6')">B6</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'B7')">B7</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'B8')">B8</div>
                                    </div>
                                </div>

                                <div class="second-flex">
                                    <div class="column3">
                                        <div class="seat" onclick="selectSeat('seatList1', 'C1')">C1</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'C2')">C2</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'C3')">C3</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'C4')">C4</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'C5')">C5</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'C6')">C6</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'C7')">C7</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'C8')">C8</div>
                                    </div>
                                    <div class="column4">
                                        <div class="seat" onclick="selectSeat('seatList1', 'D1')">D1</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'D2')">D2</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'D3')">D3</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'D4')">D4</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'D5')">D5</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'D6')">D6</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'D7')">D7</div>
                                        <div class="seat" onclick="selectSeat('seatList1', 'D8')">D8</div>
                                    </div>
                                </div>
                            </div>

                            <div class="last-row">
                                <div class="seat" onclick="selectSeat('seatList1', 'E1')">E1</div>
                                <div class="seat" onclick="selectSeat('seatList1', 'E2')">E2</div>
                                <div class="seat" onclick="selectSeat('seatList1', 'E3')">E3</div>
                                <div class="seat" onclick="selectSeat('seatList1', 'E4')">E4</div>
                                <div class="seat" onclick="selectSeat('seatList1', 'E5')">E5</div>

                            </div>
                        </div>

                        <div class="price">
                            <h5>Seats: <span id="selected-seats-1"></span></h5>
                            <h5>Total amount: <span id="total-amount-1"></span></h5>
                            <div class="buttondiv">
                                <button
                                    onclick="checkAndContinue('busName1', 'selected-seats-1', 'total-amount-1')">Continue</button>
                                <button onclick="resetSelection('seatList1')">Reset</button>
                            </div>

                            <div class="seat-legend">
                                <div class="available">
                                    <h6></h6>
                                    <p>Available</p>
                                </div>
                                <div class="choosed">
                                    <h6></h6>
                                    <p> Choosed</p>
                                </div>
                                <div class="booked">
                                    <h6></h6>
                                    <p> Booked</p>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>

                <div class="box1">

                    <div class="details">
                        <h5 id="busName2">Sagarmatha Deluxe bus</h5>
                        <p>Deluxe bus</p>
                        <div class="time-flex">
                            <h4>03:00 PM </h4>
                            <p>--------------------------------</p>
                            <h4>
                                3:00 AM</h4>
                        </div>

                        <div class="h6-flex">
                            <h6>kakarvitta </h6>
                            <h6>kathmandu</h6>
                        </div>

                        <div class="icon-flex">
                            <h6>Facilities:</h6>
                            <i class="fa-solid fa-bottle-water"></i>
                            <i class="fa-solid fa-charging-station"></i>
                            <i class="fa-solid fa-fan"></i>
                            <i class="fa-solid fa-tv"></i>
                            <p>41 seats available</p>
                        </div>

                    </div>

                    <div class="price-book">

                        <h6>Per seat from </h6>
                        <h2>NPR 1700</h2>
                        <h5>Non-refundable</h5>

                        <button onclick="hidesho()">view seat</button>

                    </div>

                </div>
                <div class="seats" id="seatt">

                    <div class="list-price-flex">
                        <div class="seat-list">
                            <div class="driver">
                                <img src="./All image/driver.svg">
                            </div>
                            <div class="whole-seat-flex">
                                <div class="first-flex">
                                    <div class="column1">
                                        <div class="seat" onclick="selectSeat('seatList2', 'A1')">A1</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'A2')">A2</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'A3')">A3</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'A4')">A4</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'A5')">A5</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'A6')">A6</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'A7')">A7</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'A8')">A8</div>
                                    </div>
                                    <div class="column2">
                                        <div class="seat" onclick="selectSeat('seatList2', 'B1')">B1</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'B2')">B2</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'B3')">B3</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'B4')">B4</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'B5')">B5</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'B6')">B6</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'B7')">B7</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'B8')">B8</div>
                                    </div>
                                </div>

                                <div class="second-flex">
                                    <div class="column3">
                                        <div class="seat" onclick="selectSeat('seatList2', 'C1')">C1</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'C2')">C2</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'C3')">C3</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'C4')">C4</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'C5')">C5</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'C6')">C6</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'C7')">C7</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'C8')">C8</div>
                                    </div>
                                    <div class="column4">
                                        <div class="seat" onclick="selectSeat('seatList2', 'D1')">D1</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'D2')">D2</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'D3')">D3</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'D4')">D4</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'D5')">D5</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'D6')">D6</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'D7')">D7</div>
                                        <div class="seat" onclick="selectSeat('seatList2', 'D8')">D8</div>
                                    </div>
                                </div>
                            </div>

                            <div class="last-row">
                                <div class="seat" onclick="selectSeat('seatList2', 'E1')">E1</div>
                                <div class="seat" onclick="selectSeat('seatList2', 'E2')">E2</div>
                                <div class="seat" onclick="selectSeat('seatList2', 'E3')">E3</div>
                                <div class="seat" onclick="selectSeat('seatList2', 'E4')">E4</div>
                                <div class="seat" onclick="selectSeat('seatList2', 'E5')">E5</div>

                            </div>
                        </div>

                        <div class="price">
                            <h5>Seats: <span id="selected-seats-2"></span></h5>
                            <h5>Total amount: <span id="total-amount-2"></span></h5>
                            <div class="buttondiv">
                                <button
                                    onclick="checkAndContinue('busName2', 'selected-seats-2', 'total-amount-2')">Continue</button>
                                <button onclick="resetSelection('seatList2')">Reset</button>
                            </div>

                            <div class="seat-legend">
                                <div class="available">
                                    <h6></h6>
                                    <p>Available</p>
                                </div>
                                <div class="choosed">
                                    <h6></h6>
                                    <p> Choosed</p>
                                </div>
                                <div class="booked">
                                    <h6></h6>
                                    <p> Booked</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="box1">

                    <div class="details">
                        <h5 id="busName3">Rocket Air bus</h5>
                        <p>Air bus</p>
                        <div class="time-flex">
                            <h4>04:00 PM </h4>
                            <p>--------------------------------</p>
                            <h4>
                                4:00 AM</h4>
                        </div>

                        <div class="h6-flex">
                            <h6>kakarvitta </h6>
                            <h6>kathmandu</h6>
                        </div>

                        <div class="icon-flex">
                            <h6>Facilities:</h6>
                            <i class="fa-solid fa-bottle-water"></i>
                            <i class="fa-solid fa-charging-station"></i>
                            <i class="fa-solid fa-fan"></i>
                            <i class="fa-solid fa-tv"></i>
                            <p>41 seats available</p>
                        </div>

                    </div>

                    <div class="price-book">

                        <h6>Per seat from </h6>
                        <h2>NPR 1950</h2>
                        <h5>Non-refundable</h5>

                        <button onclick="hide()">view seat</button>

                    </div>

                </div>
                <div class="seats" id="seattt">

                    <div class="list-price-flex">
                        <div class="seat-list">
                            <div class="driver">
                                <img src="./All image/driver.svg">
                            </div>
                            <div class="whole-seat-flex">
                                <div class="first-flex">
                                    <div class="column1">
                                        <div class="seat" onclick="selectSeat('seatList3', 'A1')">A1</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'A2')">A2</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'A3')">A3</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'A4')">A4</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'A5')">A5</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'A6')">A6</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'A7')">A7</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'A8')">A8</div>
                                    </div>
                                    <div class="column2">
                                        <div class="seat" onclick="selectSeat('seatList3', 'B1')">B1</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'B2')">B2</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'B3')">B3</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'B4')">B4</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'B5')">B5</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'B6')">B6</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'B7')">B7</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'B8')">B8</div>
                                    </div>
                                </div>

                                <div class="second-flex">
                                    <div class="column3">
                                        <div class="seat" onclick="selectSeat('seatList3', 'C1')">C1</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'C2')">C2</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'C3')">C3</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'C4')">C4</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'C5')">C5</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'C6')">C6</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'C7')">C7</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'C8')">C8</div>
                                    </div>
                                    <div class="column4">
                                        <div class="seat" onclick="selectSeat('seatList3', 'D1')">D1</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'D2')">D2</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'D3')">D3</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'D4')">D4</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'D5')">D5</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'D6')">D6</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'D7')">D7</div>
                                        <div class="seat" onclick="selectSeat('seatList3', 'D8')">D8</div>
                                    </div>
                                </div>
                            </div>

                            <div class="last-row">
                                <div class="seat" onclick="selectSeat('seatList3', 'E1')">E1</div>
                                <div class="seat" onclick="selectSeat('seatList3', 'E2')">E2</div>
                                <div class="seat" onclick="selectSeat('seatList3', 'E3')">E3</div>
                                <div class="seat" onclick="selectSeat('seatList3', 'E4')">E4</div>
                                <div class="seat" onclick="selectSeat('seatList3', 'E5')">E5</div>

                            </div>
                        </div>

                        <div class="price">
                            <h5>Seats: <span id="selected-seats-3"></span></h5>
                            <h5>Total amount: <span id="total-amount-3"></span></h5>
                            <div class="buttondiv">
                                <button
                                    onclick="checkAndContinue('busName3', 'selected-seats-3', 'total-amount-3')">Continue</button>
                                <button onclick="resetSelection('seatList3')">Reset</button>
                            </div>

                            <div class="seat-legend">
                                <div class="available">
                                    <h6></h6>
                                    <p>Available</p>
                                </div>
                                <div class="choosed">
                                    <h6></h6>
                                    <p> Choosed</p>
                                </div>
                                <div class="booked">
                                    <h6></h6>
                                    <p> Booked</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box1">

                    <div class="details">
                        <h5 id="busName4">Prime Super Deluxe</h5>
                        <p>Super deluxe</p>
                        <div class="time-flex">
                            <h4>03:30 PM </h4>
                            <p>--------------------------------</p>
                            <h4>
                                3:30 AM</h4>
                        </div>

                        <div class="h6-flex">
                            <h6>kakarvitta </h6>
                            <h6>kathmandu</h6>
                        </div>

                        <div class="icon-flex">
                            <h6>Facilities:</h6>
                            <i class="fa-solid fa-bottle-water"></i>
                            <i class="fa-solid fa-charging-station"></i>
                            <i class="fa-solid fa-fan"></i>
                            <i class="fa-solid fa-tv"></i>
                            <p>41 seats available</p>
                        </div>

                    </div>

                    <div class="price-book">

                        <h6>Per seat from </h6>
                        <h2>NPR 1800</h2>
                        <h5>Non-refundable</h5>

                        <button onclick="hidee()">view seat</button>

                    </div>

                </div>
                <div class="seats" id="seatttt">

                    <div class="list-price-flex">
                        <div class="seat-list">
                            <div class="driver">
                                <img src="./All image/driver.svg">
                            </div>
                            <div class="whole-seat-flex">
                                <div class="first-flex">
                                    <div class="column1">
                                        <div class="seat" onclick="selectSeat('seatList4', 'A1')">A1</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'A2')">A2</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'A3')">A3</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'A4')">A4</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'A5')">A5</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'A6')">A6</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'A7')">A7</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'A8')">A8</div>
                                    </div>
                                    <div class="column2">
                                        <div class="seat" onclick="selectSeat('seatList4', 'B1')">B1</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'B2')">B2</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'B3')">B3</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'B4')">B4</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'B5')">B5</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'B6')">B6</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'B7')">B7</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'B8')">B8</div>
                                    </div>
                                </div>

                                <div class="second-flex">
                                    <div class="column3">
                                        <div class="seat" onclick="selectSeat('seatList4', 'C1')">C1</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'C2')">C2</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'C3')">C3</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'C4')">C4</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'C5')">C5</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'C6')">C6</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'C7')">C7</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'C8')">C8</div>
                                    </div>
                                    <div class="column4">
                                        <div class="seat" onclick="selectSeat('seatList4', 'D1')">D1</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'D2')">D2</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'D3')">D3</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'D4')">D4</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'D5')">D5</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'D6')">D6</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'D7')">D7</div>
                                        <div class="seat" onclick="selectSeat('seatList4', 'D8')">D8</div>
                                    </div>
                                </div>
                            </div>

                            <div class="last-row">
                                <div class="seat" onclick="selectSeat('seatList4', 'E1')">E1</div>
                                <div class="seat" onclick="selectSeat('seatList4', 'E2')">E2</div>
                                <div class="seat" onclick="selectSeat('seatList4', 'E3')">E3</div>
                                <div class="seat" onclick="selectSeat('seatList4', 'E4')">E4</div>
                                <div class="seat" onclick="selectSeat('seatList4', 'E5')">E5</div>

                            </div>
                        </div>

                        <div class="price">
                            <h5>Seats: <span id="selected-seats-4"></span></h5>
                            <h5>Total amount: <span id="total-amount-4"></span></h5>

                            <div class="buttondiv">
                                <button
                                    onclick="checkAndContinue('busName4', 'selected-seats-4', 'total-amount-4')">Continue</button>
                                <button onclick="resetSelection('seatList4')">Reset</button>
                            </div>

                            <div class="seat-legend">
                                <div class="available">
                                    <h6></h6>
                                    <p>Available</p>
                                </div>
                                <div class="choosed">
                                    <h6></h6>
                                    <p> Choosed</p>
                                </div>
                                <div class="booked">
                                    <h6></h6>
                                    <p> Booked</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
<script>
    let div = document.getElementById('seat');
    let isDisplayed = false;

    function hideshow() {
        if (isDisplayed) {
            div.style.display = 'none';
        } else {
            div.style.display = 'block';
        }
        isDisplayed = !isDisplayed;
    }
    let dive = document.getElementById('seatt');
    let isDisplayeed = false;

    function hidesho() {
        if (isDisplayeed) {
            dive.style.display = 'none';
        } else {
            dive.style.display = 'block';
        }
        isDisplayeed = !isDisplayeed;
    }
    let divee = document.getElementById('seattt');
    let isDisplayeeed = false;
    function hide() {
        if (isDisplayeeed) {
            divee.style.display = 'none';
        } else {
            divee.style.display = 'block';
        }
        isDisplayeeed = !isDisplayeeed;
    }
    let diveee = document.getElementById('seatttt');
    let isDisplayeeeed = false;
    function hidee() {
        if (isDisplayeeeed) {
            diveee.style.display = 'none';
        } else {
            diveee.style.display = 'block';
        }
        isDisplayeeeed = !isDisplayeeeed;
    }



    const seatData = {
        seatList1: { selectedSeats: [], seatPrice: 2000 },
        seatList2: { selectedSeats: [], seatPrice: 1700 },
        seatList3: { selectedSeats: [], seatPrice: 1950 },
        seatList4: { selectedSeats: [], seatPrice: 1800 }
    };

    // Function to select a seat
    function selectSeat(listId, seat) {
        const seatElement = document.querySelector(`[onclick="selectSeat('${listId}', '${seat}')"]`);

        if (seatElement.classList.contains('booked')) {
            return; // If the seat is booked, do nothing
        }

        const list = seatData[listId];
        if (!list.selectedSeats.includes(seat)) {
            list.selectedSeats.push(seat);
            seatElement.style.backgroundColor = "blue"; // Set selected seat background to blue
            seatElement.style.color = "white"; // Set selected seat text to white
        } else {
            list.selectedSeats = list.selectedSeats.filter(s => s !== seat);
            seatElement.style.backgroundColor = ""; // Reset background color
            seatElement.style.color = ""; // Reset text color
        }

        updateDisplay(listId);
    }

    // Function to update seat display
    function updateDisplay(listId) {
        const list = seatData[listId];
        const listNumber = listId.replace('seatList', '');
        document.getElementById(`selected-seats-${listNumber}`).innerText = list.selectedSeats.join(', ');
        document.getElementById(`total-amount-${listNumber}`).innerText = list.selectedSeats.length * list.seatPrice;
    }

    // Function to check selected seats and continue
    function checkAndContinue(busId, seatsId, totalAmountId) {
        // Save the bus name
        const busName = document.getElementById(busId).innerText;
        localStorage.setItem('busName', busName);

        // Save the selected seats
        const seats = document.getElementById(seatsId).innerText;
        localStorage.setItem('selectedSeats', seats);

        // Save the total amount
        const totalAmount = document.getElementById(totalAmountId).innerText;
        localStorage.setItem('totalAmount', totalAmount);

        // Check if at least one seat is selected
        const seatLists = ['seatList1', 'seatList2', 'seatList3', 'seatList4'];
        let anySeatsSelected = false;

        for (const listId of seatLists) {
            const selectedSeats = document.getElementById(`selected-seats-${listId.slice(-1)}`).textContent.trim();
            if (selectedSeats !== "") {
                anySeatsSelected = true;
                break;
            }
        }

        if (!anySeatsSelected) {
            alert("Please select at least one seat.");
        } else {
            const selectedDate = document.getElementById('dateInput') ? document.getElementById('dateInput').value : '';
            localStorage.setItem('selectedDate', selectedDate);
            window.location.href = 'form.php';
        }
    }

    // Function to reset the seat selection
    function resetSelection(listId) {
        const list = seatData[listId];
        list.selectedSeats = [];

        // Reset the colors of all seats in the list
        const seatElements = document.querySelectorAll(`.seat[onclick*="'${listId}'"]`);
        seatElements.forEach(seatElement => {
            const seatId = seatElement.textContent;

            // Only reset seats that are not booked
            if (!seatElement.classList.contains('booked')) {
                seatElement.style.backgroundColor = "white"; // Set background color to white
                seatElement.style.color = "black"; // Set text color to black
            }
        });

        updateDisplay(listId);
    }

    // Function to randomly mark 20 seats as booked
    function markSeatsAsBooked() {
        // Get all seat divs
        const allSeats = document.querySelectorAll('.seat');
        const totalSeats = allSeats.length;

        // Define the minimum and maximum number of seats to be booked
        const minBookedSeats = 15;
        const maxBookedSeats = 20;

        // Ensure the total seats are enough to book the minimum required
        if (totalSeats < minBookedSeats) {
            console.error("Not enough seats to book the minimum required seats.");
            return;
        }

        // Randomly determine how many seats to book, ensuring it's between min and max
        const numSeatsToBook = Math.floor(Math.random() * (maxBookedSeats - minBookedSeats + 1)) + minBookedSeats;

        // Create a set to store randomly selected seat indices
        const bookedIndices = new Set();

        // Randomly select seats until the desired number is reached
        while (bookedIndices.size < numSeatsToBook) {
            const randomIndex = Math.floor(Math.random() * totalSeats);
            bookedIndices.add(randomIndex);
        }

        // Mark the selected seats as booked
        bookedIndices.forEach(index => {
            const seatElement = allSeats[index];
            seatElement.style.backgroundColor = "black"; // Set background color to black
            seatElement.style.color = "white"; // Set text color to white
            seatElement.classList.add("booked"); // Add a class to identify booked seats
            seatElement.setAttribute("title", "Already booked"); // Add hover text
        });
    }


    // Initialize the page with booked seats
    window.onload = function () {
        markSeatsAsBooked();
    };



</script>

</html>