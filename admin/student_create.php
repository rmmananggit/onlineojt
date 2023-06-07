<?php
 include('authentication.php');
 include('includes/header.php');
 include('includes/sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Student Account</h5>

            
              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">
              <div class="col-md-3">
                  <label for="inputName1" class="form-label">First Name:</label>
                  <input  type="text" name="fname" class="form-control" id="inputName1" required>
                </div>
                <div class="col-md-3">
                  <label for="inputName2" class="form-label">Middle Name:</label>
                  <input type="text" name="mname" class="form-control" id="inputName2" required>
                </div>
                <div class="col-md-3">
                  <label for="inputName3" class="form-label">Last Name:</label>
                  <input type="text" name="lname" class="form-control" id="inputName3">
                </div>
                <div class="col-md-3">
                <label class="mb-2">Suffix:</label>
                <select class="form-control" name="suffix">
  <option selected disabled>Select Suffix</option>
  <option value="JR">JR</option>
  <option value="SR">SR</option>
  <option value="II">II</option>
  <option value="III">III</option>
  <option value="IV">IV</option>
</select>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Email:</label>
                  <input type="email" name="email" class="form-control" id="inputEmail4" required>
                </div>

                <div class="col-md-6">
                <label class="mb-2">Phone Number:</label>
                <input type="text" name="phone" class="form-control" pattern="[0-9]{1,11}" maxlength="11" title="Please enter a valid phone number with a maximum of 11 digits" required>
                <small class="form-text text-muted">Please enter a valid phone number using only numbers (maximum 11 digits).</small>
                </div>


                <div class="col-md-6">
                <label for="">Gender:</label>
                <br>
                <input required class="ml-2" type="radio" name="gender" value="Male"> Male
                <input required class="ml-2"  type="radio" name="gender" value="Female"> Female
                </div>

             
                <div class="col-md-6">
  <label class="mb-2">Course:</label>
  <select class="form-control" name="course">
    <option selected disabled>Select Course</option>
    <option value="3">Bachelor of Science in Marine Biology</option>
    <option value="4">Bachelor of Science in Information Technology</option>
    <option value="5">Bachelor of Secondary Education Major in Technology and Livelihood Education</option>
    <option value="6">Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts</option>
  </select>
</div>


                <div class="col-md-6">                 
                <label class="mb-2">Upload Picture:</label> <br>
  <input type="file" class="input-large btn btn-secondary" name="picture" id="image1" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')" required>
  <br>

  <label class="mb-2 mt-2"><h5>Preview:</h5></label>

  <div class="mt-2" id="frame1"></div>
                </div>

                
               
                <div class="text-end">
                <a type="button" class="btn btn-danger" href="student_manage.php">Back</a>
                  <button type="submit" name="add_student" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>

              </form><!-- End Multi Columns Form -->

            </div>
          </div>

</div>


<?php

include('includes/footer.php')

?>