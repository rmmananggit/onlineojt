<?php
 include('authentication.php');
 include('header.php');
 include('sidebar.php');
 
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Requirement/File</h5>
              
            
              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">


              <?php if(isset($_SESSION['auth_user']))  ?>


              <form method="post" action="process.php" enctype="multipart/form-data">

              <input required type="text" hidden  name="user_id" value="<?=  $_SESSION['auth_user']['user_id']; ?>" class="form-control">

              <div class="col-md-12">
                  <label for="inputName5" class="form-label"><b>File Name:</b></label>
                  <input type="text" class="form-control" name="name"
                 placeholder="Enter file name" required>
                </div>

              <div class="form-group">
        <input type="file" name="pdf_file"
                 class="form-control" accept=".pdf"
                 title="Upload PDF"/>
        </div>

        <div class="text-end">
                <a type="button" class="btn btn-danger" href="student_file.php">Back</a>
                  <button type="submit" name="submit_file" class="btn btn-primary">Submit</button>
                </div>
    </form>

            

               

               
               

              </form><!-- End Multi Columns Form -->

            </div>
          </div>

</div>


<?php

include('footer.php')

?>