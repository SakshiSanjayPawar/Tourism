<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO bookingpackage (BookingId, StartDt, EndDt, TypeOfTrip, Location, Price) VALUES (:BookingId, :StartDt, :EndDt, :TypeOfTrip, :Location, :Price)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':BookingId', $_POST['BookingId']);
    $stmt->bindParam(':StartDt', $_POST['StartDt']);
    $stmt->bindParam(':EndDt', $_POST['EndDt']);
    $stmt->bindParam(':TypeOfTrip', $_POST['TypeOfTrip']);
    $stmt->bindParam(':Location', $_POST['Location']);
    $stmt->bindParam(':Price', $_POST['Price']);
    $stmt->execute();

    echo "Booking package added successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
