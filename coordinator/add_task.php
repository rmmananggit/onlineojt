<?php
 include('authentication.php');
 include('includes/header.php');
 include('includes/sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Student Information</h5>

              <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT
                            student.*
                          FROM
                            student
                          WHERE
                            student.id = $id
                           AND
                            student.acc_status = 1";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>

            
              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="id" value="<?=$user['id'];?>"> 

                <div class="col-md-4">
                  <label for="inputName5" class="form-label">First Name</label>
                  <input type="text" name="fname" class="form-control" value="<?= $user['fname']; ?>" id="inputName5" readonly>

                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Middle Name</label>
                  <input type="text" name="mname" class="form-control"  value="<?= $user['mname']; ?>" id="inputName5" readonly>
                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Last Name</label>
                  <input type="text" name="lname" class="form-control"  value="<?= $user['lname']; ?>" id="inputName5" readonly>
                </div>
               

                <div class="col-md-6">                 
                <label class="mb-2">Course:</label>
                <select name="course" required class="form-control">
                    <option value="" disabled>--Status--</option>
                    <option value="3" <?= $user['course'] == '3' ? 'selected' :'' ?> disabled>Bachelor of Science in Marine Biology</option>
                    <option value="4" <?= $user['course'] == '4' ? 'selected' :'' ?> disabled>Bachelor of Science in Information Technology</option>
                    <option value="5" <?= $user['course'] == '5' ? 'selected' :'' ?> disabled>Bachelor of Secondary Education Major in Technology and Livelihood Education</option>
                    <option value="6" <?= $user['course'] == '6' ? 'selected' :'' ?> disabled>Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts</option>
                    
                </select>  </div>

        
                <div class="row mt-4">
                      <div class="col">
                      <hr class="my-4">
                      </div>
                      <div class="col-auto"> <h4>ADD TASK</h4></div>
                      <div class="col">
                      <hr class="my-4">
                      </div>
                      </div>


                      <div class="col-md-12 center">
                  <label for="TASK:" class="form-label">Task Title:</label>
                  <textarea type="text" name="task" class="form-control" id="tasktitle" required></textarea>
                </div>

                <div class="col-md-12">
                            <label for="date" class="required">Deadline:</label>
                            <input required class="form-control" id="date" name="deadline" placeholder="MM/DD/YYY" type="date" required>
                </div>

                
               
                <div class="text-end mt-5">
                <a type="button" class="btn btn-danger" href="manage_task.php">Back</a>
                  <button type="submit" name="add_task" class="btn btn-primary">Submit</button>
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

include('includes/footer.php')

?>