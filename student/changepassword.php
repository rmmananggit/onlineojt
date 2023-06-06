<?php
 include('authentication.php');
 include('includes/header.php');
 include('includes/sidebar.php');
 ?>
 <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Change Password</li>
        </ol>
      </nav>
    </div>

  <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <h2 hidden="true"><?php echo $_SESSION['auth_user']['user_id']; ?></h2>

            <?php

$user_id = $_SESSION['auth_user']['user_id'];
$users = "SELECT * FROM `student` WHERE id=$user_id";
$users_run = mysqli_query($con, $users);
        ?>
        <?php
        if(mysqli_num_rows($users_run) > 0)
        {
            foreach($users_run as $user)
            {
         ?>
<form action="process.php" method="POST" enctype="multipart/form-data">  
                    <input type="hidden" name="user_id" value="<?=$user['id'];?>">

                    <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['picture']).'" 
                                        alt="image" style="height: 250px; max-width: 310px; object-fit: cover;">';
                                        ?>
                                        <br>
             
            </div>
          </div>

          <a href="changepassword.php" class="btn btn-primary btn-block">CHANGE PASSWORD</a>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

        

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
            

                  <h5 class="card-title">Change Password</h5>
                  <div class="row">
                  <div class="col-md-12 mb-3">
                                    <label for="">Current Password:</label>
                                    <div class="input-group">
  <input required type="password" name="currentpassword" value="" class="form-control" id="passwordInput" placeholder="Enter Current Password">
  <button class="btn btn-outline-secondary" type="button" id="togglePassword">
    <i class="bi bi-eye" id="eyeIcon"></i>
  </button>
</div>
                    </div>
                    <div class="col-md-12 mb-3">
                                    <label for="">New Password:</label>
                                    <div class="input-group">
  <input required type="password" name="newpassword" value="" class="form-control" id="passwordInput1" placeholder="Enter New Password">
  <button class="btn btn-outline-secondary" type="button" id="togglePassword1">
    <i class="bi bi-eye" id="eyeIcon"></i>
  </button>
</div>
                    </div>
                    <div class="col-md-12 mb-3">
                                    <label for="">Confirm New Password:</label>
                                    <div class="input-group">
  <input required type="password" name="confirmpassword" value="" class="form-control" id="passwordInput2" placeholder="Enter Confirm Password">
  <button class="btn btn-outline-secondary" type="button" id="togglePassword2">
    <i class="bi bi-eye" id="eyeIcon"></i>
  </button>
</div>
                    </div>

                    <div class="text-end mt-4">
                                <a href="settings.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="change_password" class="btn btn-primary">Save</button>
                                </div>
                  
                   </div>
                  </div>

                </div>

             

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
                        
                        ?>
          </div>

        </div>
      </div>
    </section>


<?php

include('includes/footer.php')

?>