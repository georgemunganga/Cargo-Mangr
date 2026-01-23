<?php
// Create database if it doesn't exist
$host = 'localhost';
$username = 'root';
$password = '';

try {
    // Connect to MySQL without specifying a database
    $pdo = new PDO("mysql:host=$host;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create the database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS nwc CHARACTER SET utf8 COLLATE utf8_general_ci");
    
    echo "Database 'nwc' created or already exists.\n";
    
} catch (PDOException $e) {
    echo "Database creation failed: " . $e->getMessage() . "\n";
}
?>