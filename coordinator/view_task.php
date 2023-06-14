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
      if (isset($_GET['id'])) {
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
                <label class="mb-2">Course:</label>
                <select name="course" required class="form-control">
                  <option value="" disabled>--Status--</option>
                  <option value="3" <?= $user['course'] == '3' ? 'selected' : '' ?> disabled>Bachelor of Science in Marine Biology</option>
                  <option value="4" <?= $user['course'] == '4' ? 'selected' : '' ?> disabled>Bachelor of Science in Information Technology</option>
                  <option value="5" <?= $user['course'] == '5' ? 'selected' : '' ?> disabled>Bachelor of Secondary Education Major in Technology and Livelihood Education</option>
                  <option value="6" <?= $user['course'] == '6' ? 'selected' : '' ?> disabled>Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts</option>
                </select>
              </div>

              <div class="row mt-4">
                <div class="col">
                  <hr class="my-4">
                </div>
                <div class="col-auto">
                  <h4>ALL TASK</h4>
                </div>
                <div class="col">
                  <hr class="my-4">
                </div>
              </div>

              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2">Task</th>
                    <th scope="col">Status</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Date Given</th>
                    <th scope="col">Deadline</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT
                              task.*
                            FROM
                              task
                            WHERE
                              task.student_id = $id";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                      ?>
                      <tr>
                        <td colspan="2"><?= $row['task']; ?></td>
                        <td>
                          <?php
                          if ($row['status'] == 'Pending') {
                            echo '<span class="text-danger">Pending</span>';
                          } else {
                            echo $row['status'];
                          }
                          ?>
                        </td>
                        <td>
                          <?php
                          if ($row['grade'] == 0) {
                            echo '<span class="text-danger">Not yet graded</span>';
                          } else {
                            echo $row['grade'];
                          }
                          ?>
                        </td>
                        <td><?= $row['date_given']; ?></td>
                        <td><?= $row['deadline']; ?></td>
                        <td class="text-center">
                          <a type="button" class="btn btn-outline-info" href="update_task.php?taskid=<?= $taskid; ?>'">Update</a>
                          <a type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Add Rating</a>
                        </td>
                      </tr>
                  <?php
                    }
                  } else {
                  ?>
                    <tr>
                      <td colspan="6">No Record Found</td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>

              <div class="text-end mt-5">
                <a type="button" class="btn btn-danger" href="manage_task.php">Back</a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Rating (1 is the lowest and 5 is the highest)</h5>
        </button>
      </div>
      <div class="modal-body">
        <form action="process.php" method="POST">
          <input type="show" name="id" value="<?= $user['id']; ?>">
          <div class="col-md-12 mb-4">
            <label for="inputName5" class="form-label">Enter Rating of the Student's Journal</label>
            <input type="text" name="rate" class="form-control" id="inputName5">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ratings" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
include('includes/footer.php');
?>
