<!DOCTYPE html>
<html>

<head>
    <title>Main Package Name</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="BkInfo.css">

</head>

<body>
    <div class="container-fluid">

        <?php
        // Retrieve the package type from the URL parameter
        if (isset($_GET['package_id'])) {
            $selectedPackageType = $_GET['package_id'];
            $customerId = $_GET['customer_id'];
            include 'connection.php'; // Include database connection

            // Query to retrieve booking package details including number of days
            $packageQuery = "SELECT bp.BookingId, bp.Location, bp.StartDt, bp.EndDt, 
                             DATEDIFF(bp.EndDt, bp.StartDt) AS NumberOfDays, 
                             bp.Includes, bp.Sites, bp.Description, g.GuideId, g.GuideName,
                             b.no_of_tourists, b.total_amt, cd.Cphno
                             FROM BookingPackage bp
                             JOIN Includes i ON bp.BookingId = i.BId
                             JOIN GuideDetails g ON i.Gid = g.GuideId
                             JOIN Books b ON bp.BookingId = b.BId
                             JOIN CustomerDetails cd ON b.Cid = cd.Cid
                             WHERE bp.BookingId = '$selectedPackageType' AND cd.Cid = '$customerId'";
            $packageResult = mysqli_query(
                $connection,
                $packageQuery
            );

            if (mysqli_num_rows($packageResult) > 0) {
                $row = mysqli_fetch_assoc($packageResult);
                echo "<h2>" . $row['Location'] . " Package</h2>"; // Displaying location with "Package" word
                echo "<div class='box'>";
                echo "<div class='text-image'>";
                echo "<img src='Images/" . $row['Location'] . ".jpg' alt='" . $row['Location'] . " Image' class='image'>";
                echo "</div>"; // Close text-image
                echo "<div class='description-container'>";
        ?>
        <?php
                echo "<h4>" . $row['NumberOfDays'] . " days Tour</h4>";
                echo "<h4>" . $row['StartDt'] . " - " . $row['EndDt'] . "</h4>";
                echo "<h3> Inclusions</h3>";
                echo "<ul>";
                $inclusions = explode(",", $row['Includes']);
                foreach ($inclusions as $inclusion) {
                    echo "<li>" . $inclusion . "</li>";
                }
               
                echo "<h3>Amazing Sites to Travel</h3>";
                echo "<ul>";
                $sites = explode(",", $row['Sites']);
                foreach ($sites as $site) {
                    echo "<li>" . $site . "</li>";
                }
                echo "</ul>";
                echo "<h3>Booking Details</h3>";
                echo "<h6>Number of People: " . $row['no_of_tourists'] . "</h6>";
                echo "<h6>Package Cost: Rs." . $row['total_amt'] . "</h6>";
                echo "<h3>Guide Information</h3>";
                echo "<p><strong>Guide ID:</strong> " . $row['GuideId'] . "</p>";
                echo "<p><strong>Guide Name:</strong> " . $row['GuideName'] . "</p>";

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

    
</body>

</html>