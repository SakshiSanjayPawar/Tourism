<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE transport SET Tprice = :Tprice WHERE Tid = :Tid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Tid', $_POST['Tid']);
    $stmt->bindParam(':Tprice', $_POST['Tprice']);
    $stmt->execute();

    echo "Transport price updated successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
