<?php
 include('authentication.php');
 include('includes/header.php');
 include('includes/sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Journal</h5>
              
            
              <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM journal WHERE journal_id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>


              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="journal_id" value="<?=$user['journal_id'];?>">

              <div class="col-md-12">
                  <label for="inputName5" class="form-label">Journal Title</label>
                  <input required class="form-control" name="title" value="<?=$user['title'];?>" placeholder="Enter Journal Title (Ex. Week 1)"></input>
                </div>

                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Journal Message</label>
                  <textarea required class="form-control" name="message" rows="10" placeholder="Enter Journal Message"><?=$user['message'];?></textarea>
                </div>

                <div class="col-md-6">                 
                <label class="mb-2">Upload Picture:</label> <br>
                <input type="file"  name="pic1" accept=".jpg, .jpeg, .png">
                </div>

                <div class="col-md-6">                 
                <label class="mb-2">Upload Picture:</label> <br>
                <input type="file"  name="pic2" accept=".jpg, .jpeg, .png">
                </div>
              
                <div class="col-md-6 text-center">                 
                <label class="mb-2">Current Photo</label> <br>
                <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['pic1']).'" 
                                        alt="image" style="height: 300px; max-width: 500px; object-fit: cover;">'; ?>
                </div>

                <div class="col-md-6">                 
                <label class="mb-2">Current Photo</label> <br>
                <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['pic2']).'" 
                                        alt="image" style="height: 300px; max-width: 500px; object-fit: cover;">'; ?>
              
               
                <div class="text-end mt-4">
                <a type="button" class="btn btn-danger" href="index.php">Back</a>
                  <button type="submit" name="edit_journal" class="btn btn-primary">Submit</button>
                </div>
                </div>
              </form><!-- End Multi Columns Form -->
              <?php
                                }
                            }
                            else
                            {
                                ?>
                                <h4>No Record Found!</h4>
                                <?php
                            }
                        }
                        ?>
            </div>
          </div>

</div>


<?php

include('includes/footer.php')

?>