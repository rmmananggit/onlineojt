<?php include('authentication.php'); 


if (isset($_GET['file_id'])) {
    // Get the file ID from the URL parameter
    $file_id = $_GET['file_id'];

    // Fetch the file details from the database
    $select_query = "SELECT file_name FROM files_table WHERE id = '$file_id' LIMIT 1";
    $result = mysqli_query($con, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $file_name = $row['file_name'];

        // Provide the path to the directory where the files are stored
        $file_path = './pdf/';

        // Set the appropriate headers for the download
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$file_name");
        header("Content-Type: application/pdf");
        header("Content-Transfer-Encoding: binary");

        // Read the file and output it to the user for download
        readfile($file_path . $file_name);
        exit;
    } else {
        // File not found in the database
        die("File not found.");
    }
} else {
    // File ID not provided in the URL
    die("Invalid request.");
}
?>