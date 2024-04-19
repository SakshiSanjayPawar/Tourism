<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="home.css"> <!-- Link to external CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--color-background);
        }

        /* Navbar */
        #navbar-horizontal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            text-align: right;
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: var(--color-primary-variant);
            padding-left: 30px;
        }

        #navbar-horizontal li {
            float: right;
            margin-right: 20px;
        }

        #navbar-horizontal li a {
            display: block;
            color: white;
            text-align: center;
            padding: 20px 30px;
            text-decoration: none;
            font-size: 18px;
            transition: font-size 0.3s ease, color 0.3s ease;
        }

        #navbar-horizontal li a:hover,
        #navbar-horizontal li a:focus,
        #navbar-horizontal li a:active {
            background-color: #111e88;
            color: black;
            font-size: 22px;
        }

        .container {
            width: 30%;
            margin: 20px auto;
            background-color: rgba(16, 30, 88, 0.5);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px 5%;
        }

        .profile-section,
        .package-container {
            background-color: #fff;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
            padding-left: 30%;
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
            border: 1px solid var(--color-dark-variant);
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
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
            text-align: center;
            opacity: 0;
            transition: opacity 0.5s ease;
            width: 100%;
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
    <!-- Include navbar.php -->
    <?php include 'connection.php'; ?> <!-- Include navbar.php -->

    <div class="container">
        <h2>User Profile</h2>
        <div class="profile-section">
            <!-- PHP code to fetch user details based on mobile number -->
            <!-- PHP code to fetch user details based on mobile number -->
            <?php
            // Check if the phone number is passed from the previous page
            if (isset($_GET['phoneNumber'])) {
                $phoneNumber = $_GET['phoneNumber'];

                // Query to fetch customer details based on phone number
                $sql = "SELECT * FROM CustomerDetails WHERE Cphno = '$phoneNumber'";
                $result = $connection->query($sql);

                // Check if the query returned any rows
                if ($result->num_rows > 0) {
                    // Fetch and display customer details
                    $row = $result->fetch_assoc();
                    echo "<img src='Images/womenprofile.jpg' alt='Profile Picture'>";
                    echo "<div class='user-info'>";
                    echo "<p><strong>ID:</strong> " . $row['Cid'] . "</p>";
                    echo "<p><strong>Name:</strong> " . $row['Cname'] . "</p>";
                    echo "<p><strong>Phone No:</strong> " . $row['Cphno'] . "</p>";
                    echo "<p><strong>City:</strong> " . $row['Ccity'] . "</p>";
                    echo "<p><strong>Type:</strong> " . $row['Ctype'] . "</p>";
                    echo "<p><strong>Date of Birth:</strong> " . $row['Cdob'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<p>No user found with the provided phone number.</p>";
                }
            } else {
                echo "Phone number not provided.";
            }
            ?>
        </div>

</body>

</html>