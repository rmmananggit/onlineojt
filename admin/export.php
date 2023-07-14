<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'onlineojt';

// Create a temporary backup file
$backupFile = 'database_backup_' . date('YmdHis') . '.sql';

// Create a database connection
$connection = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve table names from the database
$tables = array('accounts', 'account_type', 'acc_status', 'announcement', 'attendance', 'comment', 'supervisor_student', 'course', 'journal', 'student', 'student_files', 'task');

// Disable foreign key checks temporarily
$connection->query('SET FOREIGN_KEY_CHECKS=0');

// Open the backup file for writing
$file = fopen($backupFile, 'w');

// Export each table to the backup file
foreach ($tables as $table) {
    // Export table structure
    $createTableSql = "SHOW CREATE TABLE `$table`";
    $createTableResult = $connection->query($createTableSql);
    $createTableData = $createTableResult->fetch_assoc();

    fwrite($file, $createTableData['Create Table'] . ";\n");

    // Export table data
    $selectDataSql = "SELECT * FROM `$table`";
    $selectDataResult = $connection->query($selectDataSql);

    while ($row = $selectDataResult->fetch_assoc()) {
        $keys = array_map('addslashes', array_keys($row));
        $values = array_map('addslashes', array_values($row));
        $insertSql = "INSERT INTO `$table` (`" . implode('`,`', $keys) . "`) VALUES ('" . implode("','", $values) . "');\n";
        fwrite($file, $insertSql);
    }

    fwrite($file, "\n");
}

// Close the backup file
fclose($file);

// Force the backup file to download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $backupFile . '"');
header('Content-Length: ' . filesize($backupFile));
readfile($backupFile);

// Delete the backup file
unlink($backupFile);

// Close the database connection
$connection->close();
?>
