<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Packages</title>
    <link rel="icon" type="image/jpg" href="logo.jpg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="./style1.css">
    <script src="actions.js"></script>
</head>
<style>
    main .recentorder table {
        background-color: var(--color-white);
        width: 100%;
        border-radius: var(--card-border-radius);
        padding: var(--card-padding);
        text-align: center;
        box-shadow: var(--box-shadow);
        transition: all 300ms;
    }
</style>

<body>
    <div class="container">
        <aside>
            <div class="logo">
                <img src="Where Every Journey Beginslogo1.png">
                <h2>Traveltastic</h2>
                <h3>Where Every Journey Begins</h3>
            </div>
            <!-- <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>
            </div> -->
            <div class="sidebar">
                <a href="dashboard.php">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="customer.php">
                    <span class="material-icons-sharp">person</span>
                    <h3>Customers</h3>
                </a>

                <a href="package.php" class="active">
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
            <h1>Booking Package</h1>
            <div class="menu">
                <button class="button" onclick="openadd()">Add Package</button>
                <button class="button" onclick="openupdate()">Update Package</button>
                <button class="button" onclick="opendelete()">Delete Package</button>
            </div>

            <div id="bookingPackageDetails" class="recentorder">
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

                // Prepare the SQL query to select all booking package details
                $sql = "SELECT * FROM BookingPackage";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if any rows were returned
                if (mysqli_num_rows($result) > 0) {
                    // Display the table header
                    echo "<table>";
                    echo "<tr><th>Booking ID</th><th>Start Date</th>
                    <th>End Date</th><th>Type of Trip</th><th>Location</th>
                    <th>Price</th><th>Sites</th></tr>";

                    // Display each row of the result as a table row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['BookingId'] . "</td>";
                        echo "<td>" . $row['StartDt'] . "</td>";
                        echo "<td>" . $row['EndDt'] . "</td>";
                        echo "<td>" . $row['TypeOfTrip'] . "</td>";
                        echo "<td>" . $row['Location'] . "</td>";
                        echo "<td>" . $row['Price'] . "</td>";
                        echo "<td>" . $row['Sites'] . "</td>";
                        echo "</tr>";
                    }

                    // Close the table
                    echo "</table>";
                } else {
                    // Display a message if no booking packages found
                    echo "No booking packages found.";
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
            <div class="form" id="form">
                <h3>Add Package</h3>
                <div id="addResult"></div>
                <form id="addBookingPackageForm">
                    <input type="text" name="BookingId" placeholder="Booking ID"><br>
                    <input type="date" name="StartDt" placeholder="Start Date"><br>
                    <input type="date" name="EndDt" placeholder="End Date"><br>
                    <select name="TypeOfTrip">
                        <option value="Business">Business</option>
                        <option value="Family">Family</option>
                        <option value="Religious">Religious</option>
                    </select><br>
                    <input type="text" name="Location" placeholder="Location"><br>
                    <input type="number" step="0.01" name="Price" placeholder="Price"><br>
                    <button type="button" onclick="addBookingPackage()">Add Booking Package</button>
                </form>
            </div>
            <div class="form" id="formupdate">
                <h3>Update Package</h3>
                <div id="updateResult"></div>
                <form id="updateBookingPackageForm">
                    <input type="text" name="BookingId" placeholder="Booking ID"><br>
                    <input type="number" step="0.01" name="newPrice" placeholder="New Price"><br>
                    <button type="button" onclick="updateBookingPackage()">Update Price</button>
                </form>
            </div>
            <div class="form" id="formdelete">
                <h3>Delete Package</h3>
                <div id="deleteResult"></div>
                <form id="deleteBookingPackageForm">
                    <input type="text" name="BookingId" placeholder="Booking ID to Delete"><br>
                    <button type="button" onclick="deleteBookingPackage()">Delete Booking Package</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>