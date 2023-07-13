<?php
 include('authentication.php');
 include('header.php');
 include('sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Comment</h5>
              
            
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
                  <label for="inputName5" class="form-label"><b>Comment:</b></label>
                  <textarea required class="form-control" name="comment" rows="10" placeholder="Enter your comment regarding on the journal here"></textarea>
                </div>

                
                <div class="col-md-12">                 
               
                <div class="text-end mt-4">
                <a type="button" class="btn btn-danger" href="index.php">Back</a>
                  <button type="submit" name="add_comment" class="btn btn-primary">Submit</button>
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

include('footer.php')

?>