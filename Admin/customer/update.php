<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE  customerdetails SET Cphno = :newCphno WHERE Cid = :Cid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Cid', $_POST['Cid']);
    $stmt->bindParam(':newCphno', $_POST['newCphno']);
    $stmt->execute();

    echo "Customer phone number updated successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
