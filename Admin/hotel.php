<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels</title>
    <link rel="icon" type="image/jpg" href="logo.jpg">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="./style1.css">
    <script src="actions.js"></script>
</head>

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

                <a href="package.php">
                    <span class="material-icons-sharp">all_inclusive</span>
                    <h3>Packages</h3>
                </a>

                <a href="hotel.php" class="active">
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
            <h1>Hotels</h1>
            <div class="menu">
                <button class="button" onclick="openadd()">Add Hotel</button>
                <button class="button" onclick="openupdate()">Update Hotel</button>
                <button class="button" onclick="opendelete()">Delete Hotel</button>
            </div>

            <div id="hotelDetails" class="recentorder">
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

                // Prepare the SQL query to select all hotel details
                $sql = "SELECT * FROM Hotel";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if any rows were returned
                if (mysqli_num_rows($result) > 0) {
                    // Display the table header
                    echo "<table>";
                    echo "<tr><th>Hotel ID</th><th>Name</th><th>Phone Number</th><th>Rent</th><th>City</th><th>Rating</th></tr>";

                    // Display each row of the result as a table row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Hid'] . "</td>";
                        echo "<td>" . $row['Hname'] . "</td>";
                        echo "<td>" . $row['Hphno'] . "</td>";
                        echo "<td>" . $row['Hrent'] . "</td>";
                        echo "<td>" . $row['Hcity'] . "</td>";
                        echo "<td>" . $row['Hrating'] . "</td>";
                        echo "</tr>";
                    }

                    // Close the table
                    echo "</table>";
                } else {
                    // Display a message if no hotel details found
                    echo "No hotel details found.";
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
                <h3>Add Hotel</h3>
                <div id="addResult"></div>
                <form id="addHotelForm">
                    Hotel ID: <input type="text" name="Hid" placeholder="Hotel ID"><br>
                    Hotel Name: <input type="text" name="Hname" placeholder="Hotel Name"><br>
                    Phone Number: <input type="text" name="Hphno" placeholder="Phone Number"><br>
                    Rent: <input type="number" name="Hrent" placeholder="Rent" value="1000"><br>
                    City: <input type="text" name="Hcity" placeholder="City"><br>
                    Rating: <select name="Hrating">
                        <option value="*">*</option>
                        <option value="**">**</option>
                        <option value="***">***</option>
                        <option value="****">****</option>
                        <option value="*****">*****</option>
                    </select><br>
                    <button type="button" onclick="addHotel()">Add Hotel</button>
                </form>
            </div>
            <div class="form" id="formupdate">
                <h3>Update Hotel</h3>
                <div id="updateResult"></div>
                <form id="updateHotelForm">
                    Hotel ID: <input type="text" name="Hid" placeholder="Hotel ID"><br>
                    New Rent: <input type="number" name="Hrent" placeholder="New Rent"><br>
                    <button type="button" onclick="updateHotel()">Update Hotel</button>
                </form>
            </div>
            <div class="form" id="formdelete">
                <h3>Delete Hotel</h3>
                <div id="deleteResult"></div>
                <form id="deleteHotelForm">
                    Hotel ID: <input type="text" name="Hid" placeholder="Hotel ID to Delete"><br>
                    <button type="button" onclick="deleteHotel()">Delete Hotel</button>
                </form>
            </div>
        </div>
</body>

</html>