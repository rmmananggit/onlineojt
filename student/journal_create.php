<?php
 include('authentication.php');
 include('header.php');
 include('sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Journal</h5>
              
            
              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">


              <?php if(isset($_SESSION['a
              uth_user']))  ?>


            <label for="" hidden="true">user_id</label>
            <input required type="text" hidden name="user_id" value="<?=  $_SESSION['auth_user']['user_id']; ?>" class="form-control">
              <div class="col-md-12">
                  <label for="inputName5" class="form-label">Journal Title</label>
                  <input required class="form-control" name="title" placeholder="Enter Journal Title (Ex. Week 1)"></input>
                </div>

                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Journal Message</label>
                  <textarea required class="form-control" name="message" rows="10" placeholder="Enter Journal Message"></textarea>
                </div>

                <div class="col-md-6">
                    <label class="mb-2">Attach Photos</label> <br>
                    <input type="file" required name="photos[]" accept=".jpg, .jpeg, .png" multiple>
                </div>
                
                <div class="text-end">
                <a type="button" class="btn btn-danger" href="index.php">Back</a>
                  <button type="submit" name="add_journal" class="btn btn-primary">Submit</button>
                </div>

              </form><!-- End Multi Columns Form -->

            </div>
          </div>

</div>


<?php

include('footer.php')

?>