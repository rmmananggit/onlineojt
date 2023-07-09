<?php
include('authentication.php');
include('header.php');
include('sidebar.php');

if (isset($_POST['import'])) {
    // Check if a file is selected
    if (!empty($_FILES['csvFile']['tmp_name'])) {
        $filename = $_FILES['csvFile']['tmp_name'];

        // Read the CSV file
        $file = fopen($filename, 'r');
        if ($file) {
            // Read the first data row
            fgetcsv($file);
            fgetcsv($file);
            $data = fgetcsv($file);
            if ($data !== false) { // Check if data is valid
                // Assign the values from the CSV to variables
                $student_id = $data[0];
                $fname = $data[1];
                $mname = $data[2];
                $lname = $data[3];
                $suffix = $data[4];
                $email = $data[5];
                $phone = $data[6];
                $gender = $data[7];
                $course = $data[8];

                // Display the values in the text fields
                ?>
                <div class="container">
                    <section class="section">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Imported Student Data</h5>

                                            <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">
                                                <?php if (isset($_SESSION['auth_user'])) : ?>
                                                    <label for="" hidden="true">user_id</label>
                                                    <input required type="text" hidden name="user_id" value="<?= $_SESSION['auth_user']['user_id']; ?>" class="form-control">
                                                <?php endif; ?>

                                                <div class="row">
                                                    <div class="col-md-12 mb-4">
                                                        <label for="studentId" class="form-label">Student ID:</label>
                                                        <input type="text" class="form-control" id="studentId" name="studentid" value="<?= $student_id ?>" readonly>
                                                    </div>

                                                    <div class="col-md-3 mb-4">
                                                        <label for="firstName" class="form-label">First Name:</label>
                                                        <input type="text" class="form-control" id="firstName" name="fname" value="<?= $fname ?>" readonly>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label for="middleName" class="form-label">Middle Name:</label>
                                                        <input type="text" class="form-control" id="middleName" name="mname" value="<?= $mname ?>" readonly>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <label for="lastName" class="form-label">Last Name:</label>
                                                        <input type="text" class="form-control" id="lastName" name="lname" value="<?= $lname ?>" readonly>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="mb-2">Suffix:</label>
                                                        <select class="form-control" name="suffix">
                                                            <option selected disabled>Select Suffix</option>
                                                            <option value="JR" <?= $suffix == 'JR' ? 'selected' : '' ?>>JR</option>
                                                            <option value="SR" <?= $suffix == 'SR' ? 'selected' : '' ?>>SR</option>
                                                            <option value="II" <?= $suffix == 'II' ? 'selected' : '' ?>>II</option>
                                                            <option value="III" <?= $suffix == 'III' ? 'selected' : '' ?>>III</option>
                                                            <option value="IV" <?= $suffix == 'IV' ? 'selected' : '' ?>>IV</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 mb-4">
                                                        <label for="email" class="form-label">Email:</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" readonly>
                                                    </div>

                                                    <div class="col-md-6 mb-4">
                                                        <label for="course" class="form-label">Course:</label>

                                                        <select name="course" required class="form-control">
                                                            <option value="" disabled>--Status--</option>
                                                            <option value="3" <?= $course == '3' ? 'selected' : '' ?> disabled>Bachelor of Science in Marine Biology</option>
                                                            <option value="4" <?= $course == '4' ? 'selected' : '' ?> disabled>Bachelor of Science in Information Technology</option>
                                                            <option value="5" <?= $course == '5' ? 'selected' : '' ?> disabled>Bachelor of Secondary Education Major in Technology and Livelihood Education</option>
                                                            <option value="6" <?= $course == '6' ? 'selected' : '' ?> disabled>Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4 mb-4">
                                                        <label for="mobile" class="form-label">Mobile Number:</label>
                                                        <input type="text" class="form-control" id="mobile" name="phone" value="<?= $phone ?>" readonly>
                                                    </div>

                                                    <div class="col-md-6 mb-4">
                                                        <label for="gender" class="form-label">Gender:</label>
                                                        <input type="text" class="form-control" id="gender" name="gender" value="<?= $gender ?>" readonly>
                                                    </div>

                                                    <div class="text-end">
                                                        <a type="button" class="btn btn-danger" href="index.php">Back</a>
                                                        <button type="submit" name="import_add_student" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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

include('footer.php');
?>
