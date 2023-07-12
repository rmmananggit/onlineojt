<?php
include('authentication.php');
include('header.php');
include('sidebar.php');
?>

<div class="pagetitle">
  <h1>Profile</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div>

<section class="section profile">
  <div class="row">

    <h2 hidden="true"><?php echo $_SESSION['auth_user']['user_id']; ?></h2>

    <?php
    $user_id = $_SESSION['auth_user']['user_id'];
    $users = "SELECT * FROM `supervisor_student` WHERE id=$user_id";
    $users_run = mysqli_query($con, $users);
    ?>
    <?php
    if (mysqli_num_rows($users_run) > 0) {
      foreach ($users_run as $user) {
    ?>
        <form action="process.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $user['id']; ?>">

          <div class="col-xl-12">
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                </ul>
                <div class="tab-content pt-2">
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <h5 class="card-title">Profile Details</h5>
                    <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Student Id:</label>
                        <input required type="text" name="student_id" value="<?= $user['student_id']; ?>" class="form-control">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="">First Name:</label>
                        <input required type="text" name="fname" value="<?= $user['fname']; ?>" class="form-control">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="">Middle Name:</label>
                        <input  type="text" name="mname" value="<?= $user['mname']; ?>" class="form-control">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="">Last Name:</label>
                        <input required type="text" name="lname" value="<?= $user['lname']; ?>" class="form-control">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="">Mobile Number:</label>
                        <input required type="text" name="mobile" value="<?= $user['mobile']; ?>" class="form-control">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="">Email:</label>
                        <input required type="email" name="email" value="<?= $user['email']; ?>" class="form-control">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="">Password:</label>
                        <div class="input-group">
                          <input required type="password" name="password" value="<?= $user['password']; ?>" class="form-control" id="password-input">
                          <button class="btn btn-outline-secondary" type="button" id="toggle-password">
                            <i class="bi bi-eye"></i>
                          </button>
                        </div>
                      </div>
                    
                      <div class="text-end mt-4">
                        <a href="index.php" class="btn btn-danger">Back</a>
                        <button type="submit" name="update_account" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
    <?php
      }
    } else {
    ?>
      <h4>No Record Found!</h4>
    <?php
    }
    ?>
  </div>
</section>

<?php
include('footer.php')
?>