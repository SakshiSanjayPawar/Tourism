<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if an ID was provided for a specific hotel, else select all hotels
    if (!empty($_POST['Hid'])) {
        $sql = "SELECT * FROM Hotel WHERE Hid = :Hid";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Hid', $_POST['Hid']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            echo json_encode($result);
        } else {
            echo "No hotel found with the ID " . $_POST['Hid'];
        }
    } else {
        $sql = "SELECT * FROM Hotel";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            echo json_encode($result);
        } else {
            echo "No hotels found.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
