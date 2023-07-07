<?php
 include('authentication.php');
 include('header.php');
 include('sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Supervisor Account</h5>

              <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM accounts WHERE id='$id' ";
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
                  <input type="text" name="fname" class="form-control" value="<?= $user['fname']; ?>" id="inputName5">
                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Middle Name</label>
                  <input type="text" name="mname" class="form-control"  value="<?= $user['mname']; ?>" id="inputName5">
                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Last Name</label>
                  <input type="text" name="lname" class="form-control"  value="<?= $user['lname']; ?>" id="inputName5">
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
                  <select class="form-control" name="status">
                  <option value="1" <?= $user['acc_status'] == '1' ? 'selected' :'' ?> >Active</option>
                  <option value="2" <?= $user['acc_status'] == '2' ? 'selected' :'' ?> >Inactive</option>
                  </select>
                  </div>


                
                <div class="row mt-4">
                      <div class="col">
                      <hr class="my-4">
                      </div>
                      <div class="col-auto"> <h4>Company Details</h4></div>
                      <div class="col">
                      <hr class="my-4">
                      </div>
                      </div>


                      <div class="col-md-6">
                  <label for="inputName5" class="form-label">Company Name:</label>
                  <input type="text" name="company_name" value="<?= $user['company_name']; ?>" class="form-control" id="inputName5">
                </div>
                <div class="col-md-6">
                  <label for="inputName5" class="form-label">Company Email:</label>
                  <input type="text" name="company_email" value="<?= $user['company_email']; ?>" class="form-control" id="inputName5">
                </div>

                <div class="col-md-6">
  <label for="inputName5" class="form-label">Company Address:</label>
  <textarea name="company_address" class="form-control" id="inputName5"><?= $user['company_address']; ?></textarea>
</div>

                <div class="col-md-6">

                </div>


                <div class="col-md-6 text-center">  
                    <h6>Current Picture:</h6>               
                <?php 
                echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['picture']).'" 
                alt="image" style="height: 300px; max-width: 300px; object-fit: cover;">';
                ?>
                </div>


                <div class="col-md-6">                 
                <label class="mb-2">Upload Picture (2x2)</label> <br>
                <input type="file" name="picture" accept=".jpg, .jpeg, .png" value="">
                               </div>

                
               
                <div class="text-end mt-5">
                <a type="button" class="btn btn-danger" href="super_manage.php">Back</a>
                  <button type="submit" name="super_update" class="btn btn-primary">Submit</button>
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