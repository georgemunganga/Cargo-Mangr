<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'nwc';
$username = 'root';
$password = '';

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully to database '$dbname'\n";
    
    // Read the SQL file
    $sql = file_get_contents('nwc.sql');
    
    if ($sql === false) {
        throw new Exception("Could not read nwc.sql file");
    }
    
    echo "SQL file read successfully\n";
    
    // Execute the SQL
    $pdo->exec($sql);
    
    echo "SQL file imported successfully!\n";
    
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>