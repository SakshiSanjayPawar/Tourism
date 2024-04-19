<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM Hotel WHERE Hid = :Hid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Hid', $_POST['Hid']);
    $stmt->execute();

    echo "Hotel deleted successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
