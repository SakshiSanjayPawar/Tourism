<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport</title>
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

                <a href="hotel.php">
                    <span class="material-icons-sharp">hotel</span>
                    <h3>Hotels</h3>
                </a>

                <a href="transport.html" class="active">
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
            <h1>Transport</h1>
            <div class="menu">
                <button class="button" onclick="openadd()">Add Transport</button>
                <button class="button" onclick="openupdate()">Update Transport</button>
                <button class="button" onclick="opendelete()">Delete Transport</button>
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

                // Prepare the SQL query to select all transport details
                $sql = "SELECT * FROM Transport";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if any rows were returned
                if (mysqli_num_rows($result) > 0) {
                    // Display the table header
                    echo "<table>";
                    echo "<tr><th>Transport ID</th><th>Mode</th><th>Price</th></tr>";

                    // Display each row of the result as a table row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Tid'] . "</td>";
                        echo "<td>" . $row['Tmode'] . "</td>";
                        echo "<td>" . $row['Tprice'] . "</td>";
                        echo "</tr>";
                    }

                    // Close the table
                    echo "</table>";
                } else {
                    // Display a message if no transport details found
                    echo "No transport details found.";
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
                <h3>Add Transport</h3>
                <div id="addResult"></div>
                <form id="addTransportForm">
                    <input type="text" name="Tid" placeholder="Transport ID"><br>
                    <select name="Tmode">
                        <option value="Bus or Car">Bus or Car</option>
                        <option value="Railway">Railway</option>
                        <option value="Aeroplane">Aeroplane</option>
                    </select><br>
                    <input type="number" name="Tprice" placeholder="Price"><br>
                    <button type="button" onclick="addTransport()">Add Transport</button>
                </form>

            </div>
            <div class="form" id="formupdate">
                <h3>Update Transport</h3>
                <div id="updateResult"></div>
                <form id="updateTransportForm">
                    <input type="text" name="Tid" placeholder="Transport ID"><br>
                    <input type="number" name="Tprice" placeholder="New Price"><br>
                    <button type="button" onclick="updateTransport()">Update Price</button>
                </form>
            </div>
            <div class="form" id="formdelete">
                <h3>Delete Transport</h3>
                <div id="deleteResult"></div>
                <form id="deleteTransportForm">
                    <input type="text" name="Tid" placeholder="Transport ID to Delete"><br>
                    <button type="button" onclick="deleteTransport()">Delete Transport</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>