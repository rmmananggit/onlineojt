<?php
include('authentication.php');
include('header.php');
include('sidebar.php');
?>

<div class="container">
  <div class="card">
    <div class="card-body mt-3">

      <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $users = "SELECT * FROM supervisor_student WHERE id='$id' ";
        $users_run = mysqli_query($con, $users);

        if (mysqli_num_rows($users_run) > 0) {
          foreach ($users_run as $user) {
      ?>

            <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $user['id']; ?>">

              <div class="col-md-4">
                <label for="inputName5" class="form-label">First Name</label>
                <input type="text" name="fname" class="form-control" value="<?= $user['fname']; ?>" id="inputName5" readonly>
              </div>
              <div class="col-md-4">
                <label for="inputName5" class="form-label">Middle Name</label>
                <input type="text" name="mname" class="form-control" value="<?= $user['mname']; ?>" id="inputName5" readonly>
              </div>
              <div class="col-md-4">
                <label for="inputName5" class="form-label">Last Name</label>
                <input type="text" name="lname" class="form-control" value="<?= $user['lname']; ?>" id="inputName5" readonly>
              </div>
              <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $user['email']; ?>" id="inputEmail5" readonly>
              </div>
              <div class="col-md-6">
                <label for="inputPassword5" class="form-label">Phone Number</label>
                <input type="text" name="mobile" class="form-control" value="<?= $user['mobile']; ?>" id="inputPassword5" readonly>
              </div>

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Student Task</h5>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date Given</th>
                        <th scope="col">Deadline</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $tasks = "SELECT * FROM task WHERE student_id='$id' ";
                        $tasks_run = mysqli_query($con, $tasks);

                        if (mysqli_num_rows($tasks_run) > 0) {
                          foreach ($tasks_run as $row) {
                      ?>
                            <tr>
                              <td><?= $row['task']; ?></td>
                              <td>
  <?php if ($row['status'] === 'Pending'): ?>
    <span class="text-danger">Pending</span>
  <?php elseif ($row['status'] === 'Done'): ?>
    <span class="text-success">Done</span>
  <?php endif; ?>
</td>

                              <td><?= $row['date_given']; ?></td>
                              <td><?= $row['deadline']; ?></td>
                            </tr>
                      <?php
                          }
                        } else {
                      ?>
                          <tr>
                            <td colspan="4">No Record Found</td>
                          </tr>
                      <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="text-end mt-5">
                <a type="button" class="btn btn-danger" href="task_manage.php">Back</a>
              </div>
            </form>

      <?php
          }
        } else {
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
