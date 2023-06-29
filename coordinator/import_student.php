<?php
include('authentication.php');
include('includes/header.php');
include('includes/sidebar.php');

if (isset($_POST['import'])) {
    // Check if a file is selected
    if (!empty($_FILES['csvFile']['tmp_name'])) {
        $filename = $_FILES['csvFile']['tmp_name'];

        // Read the CSV file
        $file = fopen($filename, 'r');
        if ($file) {
            // Read the header row
            $header = fgetcsv($file);

            // Read the first data row
            $data = fgetcsv($file);
            if ($data) {
                // Assign the values from the CSV to variables
                $student_id = $data[1];
                $fname = $data[2];
                $mname = $data[3];
                $lname = $data[4];
                $email = $data[5];
                $course = $data[6];
                $status_name = $data[7];
                $mobile = $data[8];

                // Display the values in the text fields
                ?>
                <div class="container">
                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Imported Student Data</h5>

                                        <form>
                                            <div class="mb-3">
                                                <label for="studentId" class="form-label">Student ID:</label>
                                                <input type="text" class="form-control" id="studentId" name="studentId" value="<?= $student_id ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="firstName" class="form-label">First Name:</label>
                                                <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $fname ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="middleName" class="form-label">Middle Name:</label>
                                                <input type="text" class="form-control" id="middleName" name="middleName" value="<?= $mname ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="lastName" class="form-label">Last Name:</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $lname ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email:</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="course" class="form-label">Course:</label>
                                                <input type="text" class="form-control" id="course" name="course" value="<?= $course ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="statusName" class="form-label">Status:</label>
                                                <input type="text" class="form-control" id="statusName" name="statusName" value="<?= $status_name ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="mobile" class="form-label">Mobile Number:</label>
                                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $mobile ?>" readonly>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php
            } else {
                echo "Invalid CSV file.";
            }

            fclose($file);
        } else {
            echo "Error opening the CSV file.";
        }
    } else {
        echo "Please select a CSV file.";
    }
}
?>

<div class="container">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Import Student Data</h5>

                        <!-- Form to upload CSV file -->
                        <form action="import_student.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="csvFile" class="form-label">Select CSV File:</label>
                                <input type="file" class="form-control" id="csvFile" name="csvFile">
                            </div>
                            <button type="submit" name="import" class="btn btn-primary">Import</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>





<?php
include('includes/footer.php');
?>
