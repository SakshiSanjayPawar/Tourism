<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE bookingpackage SET Price = :newPrice WHERE BookingId = :BookingId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':BookingId', $_POST['BookingId']);
    $stmt->bindParam(':newPrice', $_POST['newPrice']);
    $stmt->execute();

    echo "Booking package price updated successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
