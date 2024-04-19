<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="logo.jpg">
    <link rel="stylesheet" href="./style.css">
    <script src="menu.js"></script>
</head>

<body>
    <div class="container">
        <aside>
            <div class="logo">
                <img src="Where Every Journey Beginslogo1.png">
                <h2>Traveltastic</h2>
                <h3>Where Every Journey Begins</h3>
            </div>

            <div class="sidebar">
                <a href="dashboard.php" class="active">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="customer.php">
                    <span class="material-icons-sharp">person</span>
                    <h3>Customers</h3>
                </a>

                <a href="package.php">
                    <span class="material-icons-sharp">all_inclusive</span>
                    <h3>Packages</h3>
                </a>

                <a href="hotel.php">
                    <span class="material-icons-sharp">hotel</span>
                    <h3>Hotels</h3>
                </a>

                <a href="transport.php">
                    <span class="material-icons-sharp">commute</span>
                    <h3>Transport</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!--------------------End of Aside-------------------->
        <main>
            <h1>Dashboard</h1>
            <div class="cards">
                <?php
                // Database connection parameters
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tourismmanagementcompany";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to count the number of customers
                $sql_customers = "SELECT COUNT(*) AS total_customers FROM CustomerDetails";
                $result_customers = $conn->query($sql_customers);

                // Query to count the number of transport entries
                $sql_total_package = "SELECT COUNT(*) AS total_package FROM bookingpackage";
                $result_total_package = $conn->query($sql_total_package);

                // Query to count the number of hotel entries
                $sql_hotels = "SELECT COUNT(*) AS total_hotels FROM Hotel";
                $result_hotels = $conn->query($sql_hotels);


                // SQL query to count the mode of each transport
                $sql_mode_count = "SELECT Tmode, COUNT(*) AS mode_count FROM Transport GROUP BY Tmode";
                $result_mode_count = $conn->query($sql_mode_count);

                // SQL query to fetch total_amt values
                $sql_total_amt = "SELECT total_amt FROM Books";
                $result_total_amt = $conn->query($sql_total_amt);

                // Task 1: Join BookingPackage and Books tables to find the package booked the maximum number of times and display its location
                $sql_max_booked_package = "SELECT bp.BookingId, bp.Location, COUNT(*) AS booking_count 
FROM BookingPackage bp
INNER JOIN Books b ON bp.BookingId = b.BId
GROUP BY bp.BookingId
ORDER BY booking_count DESC 
LIMIT 1";
                $result_max_booked_package = $conn->query($sql_max_booked_package);

                $hotelquery = "SELECT Hrating 
          FROM Hotel 
          GROUP BY Hrating 
          ORDER BY COUNT(Hid) DESC 
          LIMIT 1";

                $hotelresult = $conn->query($hotelquery);

                $favourite_customer_query = "SELECT COUNT(books.Cid) AS freq, customerdetails.Cname, customerdetails.Cphno, books.Cid
          FROM customerdetails
          INNER JOIN books ON customerdetails.Cid = books.Cid
          GROUP BY books.Cid
          ORDER BY freq DESC
          LIMIT 1";

                $favourite_customer_result = $conn->query($favourite_customer_query);


                ?>
                <div class="cust_sales">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <?php
                            // Display results
                            if ($result_customers->num_rows > 0) {
                                // Output data of each row for customers
                                while ($row = $result_customers->fetch_assoc()) {

                            ?>
                                    <h1>
                                        <?php echo "Total number of customers: " . $row["total_customers"] . "<br>";
                                        ?>
                                    </h1>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <div class="Tours_sales">
                    <span class="material-icons-sharp">trending_up</span>
                    <div class="middle">
                        <div class="left">
                            <div class="left">
                                <?php
                                // Display results
                                if ($result_customers->num_rows > 0) {
                                    // Output data of each row for customers
                                    while ($row = $result_customers->fetch_assoc()) {

                                ?>
                                        <h1>
                                            <?php echo  $row["total_customers"] . "<br>";
                                            ?>
                                        </h1>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </div>
                            <?php
                            if ($result_total_package->num_rows > 0) {
                                // Output data of each row for total_package
                                while ($row = $result_total_package->fetch_assoc()) {
                            ?>
                                    <h1>
                                        <?php
                                        echo "Total number packages entries: "                             . $row["total_package"] . "<br>";
                                        ?>
                                    </h1>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </div>

                    </div>
                    <!-- <small class="text-muted">Last Month</small> -->
                </div>
                <div class="hotels">
                    <span class="material-icons-sharp">room_service</span>
                    <div class="middle">
                        <div class="left">
                            <?php
                            if ($result_hotels->num_rows > 0) {
                                // Output data of each row for hotels
                                while ($row = $result_hotels->fetch_assoc()) {

                            ?>
                                    <h1>
                                        <?php
                                        echo "Total number of hotel entries: " . $row["total_hotels"] . "<br>";
                                        ?>
                                    </h1>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }

                            // Close connection
                            $conn->close();
                            ?>
                        </div>

                    </div>
                    <!-- <small class="text-muted">Last Month</small> -->
                </div>
                <div class="transport">
                    <span class="material-icons-sharp">airplane_ticket</span>
                    <div class="middle">
                        <div class="left">
                            <h2>Transport Dataset</h2>
                            <div class="left">
                                <?php
                                // Check if there are rows returned for mode count
                                if ($result_mode_count->num_rows > 0) {
                                    // Output the counts
                                    while ($row_mode_count = $result_mode_count->fetch_assoc()) {
                                ?>
                                        <h2>
                                            <?php

                                            echo  $row_mode_count["Tmode"] . "-" . $row_mode_count["mode_count"] . "<br>";
                                            ?>
                                        </h2>
                                <?php

                                    }
                                } else {
                                    echo "No records  <br>";
                                } ?>
                            </div>
                        </div>

                    </div>
                    <!-- <small class="text-muted">Car or Bus :</small> -->
                </div>
                <div class="revenue">
                    <span class="material-icons-sharp">payments</span>
                    <div class="middle">
                        <div class="left">
                            <h2>Total Revenue generated</h2>
                            <?php
                            // Check if there are rows returned for total_amt
                            if ($result_total_amt->num_rows > 0) {
                                // Initialize total sum
                                $totalSum = 0;

                                // Loop through each row and add total_amt to sum
                                while ($row_total_amt = $result_total_amt->fetch_assoc()) {
                                    $totalSum += $row_total_amt["total_amt"];
                                }
                            ?><h1><?php
                                    // Output the total sum
                                    echo  $totalSum . "<br>";
                                    ?></h1><?php
                                        } else {
                                            echo "No records found for total_amt <br>";
                                        }
                                            ?>
                        </div>

                    </div>
                </div>


                <h1>Favorites</h1>
                <div class="Tours_sales">
                    <span class="material-icons-sharp">favorite</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Packages</h3>
                            <?php
                            if ($result_max_booked_package->num_rows > 0) {
                                $row_max_booked_package = $result_max_booked_package->fetch_assoc();
                                $max_booked_package_id = $row_max_booked_package["BookingId"];
                                $max_booked_package_location = $row_max_booked_package["Location"];
                            ?><h1><?php
                                    echo " $max_booked_package_id, $max_booked_package_location <br>";
                                    ?></h1><?php
                                        } else {
                                            echo "No records <br>";
                                        }
                                            ?>
                        </div>

                    </div>
                    <!-- <small class="text-muted">Last Month</small> -->
                </div>
                <div class="hotels">
                    <span class="material-icons-sharp">favorite</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Customer</h3>
                            <?php
                            if ($favourite_customer_result->num_rows > 0) {
                                // output data of each row
                                while ($row = $favourite_customer_result->fetch_assoc()) {
                            ?>
                                    <h2>
                                        <?php
                                        echo "Customer ID: " . $row["Cid"] . "<br>";
                                        ?>
                                    </h2>
                                    <h2>
                                        <?php echo             "Name: " . $row["Cname"] . "<br>";
                                        ?></h2><?php

                                            }
                                        } else {
                                            echo "0 results";
                                        } ?>
                        </div>

                    </div>
                    <!-- <small class="text-muted">Car or Bus :</small> -->
                </div>
                <div class="transport">
                    <span class="material-icons-sharp">favorite</span>
                    <div class="middle">
                        <div class="left">
                            <h1>Most Preferred Hotel Type-</h1>
                            <?php
                            if ($hotelresult->num_rows > 0) {
                                // output data of each row
                                while ($row = $hotelresult->fetch_assoc()) {
                            ?>
                                    <h1>


                                        <?php
                                        echo  $row["Hrating"];
                                        ?>
                                    </h1>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            } ?>
                        </div>

                    </div>
                    <!-- <small class="text-muted">Car or Bus :</small> -->
                </div>


            </div>


            <div id="bookingDetails" class="recentorder">
                <?php
                // Database connection parameters
                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "tourismmanagementcompany";

                // Connect to the database
                $conn = mysqli_connect($host, $username, $password, $database);

                if (!$conn) {
                    die("Connection Error: " . mysqli_connect_error());
                }
                // Prepare the SQL query to select all booking details
                $sql = "SELECT * FROM Books";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if any rows were returned
                if (mysqli_num_rows($result) > 0) {
                    // Display the table header
                    echo "<table>";
                    echo "<tr><th>Booking ID</th><th>Customer ID</th><th>No. of Tourists</th><th>Total Amount</th></tr>";

                    // Display each row of the result as a table row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['BId'] . "</td>";
                        echo "<td>" . $row['Cid'] . "</td>";
                        echo "<td>" . $row['no_of_tourists'] . "</td>";
                        echo "<td>" . $row['total_amt'] . "</td>";
                        echo "</tr>";
                    }

                    // Close the table
                    echo "</table>";
                } else {
                    // Display a message if no booking details found
                    echo "No booking details found.";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>
        </main>
        <!--------------------End of Main-------------------->

        <div class="right">
            <div class="top">
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Admin</b></p>
                        <!-- <small class="text-nuted">Admin</small> -->
                    </div>
                    <div class="profile-icon">
                        <span class="material-icons-sharp">admin_panel_settings</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>