<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM bookingpackage WHERE BookingId = :BookingId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':BookingId', $_POST['BookingId']);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($row);
    } else {
        echo "No booking package found";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
