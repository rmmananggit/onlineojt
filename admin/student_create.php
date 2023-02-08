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
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">First Name</label>
                  <input type="text" name="fname" class="form-control" id="inputName5">
                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Middle Name</label>
                  <input type="text" name="mname" class="form-control" id="inputName5">
                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Last Name</label>
                  <input type="text" name="lname" class="form-control" id="inputName5">
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Phone Number</label>
                  <input type="text" name="phone" class="form-control" id="inputPassword5">
                </div>

                <div class="col-md-6">                 
                <label class="mb-2">Upload Picture (2x2)</label> <br>
                <input type="file" name="picture" accept=".jpg, .jpeg, .png" value="">
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

                
               
                <div class="text-end">
                <a type="button" class="btn btn-danger" href="coordinator_manage.php">Back</a>
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