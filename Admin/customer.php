<?php
$con = mysqli_connect("localhost", "root", "", "");

if (!$con) {
    die("Connection Error");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
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

                <a href="customer.php" class="active">
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
            <h1>Customer</h1>
            <div class="menu">
                <button class="button" onclick="openadd()">Add Customer</button>
                <button class="button" onclick="openupdate()">Update Customer</button>
                <button class="button" onclick="opendelete()">Delete Customer</button>
            </div>

            <div id="customerDetails" class="recentorder">
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

                // Prepare the SQL query to select all customer details
                $sql = "SELECT * FROM customerdetails";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if any rows were returned
                if (mysqli_num_rows($result) > 0) {
                    // Display the table header
                    echo "<table>";
                    echo "<tr><th>Customer ID</th><th>Customer Name</th><th>Phone Number</th><th>City</th><th>Type</th><th>Date of Birth</th></tr>";

                    // Display each row of the result as a table row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Cid'] . "</td>";
                        echo "<td>" . $row['Cname'] . "</td>";
                        echo "<td>" . $row['Cphno'] . "</td>";
                        echo "<td>" . $row['Ccity'] . "</td>";
                        echo "<td>" . $row['Ctype'] . "</td>";
                        echo "<td>" . $row['Cdob'] . "</td>";
                        echo "</tr>";
                    }

                    // Close the table
                    echo "</table>";
                } else {
                    // Display a message if no customers found
                    echo "No customers found.";
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
                <h3>Add Customer</h3>
                <div id="addResult"></div>
                <form id="add">
                    <input type="text" name="Cid" placeholder="Customer ID"><br>
                    <input type="text" name="Cname" placeholder="Customer Name"><br>
                    <input type="text" name="Cphno" placeholder="Phone Number"><br>
                    <input type="text" name="Ccity" placeholder="City"><br>
                    <select name="Ctype">
                        <option value="Regular">Regular</option>
                        <option value="Special">Special</option>
                    </select><br>
                    <input type="date" name="Cdob" placeholder="Date of Birth"><br>
                    <button type="button" onclick="addCustomer()">Add Customer</button>
                </form>
            </div>
            <div class="form" id="formupdate">
                <h3>Update Customer</h3>
                <div id="updateResult"></div>
                <form id="updateCustomerForm">
                    <input type="text" name="Cid" placeholder="Customer ID"><br>
                    <input type="text" name="newCphno" placeholder="New Phone Number"><br>
                    <button type="button" onclick="updateCustomer()">Update Phone Number</button>
                </form>

            </div>
            <div class="form" id="formdelete">
                <h3>Delete Customer</h3>
                <div id="deleteResult"></div>
                <form id="deleteCustomerForm">
                    <input type="text" name="Cid" placeholder="Customer ID to Delete"><br>
                    <button type="button" onclick="deleteCustomer()">Delete Customer</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>