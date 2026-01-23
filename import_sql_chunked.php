<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'nwc';
$username = 'root';
$password = '';

try {
    // Create PDO connection with increased timeout
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
        PDO::ATTR_TIMEOUT => 300, // 5 minutes timeout
    ]);
    
    echo "Connected successfully to database '$dbname'\n";
    
    // Read the SQL file
    $sqlContent = file_get_contents('nwc.sql');
    
    if ($sqlContent === false) {
        throw new Exception("Could not read nwc.sql file");
    }
    
    echo "SQL file read successfully (" . strlen($sqlContent) . " characters)\n";
    
    // Split the SQL content by statements (usually separated by semicolons)
    $statements = explode(";\n", $sqlContent);
    $totalStatements = count($statements);
    $processed = 0;
    
    foreach ($statements as $statement) {
        $statement = trim($statement);
        
        if (!empty($statement)) {
            try {
                $pdo->exec($statement);
                $processed++;
                
                // Show progress every 100 statements
                if ($processed % 100 == 0) {
                    echo "Processed $processed/$totalStatements statements...\n";
                }
            } catch (PDOException $e) {
                echo "Error executing statement: " . $e->getMessage() . "\n";
                echo "Statement: " . substr($statement, 0, 100) . "...\n";
            }
        }
    }
    
    echo "SQL file imported successfully! Processed $processed statements.\n";
    
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>