<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO transport (Tid, Tmode, Tprice) VALUES (:Tid, :Tmode, :Tprice)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Tid', $_POST['Tid']);
    $stmt->bindParam(':Tmode', $_POST['Tmode']);
    $stmt->bindParam(':Tprice', $_POST['Tprice']);
    $stmt->execute();

    echo "Transport added successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
