<?php
 include('authentication.php');
 include('header.php');
 include('sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Coordinator Account</h5>

            
              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-3">
                  <label for="inputName5" class="form-label">First Name:</label>
                  <input type="text" name="fname" class="form-control" id="inputName5" required>
                </div>
                <div class="col-md-3">
                  <label for="inputName5" class="form-label">Middle Name (Optional)</label>
                  <input type="text" name="mname" class="form-control" id="inputName5">
                </div>
                <div class="col-md-3">
                  <label for="inputName5" class="form-label">Last Name:</label>
                  <input type="text" name="lname" class="form-control" id="inputName5" required>
                </div>
                <div class="col-md-3">
                <label class="mb-2">Suffix:</label>
                <select class="form-control" name="suffix" required>
  <option selected disabled>Select Suffix</option>
  <option value="JR">JR</option>
  <option value="SR">SR</option>
  <option value="II">II</option>
  <option value="III">III</option>
  <option value="IV">IV</option>
</select>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Email:</label>
                  <input type="email" name="email" class="form-control" id="inputEmail5">
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
                            <label for="date" class="required">Date of Birth:</label>
                            <input required class="form-control" id="date" name="dob" placeholder="MM/DD/YYY" type="date" required>
                </div>

                <div class="col-md-12 mb-2">
  <label class="mb-2">Coordinator of:</label>
  <select class="form-control" name="course">
    <option selected disabled>Select Course</option>
    <option value="Bachelor of Science in Marine Biology">Bachelor of Science in Marine Biology</option>
    <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
    <option value="Bachelor of Secondary Education Major in Technology and Livelihood Education">Bachelor of Secondary Education Major in Technology and Livelihood Education</option>
    <option value="Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts">Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts</option>
  </select>
</div>

                <div class="col-md-6">                 
                <label class="mb-2">Upload Picture:</label> 
  <input type="file" class="input-large btn btn-secondary" name="picture" id="image1" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')" required>
  </div>

  <div class="col-md-6">

  <label class="mb-2 mt-2"><h5>Preview:</h5></label>

  <div class="mt-2" id="frame1"></div>

  </div>

                      
                          


                
               
                <div class="text-end">
                <a type="button" class="btn btn-danger" href="index.php">Back</a>
                  <button type="submit" value="submit" name="add_coordinator" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

</div>


<?php

include('footer.php')

?>