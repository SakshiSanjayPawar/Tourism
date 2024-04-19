<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM customerdetails WHERE Cid = :Cid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Cid', $_POST['Cid']);
    $stmt->execute();

    echo "Customer deleted successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
