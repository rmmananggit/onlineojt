<?php
 include('authentication.php');
 include('header.php');
 include('sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Student Account</h5>

              <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM student WHERE id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>

            
              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="id" value="<?=$user['id'];?>"> 


              <div class="col-md-12">
                  <label for="inputName5" class="form-label">Student ID Number</label>
                  <input type="text" name="student_id" class="form-control" value="<?= $user['student_id']; ?>" id="inputName5">
                </div>


                <div class="col-md-3">
                  <label for="inputName5" class="form-label">First Name</label>
                  <input type="text" name="fname" class="form-control" value="<?= $user['fname']; ?>" id="inputName5">
                </div>
                <div class="col-md-3">
                  <label for="inputName5" class="form-label">Middle Name</label>
                  <input type="text" name="mname" class="form-control"  value="<?= $user['mname']; ?>" id="inputName5">
                </div>
                <div class="col-md-3">
                  <label for="inputName5" class="form-label">Last Name</label>
                  <input type="text" name="lname" class="form-control"  value="<?= $user['lname']; ?>" id="inputName5">
                </div>

                    <div class="col-md-3">
                    <label class="mb-2">Suffix:</label>
                    <select class="form-control" name="suffix">
                    <option value="" <?= $user['suffix'] == '' ? 'selected' :'' ?>  >N/A</option>
                    <option value="JR" <?= $user['suffix'] == 'JR' ? 'selected' :'' ?>  >JR</option>
                    <option value="SR" <?= $user['suffix'] == 'SR' ? 'selected' :'' ?>  >SR</option>
                    <option value="II" <?= $user['suffix'] == 'II' ? 'selected' :'' ?>  >II</option>
                    <option value="III" <?= $user['suffix'] == 'III' ? 'selected' :'' ?>  >III</option>
                    <option value="IV" <?= $user['suffix'] == 'IV' ? 'selected' :'' ?>  >IV</option>
                    </select>
                    </div>

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control"  value="<?= $user['email']; ?>" id="inputEmail5">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Phone Number</label>
                  <input type="text" name="mobile" class="form-control"  value="<?= $user['mobile']; ?>" id="inputPassword5">
                </div>

                <div class="col-md-6">                 
          
          <label class="mb-2">Status:</label>
          <select name="status" required class="form-control">
              <option value="" disabled>--Status--</option>
              <option value="1" <?= $user['acc_status'] == '1' ? 'selected' :'' ?>  >Active</option>
              <option value="2" <?= $user['acc_status'] == '2' ? 'selected' :'' ?>  >Archived</option>
              
          </select>
                        
          </div>

                

              

            


               

                
               
                <div class="text-end mt-5">
                <a type="button" class="btn btn-danger" href="student_manage1.php">Back</a>
                  <button type="submit" name="update_student" class="btn btn-primary">Update</button>
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