<?php
 include('authentication.php');
 include('header.php');
 include('sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Announcement</h5>

              <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM announcement WHERE id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>

            
              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="id" value="<?=$user['id'];?>"> 


              <div class="col-md-12">
                            <label for="Description">Message:</label>
                            <textarea placeholder="Enter Message" required type="text"  name="message" class="form-control" rows="10"><?= $user['message']; ?></textarea>
                        </div>


             
                <div class="text-end mt-5">
                <a type="button" class="btn btn-danger" href="ann_manage.php">Back</a>
                  <button type="submit" name="update_ann" class="btn btn-primary">Submit</button>
                </div>
              </form>
              
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
<!-- End Multi Columns Form -->

            </div>
          </div>

</div>


<?php

include('footer.php')

?>