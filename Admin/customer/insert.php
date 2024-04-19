<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tourismmanagementcompany";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO   customerdetails(Cid, Cname, Cphno, Ccity, Ctype, Cdob) 
            VALUES (:Cid, :Cname, :Cphno, :Ccity, :Ctype, :Cdob)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Cid', $_POST['Cid']);
    $stmt->bindParam(':Cname', $_POST['Cname']);
    $stmt->bindParam(':Cphno', $_POST['Cphno']);
    $stmt->bindParam(':Ccity', $_POST['Ccity']);
    $stmt->bindParam(':Ctype', $_POST['Ctype']);
    $stmt->bindParam(':Cdob', $_POST['Cdob']);
    $stmt->execute();

    echo "Customer added successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
