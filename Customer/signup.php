<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="form" id="form">
        <h3>Register</h3>

        <form id="add" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="Cname" placeholder="Customer Name"><br>
            <input type="text" name="Cphno" placeholder="Phone Number"><br>
            <input type="text" name="Ccity" placeholder="City"><br>
            <select name="Ctype">
                <option value="Regular">Regular</option>
                <option value="Special">Special</option>
            </select><br>
            <input type="date" name="Cdob" placeholder="Date of Birth"><br>
            <button type="submit">Add Customer</button>
        </form>
        <div id="addResult">
            <?php
            // Include the connection file
            require_once 'connection.php';

            // If the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                try {
                    // Retrieve form data
                    $Cname = $_POST['Cname'];
                    $Cphno = $_POST['Cphno'];
                    $Ccity = $_POST['Ccity'];
                    $Ctype = $_POST['Ctype'];
                    $Cdob = $_POST['Cdob'];

                    // Prepare SQL statement to insert data into customerdetails table
                    $sql = "INSERT INTO customerdetails (Cname, Cphno, Ccity, Ctype, Cdob) VALUES (?, ?, ?, ?, ?)";

                    // Prepare and bind parameters to avoid SQL injection
                    $stmt = $connection->prepare($sql);
                    $stmt->bind_param("sssss", $Cname, $Cphno, $Ccity, $Ctype, $Cdob);

                    // Execute the statement
                    if ($stmt->execute() === TRUE) {
                        echo "New record inserted successfully";
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    // Close statement
                    $stmt->close();
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
            ?>
        </div>
    </div>
</body>

</html>