<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'onlineojt';

// Create a database connection
$connection = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Import your data using your preferred method (e.g., SQL file, CSV file, etc.)
// Replace 'your_file_path' with the actual file path or SQL query

if (isset($_POST['import'])) {
    // Disable foreign key checks temporarily
    $connection->query('SET FOREIGN_KEY_CHECKS=0');

    // Example 1: Import data from an SQL file
    $importFile = 'your_file_path.sql';
    $importQuery = file_get_contents($importFile);
    $connection->multi_query($importQuery);

    // Example 2: Import data from a CSV file using LOAD DATA INFILE
    // $importFile = 'your_file_path.csv';
    // $importQuery = "
    //     LOAD DATA INFILE '$importFile'
    //     INTO TABLE your_table
    //     FIELDS TERMINATED BY ',' 
    //     ENCLOSED BY '\"'
    //     LINES TERMINATED BY '\n'
    //     IGNORE 1 ROWS
    // ";
    // $connection->query($importQuery);

    // Re-enable foreign key checks
    $connection->query('SET FOREIGN_KEY_CHECKS=1');

    // Close the database connection
    $connection->close();

    // Provide the backup file for download
    $backupFile = 'database_backup_' . date('YmdHis') . '.sql';
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $backupFile . '"');
    readfile($importFile);

    // Delete the backup file
    unlink($backupFile);
}
?>