<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO Hotel (Hid, Hname, Hphno, Hrent, Hcity, Hrating) VALUES (:Hid, :Hname, :Hphno, :Hrent, :Hcity, :Hrating)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Hid', $_POST['Hid']);
    $stmt->bindParam(':Hname', $_POST['Hname']);
    $stmt->bindParam(':Hphno', $_POST['Hphno']);
    $stmt->bindParam(':Hrent', $_POST['Hrent']);
    $stmt->bindParam(':Hcity', $_POST['Hcity']);
    $stmt->bindParam(':Hrating', $_POST['Hrating']);
    $stmt->execute();

    echo "Hotel added successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
