<!DOCTYPE html>
<html>

<head>
    <title>Main Package Name</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="info.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-fluid">
    <?php
// Initialize the customerId variable
include 'connection.php'; // Include database connection
$customerId = "";

// Check if the customer ID is passed from the previous page
if (isset($_GET['customerId'])) {
    $customerId = $_GET['customerId'];
}

// Retrieve the package type from the URL parameter
if (isset($_GET['package_id'])) {
    $selectedPackageType = $_GET['package_id'];

    // Query to retrieve booking package details including number of days
    $packageQuery = "SELECT BookingId,
                     Location, StartDt, EndDt, DATEDIFF(EndDt, StartDt) AS NumberOfDays, 
                     Includes, Sites, Description FROM BookingPackage 
                     WHERE BookingId = '$selectedPackageType'";
    $packageResult = mysqli_query($connection, $packageQuery);

    if (mysqli_num_rows($packageResult) > 0) {
        $row = mysqli_fetch_assoc($packageResult);
        echo "<h2>" . $row['Location'] . " Package</h2>"; // Displaying location with "Package" word
        echo "<div class='box'>";
        echo "<div class='text-image'>";
        echo "<img src='Images/" . $row['Location'] . ".jpg' alt='" . $row['Location'] . " Image' class='image'>";
        echo "</div>"; // Close text-image
        echo "<div class='description-container'>";
        ?>
        <h1 class="Title">Package Details</h1>
        <?php
        echo "<h4>" . $row['NumberOfDays'] . " days Tour</h4>";
        echo "<h4>" . $row['StartDt'] . " - " . $row['EndDt'] . "</h4>";
        echo "<h3> Inclusions</h3>";
        echo "<ul>";
        $inclusions = explode(",", $row['Includes']);
        foreach ($inclusions as $inclusion) {
            echo "<li>" . $inclusion . "</li>";
        }
        echo "<h3> Description</h3>";
        echo "<p>" . $row['Description'] . "</p>";
        echo "</ul>";

        echo "<h3>Amazing Sites to Travel</h3>";
        echo "<ul>";
        $sites = explode(",", $row['Sites']);
        foreach ($sites as $site) {
            echo "<li>" . $site . "</li>";
        }
        echo "</ul>";

        echo "</div>"; // Close box
        echo "</div>"; // Close description-container

    }
    // Close database connection
    // mysqli_close($connection);
    else {
        // Handle missing package ID parameter
        echo "<p>Package ID parameter is missing.</p>";
    }


    echo "<div class='table-container'>";
    // 'connection.php';
    $transportQuery = "SELECT t.Tmode, ts.Date, ts.Time, ts.StartCity, ts.EndCity
                       FROM SchTransport ts
                       JOIN Transport t ON ts.Tid = t.Tid
                       WHERE ts.Bid = '$selectedPackageType'";
    $transportResult = mysqli_query($connection, $transportQuery);

    // Check if the query was successful
    if ($transportResult) {
        echo '<table class="table TransportTable" border="1" width="100%">';
        echo '<thead>';
        echo '<tr>';
        echo '<th colspan="5" class="t2Head">Transport Schedule</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Mode</th>';
        echo '<th>Date/th>';
        echo '<th>Time</th>';
        echo '<th>StartCity</th>';
        echo '<th>EndCity</th>';
        echo '</tr>';
        echo '</thead>';

        // Fetch and display transport schedule data
        while ($row = mysqli_fetch_assoc($transportResult)) {
            echo "<tr>";
            echo "<td>" . $row['Tmode'] . "</td>";
            echo "<td>" . $row['Date'] . "</td>";
            echo "<td>" . $row['Time'] . "</td>";
            echo "<td>" . $row['StartCity'] . "</td>";
            echo "<td>" . $row['EndCity'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        // Handle error if query fails
        echo "Error fetching transport schedule: " . mysqli_error($connection);
    }

    // Query to get hotel schedule
    $hotelQuery = "SELECT h.Hname, h.Hcity, sh.Check_In, sh.Check_Out, h.Hrating
                   FROM SchHotel sh
                   JOIN hotel h ON sh.Hid = h.Hid
                   WHERE sh.Bid = '$selectedPackageType'";
    $hotelResult = mysqli_query($connection, $hotelQuery);

    // Check if the query was successful
    if ($hotelResult) {
        echo '<table class="table HotelTable" border="1" width="100%">';
        echo '<thead>';
        echo '<tr>';
        echo '<th colspan="5" class="t2Head">Hotel Schedule</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Hotel Name</th>';
        echo '<th>City</th>';
        echo '<th>Check In date</th>';
        echo '<th>Check out date</th>';
        echo '<th>Ratings</th>';
        echo '</tr>';
        echo '</thead>';
        // Fetch and display hotel schedule data
        while ($row = mysqli_fetch_assoc($hotelResult)) {
            echo "<tr>";
            echo "<td>" . $row['Hname'] . "</td>";
            echo "<td>" . $row['Hcity'] . "</td>";
            echo "<td>" . $row['Check_In'] . "</td>";
            echo "<td>" . $row['Check_Out'] . "</td>";
            echo "<td>" . $row['Hrating'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        // Handle error if query fails
        echo "Error fetching hotel schedule: " . mysqli_error($connection);
    }
} else {
    // Handle case when package type is not provided
    echo "<p>Package type not specified</p>";
}

?>

<?php
// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $customerId = $_POST['customerId'];
    $packageId = $_POST['packageId'];
    $numTourists = $_POST['numTourists'];

    // Query to fetch the price of the package
    $priceQuery = "SELECT Price FROM BookingPackage WHERE BookingId = '$packageId'";
    $priceResult = mysqli_query($connection, $priceQuery);

    // Check if the query was successful
    if ($priceResult) {
        // Fetch the price from the result
        $row = mysqli_fetch_assoc($priceResult);
        $price = $row['Price'];

        // Calculate the total amount
        $totalAmt = $numTourists * $price;

        // Begin transaction
        mysqli_begin_transaction($connection);

        // Insert data into the Books table
        $insertQuery = "INSERT INTO Books (BId, Cid, no_of_tourists, total_amt)
                        VALUES ('$packageId', $customerId, $numTourists, $totalAmt)";

        try {
            // Execute the query
            $result = mysqli_query($connection, $insertQuery);
            if ($result) {
                // Commit the transaction
                mysqli_commit($connection);
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Booking Successful!',
                            text: 'Your trip has been booked successfully.',
                        });
                      </script>";
            }
        } catch (mysqli_sql_exception $e) {
            // Rollback the transaction
            mysqli_rollback($connection);
            // Check if the error is due to duplicate entry
            if ($e->getCode() === '1062') {
                echo "<script>
                        Swal.fire({
                            icon: '&#128525',
                            title: 'Booking Already Done!',
                            text: 'This package has already been booked.',
                        });
                      </script>";
            } else {
                echo "<script>
                        Swal.fire({
                            icon: '&#128525',
                            title: 'Booking Already Done!',
                            text: 'This package has already been booked.',
                        });
                      </script>";
            }
        }
    } else {
        // Handle error if query fails
        echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Booking Failed!',
                        text: 'An error occurred while fetching package details. Please try again later.',
                    });
                  </script>";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <input type="hidden" name="customerId" value="<?php echo $customerId; ?>">
    <input type="hidden" name="packageId" value="<?php echo $selectedPackageType; ?>">
    <label for="numTourists">Number of Tourists:</label>
    <input type="number" id="numTourists" name="numTourists" required>
    <button type="submit" class="btn btn-primary book-trip-button">Book a trip now</button>
</form>

<script>
    // Include SweetAlert2 CDN for displaying pop-up messages
    // https://sweetalert2.github.io/
</script>

</body>

</html>
