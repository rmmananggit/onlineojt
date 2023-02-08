<?php
 include('authentication.php');
 include('includes/header.php');
 include('includes/sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Journal</h5>

            
              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Journal Message</label>
                  <textarea required class="form-control" rows="10" placeholder="Enter Journal Message"></textarea>
                </div>

                <div class="col-md-6">                 
                <label class="mb-2">Upload Picture #1</label> <br>
                <input type="file" required name="pic1" accept=".jpg, .jpeg, .png" value="">
                </div>

                <div class="col-md-6">                 
                <label class="mb-2">Upload Picture #2</label> <br>
                <input type="file" required name="pic2" accept=".jpg, .jpeg, .png" value="">
                </div>
              
               
                <div class="text-end">
                <a type="button" class="btn btn-danger" href="journal_manage.php">Back</a>
                  <button type="submit" name="add_student" class="btn btn-primary">Submit</button>
                </div>

              </form><!-- End Multi Columns Form -->

            </div>
          </div>

</div>


<?php

include('includes/footer.php')

?>