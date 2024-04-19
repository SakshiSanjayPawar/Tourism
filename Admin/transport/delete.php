<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM transport WHERE Tid = :Tid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Tid', $_POST['Tid']);
    $stmt->execute();

    echo "Transport deleted successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
