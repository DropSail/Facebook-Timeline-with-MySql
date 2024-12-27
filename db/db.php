
<?php
// db_connection.php

$host = 'localhost';      // Database host
$dbname = 'wbigne_wp416'; // Your database name
$username = 'wbigne_wp416'; // Database username
$password = 'i6X,d5+fAwkx'; // Database password

try {
    // Set up PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}
?>

