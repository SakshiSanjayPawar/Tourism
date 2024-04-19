<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM  customerdetails WHERE Cid = :Cid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Cid', $_POST['Cid']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo "Customer ID: " . $result['Cid'] . "<br>";
        echo "Customer Name: " . $result['Cname'] . "<br>";
        echo "Phone Number: " . $result['Cphno'] . "<br>";
        echo "City: " . $result['Ccity'] . "<br>";
        echo "Type: " . $result['Ctype'] . "<br>";
        echo "Date of Birth: " . $result['Cdob'] . "<br>";
    } else {
        echo "Customer not found";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
