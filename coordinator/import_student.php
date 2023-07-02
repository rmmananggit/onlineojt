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
        <div class="row">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Imported Student Data</h5>

              <form>
                <div class="row">
                  <div class="col-md-12 mb-4">
                    <label for="studentId" class="form-label">Student ID:</label>
                    <input type="text" class="form-control" id="studentId" name="studentId" value="<?= $student_id ?>" readonly>
                  </div>
                  <div class="col-md-4 mb-4">
                    <label for="firstName" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $fname ?>" readonly>
                  </div>
                  <div class="col-md-4 mb-4">
                    <label for="middleName" class="form-label">Middle Name:</label>
                    <input type="text" class="form-control" id="middleName" name="middleName" value="<?= $mname ?>" readonly>
                  </div>
                  <div class="col-md-4 mb-4">
                    <label for="lastName" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $lname ?>" readonly>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" readonly>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="course" class="form-label">Course:</label>

                    <select name="course" required class="form-control">
                    <option value="" disabled>--Status--</option>
                    <option value="3" <?= $course == '3' ? 'selected' :'' ?> disabled> >Bachelor of Science in Marine Biology</option>
                    <option value="4" <?= $course == '4' ? 'selected' :'' ?> disabled>Bachelor of Science in Information Technology</option>
                    <option value="5" <?= $course == '5' ? 'selected' :'' ?> disabled>Bachelor of Secondary Education Major in Technology and Livelihood Education</option>
                    <option value="6" <?= $course == '6' ? 'selected' :'' ?> disabled>Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts</option>
                    
                </select>
                  </div>
                  <div class="col-md-4 mb-4">
                    <label for="statusName" class="form-label">Status:</label>
                    <input type="text" class="form-control" id="statusName" name="statusName" value="<?= $status_name ?>" readonly>
                  </div>
                  <div class="col-md-4 mb-4">
                    <label for="mobile" class="form-label">Mobile Number:</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $mobile ?>" readonly>
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
?>



<?php
include('includes/footer.php');
?>
