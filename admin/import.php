<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'onlineojt';
session_start();


// Check if the form is submitted
if (isset($_POST['import'])) {
    // Temporary backup file to import
    $backupFile = $_FILES['backupFile']['tmp_name'];

    // Create a database connection
    $connection = new mysqli($host, $username, $password, $database);

    // Check for connection errors
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Disable foreign key checks temporarily
    $connection->query('SET FOREIGN_KEY_CHECKS=0');

    // Clear existing database tables
    $tables = array('accounts', 'account_type', 'acc_status', 'announcement', 'attendance', 'comment', 'supervisor_student', 'course', 'journal', 'student', 'student_files', 'task');

    foreach ($tables as $table) {
        $dropTableSql = "DROP TABLE IF EXISTS `$table`";
        $connection->query($dropTableSql);
    }

    // Read the backup file
    $sqlStatements = file_get_contents($backupFile);

    // Execute the SQL statements
    if ($connection->multi_query($sqlStatements)) {
        do {
            // Discard results
            if ($result = $connection->store_result()) {
                $result->free();
            }
        } while ($connection->next_result());
    } else {
        echo "Error importing database: " . $connection->error;
    }

    // Re-enable foreign key checks
    $connection->query('SET FOREIGN_KEY_CHECKS=1');

    // Close the database connection
    $connection->close();

    $_SESSION['status'] = "Database imported successfully";
      $_SESSION['status_code'] = "success";
      header('Location: database_manage.php');
      exit(0);
}
?>
