
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM bookingpackage WHERE BookingId = :BookingId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':BookingId', $_POST['BookingId']);
    $stmt->execute();

    echo "Booking package deleted successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

