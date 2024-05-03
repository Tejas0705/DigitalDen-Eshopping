<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'ecomm';
$user = 'root';
$password = '';

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from the form
    $email = $_POST['email'];

    // Prepare and execute a query to insert data into the database
    $query = "INSERT INTO newupdates (emailid) VALUES (:email)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    echo "Data inserted successfully!";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// Close the connection
$pdo=null;
header("location:../index.php");
?>