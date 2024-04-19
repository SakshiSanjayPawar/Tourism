<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z24KMTDPxk6jzZu4z0J3R9Et6f4z5IbVJ7k7sk" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div class="container">
        <div class="logo text-center mb-4">
            <img src="Images/logo.jpeg" alt="Logo" class="img-fluid">
        </div>
        <section>
            <div id="headercutomer">
                <h2 class="text-center mb-3">Customer Login</h2>
                <p class="text-center text-muted">Please enter your registered mobile number.</p>
                <form method="post" action="" class="row justify-content-center">
                    <div class="col-md-6">
                        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" class="form-control mb-3">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" name="loginBtn" class="btn btn-primary w-100">Login</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ky5S3W1h6P+Xnq6jz3elFszO41+a4ErIQqD/XlytpEhylM/2d2n0hqayfJxkMS1P" crossorigin="anonymous"></script>
    <script>
        <?php
            // Include the connection file
            include 'connection.php';

            // Check if the login button is clicked
            if (isset($_POST['loginBtn'])) {
                // Retrieve the entered phone number
                $phoneNumber = $_POST['phoneNumber'];

                // Query to fetch phone number from customerdetails table
                $sql = "SELECT Cphno FROM CustomerDetails";
                $result = $connection->query($sql);

                // Check if the query returned any rows
                if ($result->num_rows > 0) {
                    // Loop through each row
                    while ($row = $result->fetch_assoc()) {
                        // Compare the entered phone number with each phone number in the database
                        if ($phoneNumber == $row['Cphno']) {
                            header("Location: logedinCustomer.php?phoneNumber=" . urlencode($phoneNumber));
                            exit();
                        }
                    }
                }
                // If no match is found, display an alert for invalid credentials
                echo "alert('Invalid credentials!');";
            }
        ?>
    </script>
</body>

</html>
