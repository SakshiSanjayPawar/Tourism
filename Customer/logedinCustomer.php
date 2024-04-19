<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog Cards</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css"> <!-- Link to external CSS file -->

</head>


<body>
    <!-- Navigation Bar -->
    <?php
    // Include the connection file
    include 'connection.php';

    // Initialize the phoneNumber variable
    $phoneNumber = "";

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
            $customerId = $row['Cid'];
            $customerName = $row['Cname'];
            $customerCity = $row['Ccity'];
            $customerType = $row['Ctype'];
            $customerDob = $row['Cdob'];
        }
    }
    ?>

    <!-- Navigation Bar -->
    <nav>
        <ul id="navbar-horizontal">
            <li><a href="#packages">Packages</a></li>
            <li><a href="#enquiry">Enquire</a></li>
            <?php
            // Check if $phoneNumber is set and not empty
            if (!empty($phoneNumber)) {
                // Echo the link with the phone number
                echo '<li><a href="bookedPakages.php?phoneNumber='
                    . urlencode($phoneNumber) . '">Booked Packages</a></li>';
            } else {
                // Provide a fallback link or message
                echo '<li><a href="fallback_link.php">Fallback Link</a></li>';
            }
            ?>
            <ul>
                <li class="user-profile" style="display: flex; align-items: center;">
                    <a href="PROFILE.php?phoneNumber=<?php echo urlencode($phoneNumber); ?>">
                        <!-- <img src="Images/womenprofile.jpg" alt="Profile Picture" class="profile"> -->
                        <span style="margin-left: 5px;">Profile</span>
                    </a>
                </li>
            </ul>
        </ul>
    </nav>

    <div id="profile-details" style="display: none;">
        <h3>User Details</h3>
        <?php
        if (!empty($phoneNumber)) {
            // Display user details if phone number is available
            echo "<p><strong>ID:</strong> $customerId</p>";
            echo "<p><strong>Name:</strong> $customerName</p>";
            echo "<p><strong>Phone No:</strong> $phoneNumber</p>";
            echo "<p><strong>City:</strong> $customerCity</p>";
            echo "<p><strong>Type:</strong> $customerType</p>";
            echo "<p><strong>Date of Birth:</strong> $customerDob</p>";
        } else {
            // Display a message if phone number is not available
            echo "Phone number not provided.";
        }
        ?>
    </div>

    <section>
        <section class="container mt-5" id="home">
            <div id="touristCarousel" class="carousel slide" data-ride="carousel" data-interval="1200">
                <ol class="carousel-indicators">
                    <li data-target="#touristCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#touristCarousel" data-slide-to="1"></li>
                    <li data-target="#touristCarousel" data-slide-to="2"></li>
                    <li data-target="#touristCarousel" data-slide-to="3"></li>
                    <li data-target="#touristCarousel" data-slide-to="4"></li>
                    <!-- Add indicators for each tip -->
                </ol>
                <div class="carousel-inner">
                    <!-- Tip 1 -->
                    <div class="carousel-item active">
                        <img src="https://static.toiimg.com/thumb/msid-87867224,width-748,height-499,resizemode=4,imgsize-232412/.jpg" class="d-block w-100" alt="Use only reusable and recyclable items">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Use only reusable and recyclable items</h5>
                            <p>Reduce waste by opting for reusable and recyclable products.</p>
                        </div>
                    </div>
                    <!-- Tip 2 -->
                    <div class="carousel-item">
                        <img src="https://static.toiimg.com/thumb/msid-92089121,width-748,height-499,resizemode=4,imgsize-139308/Most-beautiful-places-to-visit-in-India-for-first-timers.jpg" class="d-block w-100" alt="Take your carry bag while you go for shopping">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Take your carry bag while you go for shopping</h5>
                            <p>Reduce plastic waste by carrying your own reusable shopping bags.</p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="https://lh3.googleusercontent.com/pw/ACtC-3c5ObknHUpJmNf-8HvNowQaau-QkeCVURNaW-iIVQmKH9KocpQNL-7UsaZPjwtQITbEHq1DxHsMePBNADRDgY8tXSckA3N7-4bXMtZB-RO2P_ZdzMAKdyp7ysUpPzsmfYMld3U5UERyXwIHIMdeoDkA=w800-h533-no" class="d-block w-100" alt="Buy products with less packaging">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Buy products with less packaging</h5>
                            <p>Choose products that come with minimal or eco-friendly packaging to reduce waste.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.fabhotels.com/blog/wp-content/uploads/2019/03/Baps-Shri-Swaminarayan-Temple.jpg:cf-webp:w-848:h-551" class="d-block w-100" alt="Buy products with less packaging">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Buy products with less packaging</h5>
                            <p>Choose products that come with minimal or eco-friendly packaging to reduce waste.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.fabhotels.com/blog/wp-content/uploads/2019/04/Venna-Lake-2.jpg:cf-webp:w-848:h-551" class="d-block w-100" alt="Buy products with less packaging">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Buy products with less packaging</h5>
                            <p>Choose products that come with minimal or eco-friendly packaging to reduce waste.</p>
                        </div>
                    </div>


                </div>
                <a class="carousel-control-prev" href="#wasteCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#wasteCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
    </section>

    <section id="packages">
        <H2>PACKAGES</H2>
        <section>
            <h3>BUSINESS PACKAGES</h3>
            <div class="card-container">
                <!-- Three Family Package Cards -->
                <div class="card" data-destination="Bangalore">
                    <img src="Images/Bangalore.jpg" alt="Family Package 1">
                    <div class="info">
                        <h4>Bangalore</h4>
                        <button onclick="window.location.href='info.php?package_id=B101&customerId=<?php echo $customerId; ?>'">More Info</button>
                    </div>
                </div>
                <div class="card" data-destination="New York City">
                    <img src="Images/New York City.jpg" alt="Family Package 2">
                    <div class="info">
                        <h4>New York City</h4>
                        <button onclick="window.location.href='info.php?package_id=B102&customerId=<?php echo $customerId; ?>'">More Info</button>
                    </div>
                </div>
                <div class="card" data-destination="Tokyo">
                    <img src="Images/Tokyo.jpg" alt="Family Package 3">
                    <div class="info">
                        <h4>Tokyo</h4>
                        <button onclick="window.location.href='info.php?package_id=B103&customerId=<?php echo $customerId; ?>'">More Info</button>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <h3>FAMILY PACKAGES</h3>
            <div class="card-container">
                <!-- Three Religious Package Cards -->
                <div class="card" data-destination="Goa">
                    <img src="Images/Goa.jpg" alt="Religious Package 1">
                    <div class="info">
                        <h4>Goa</h4>
                        <button onclick="window.location.href='info.php?package_id=B104&customerId=<?php echo $customerId; ?>'">More Info</button>
                    </div>
                </div>
                <div class="card" data-destination="Jaipur">
                    <img src="Images/Jaipur.jpg" alt="Religious Package 2">
                    <div class="info">
                        <h4>Jaipur</h4>
                        <button onclick="window.location.href='info.php?package_id=B105&customerId=<?php echo $customerId; ?>'">More Info</button>
                    </div>
                </div>
                <div class="card" data-destination="Paris">
                    <img src="Images/Paris.jpg" alt="Religious Package 3">
                    <div class="info">
                        <h4>Paris</h4>
                        <button onclick="window.location.href='info.php?package_id=B106&customerId=<?php echo $customerId; ?>'">More Info</button>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <h3>RELIGIOUS PACKAGES</h3>
            <div class="card-container">
                <!-- Three Business Package Cards -->
                <div class="card" data-destination="Varanasi">
                    <img src="Images/Varanasi.jpg" alt="Business Package 1">
                    <div class="info">
                        <h4>Varanasi</h4>
                        <button onclick="window.location.href='info.php?package_id=B107&customerId=<?php echo $customerId; ?>'">More Info</button>
                    </div>
                </div>
                <div class="card" data-destination="Haridwar">
                    <img src="Images/Haridwar.jpg" alt="Business Package 2">
                    <div class="info">
                        <h4>Haridwar</h4>
                        <button onclick="window.location.href='info.php?package_id=B108&customerId=<?php echo $customerId; ?>'">More Info</button>
                    </div>
                </div>
                <div class="card" data-destination="Tirupati">
                    <img src="Images/Tirupati.jpg" alt="Business Package 3">
                    <div class="info">
                        <h4>Tirupati</h4>
                        <button onclick="window.location.href='info.php?package_id=B109&customerId=<?php echo $customerId; ?>'">More Info</button>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- Enquiry Form -->
    <section id="enquiry">
        <?php


        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data and sanitize it
            $name = mysqli_real_escape_string($connection, $_POST['name']);
            $phone = mysqli_real_escape_string($connection, $_POST['phone']);
            $message = mysqli_real_escape_string($connection, $_POST['message']);

            // SQL query to insert data into the enquiry table
            $sql = "INSERT INTO enquiry (Eqname, Eqphonenumber, Eqmessage) VALUES ('$name', '$phone', '$message')";

            // Check if the query executed successfully
            if (mysqli_query($connection, $sql)) {
                echo "<p class='success-message'>Thank you for your enquiry!</p>";
            } else {
                echo "<p class='error-message'>Error: " . $sql . "<br>" . mysqli_error($connection) . "</p>";
            }

            // Close the database connection
            mysqli_close($connection);
        }
        ?>
        <div class="enquiry-form">
            <h2>Enquiry Form</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </section>


    <!-- Link to Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Smooth scrolling for anchor links
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>
</body>

</html>