<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- <link rel="stylesheet" href="home.css"> Link to external CSS file -->

    <style>
        body {

            /* Navbar */
            #navbar-horizontal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1000;
                /* Ensure it's above other elements */
                text-align: right;
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: black;
                padding-left: 30px;
                /* Increased padding on the left */
            }

            #navbar-horizontal li {
                float: left;
                margin-right: 20px;
                /* Creates space between the list items */
            }

            #navbar-horizontal li a {
                display: block;
                color: white;
                text-align: center;
                padding: 20px 30px;
                /* Increased padding for better click area */
                text-decoration: none;
                font-size: 18px;
                transition: font-size 0.3s ease, color 0.3s ease;
                /* Smooth transition for size and color */
            }

            #navbar-horizontal li a:hover,
            #navbar-horizontal li a:focus,
            /* Focus added for keyboard navigation */
            #navbar-horizontal li a:active {
                /* Styles for hover, focus, and active */
                background-color: #ddd;
                color: black;
                font-size: 22px;
                /* Larger font size when active or focused */
            }

            font-family: Arial,
            sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: rgba(16, 30, 88, 0.5);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px 5%;
            /* Decreased container padding */
        }

        .profile-section,
        .package-container {
            background-color: #fff;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
        }

        .profile-section img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .user-info {
            flex: 1;
        }

        .user-info p {
            margin: 5px 0;
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .card {
            position: relative;
            width: 300px;
            height: 200px;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.5s ease;
        }

        .card:hover img {
            opacity: 0.3;
        }

        .info {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .card:hover .info {
            opacity: 1;
        }

        .info h4 {
            color: white;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 10px 20px;
            border-radius: 10px;
            margin: 0;
        }

        .info button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: orange;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        .info button:hover {
            background-color: black;
        }
    </style>
</head>

<body>
    <div class="container">

        <?php include 'connection.php'; ?> <!-- Include connection.php -->

        <?php
        // Check if the phone number is passed from the previous page
        if (isset($_GET['phoneNumber'])) {
            $phoneNumber = $_GET['phoneNumber'];

            // Query to fetch customer details based on phone number
            $sql = "SELECT * FROM CustomerDetails WHERE Cphno = '$phoneNumber'";
            $result = $connection->query($sql);

            // Check if the query returned any rows
            if ($result->num_rows > 0) {
                // Fetch customer details
                $row = $result->fetch_assoc();


                // Fetch booked packages based on customer ID using JOIN operation
                $customerId = $row['Cid'];
                $bookedPackagesQuery = "SELECT BookingPackage.*, Books.BId FROM BookingPackage JOIN Books ON BookingPackage.BookingId = Books.BId WHERE Books.Cid = '$customerId'";
                $bookedPackagesResult = $connection->query($bookedPackagesQuery);

                // Check if the customer has booked any packages
                if ($bookedPackagesResult->num_rows > 0) {
                    // Display booked packages
                    echo "<div class='package-container'>";
                    echo "<h2>Booked Packages</h2>";
                    echo "<div class='card-container'>";
                    while ($bookedPackageRow = $bookedPackagesResult->fetch_assoc()) {
                        echo "<div class='card' data-destination='" . $bookedPackageRow['Location'] . "'>";
                        echo "<img src='Images/" . $bookedPackageRow['Location'] . ".jpg' alt='" . $bookedPackageRow['Location'] . "'>";
                        echo "<div class='info'>";
                        echo "<h4>" . $bookedPackageRow['Location'] . "</h4>";
                        echo "<button onclick=\"window.location.href='BkInfo.php?package_id=" . $bookedPackageRow['BookingId'] . "&customer_id=" . $customerId . "'\">More Info</button>";


                        echo "</div>";
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<p>No packages booked yet.</p>";
                }
            } else {
                echo "No user found with the provided phone number.";
            }
        } else {
            echo "Phone number not provided.";
        }
        ?>

    </div>
    </div>
</body>

</html>