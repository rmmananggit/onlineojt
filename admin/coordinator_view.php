<?php
 include('authentication.php');
 include('header.php');
 include('sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Coordinator Account</h5>

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
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control"  value="<?= $user['email']; ?>" id="inputEmail5" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Phone Number</label>
                  <input type="text" name="mobile" class="form-control"  value="<?= $user['mobile']; ?>" id="inputPassword5" readonly>
                </div>

                <div class="col-md-12 mb-2">
  <label class="mb-2">Coordinator of:</label>
  <select class="form-control" name="course" disabled>
    <option selected disabled>Select Course</option>
    <option value="Bachelor of Science in Marine Biology" <?= $user['course'] == 'Bachelor of Science in Marine Biology' ? 'selected' :'' ?> >Bachelor of Science in Marine Biology</option>
    <option value="Bachelor of Science in Information Technology" <?= $user['course'] == 'Bachelor of Science in Information Technology' ? 'selected' :'' ?> >Bachelor of Science in Information Technology</option>
    <option value="Bachelor of Secondary Education Major in Technology and Livelihood Education" <?= $user['course'] == 'Bachelor of Secondary Education Major in Technology and Livelihood Education' ? 'selected' :'' ?> >Bachelor of Secondary Education Major in Technology and Livelihood Education</option>
    <option value="Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts" <?= $user['course'] == 'Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts' ? 'selected' :'' ?> >Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts</option>
                    
  </select>
</div>

                <div class="col-md-6 text-center">  
                    
                </div>

                <div class="col-md-6 text-center">  
                    <h6>Current Picture:</h6>               
                <?php 
                echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['picture']).'" 
                alt="image" style="height: 300px; max-width: 300px; object-fit: cover;">';
                ?>
                </div>


      
                
               
                <div class="text-end mt-5">
                <a type="button" class="btn btn-danger" href="coordinator_manage.php">Back</a>
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