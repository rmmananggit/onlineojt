<?php
include('authentication.php');
include('header.php');
include('sidebar.php');
?>

<div class="container">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">SET OJT HOUR</h5>
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">COURSE</th>
                  <th scope="col">ACRONYM</th>
                  <th scope="col">Total number of OJT hours</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_SESSION['auth_user'])) {
                  // Retrieve the user ID from the session
                  $user_course = $_SESSION['auth_user']['user_course'];

                  // Prepare and execute the SQL query
                  $query = "SELECT course.*
                            FROM course
                            WHERE course.course_id = $user_course";
                  $query_run = mysqli_query($con, $query);

                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                      ?>
                      <tr>
                        <td><?= $row['course_name']; ?></td>
                        <td><?= $row['acronym']; ?></td>
                        <td<?= ($row['ojt_hours'] == 0) ? ' style="color: red;"' : ''; ?>>
                          <?= ($row['ojt_hours'] == 0) ? 'Not yet set' : $row['ojt_hours']; ?>
                         </td>
                        <td class="text-center">
                          <div class="btn-group" role="group" aria-label="Basic outlined example">
                          <a type="button" class="btn btn-outline-info" href="#" data-toggle="modal" data-target="#myModal" data-course-id="<?= $row['course_id']; ?>" data-whatever="<?= $row['course_id']; ?>">Update</a>
                          </div>
                        </td>
                      </tr>
                      <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="3">No Record Found</td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody>
            </table>
            <!-- End Default Table Example -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Update OJT Hour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="process.php" method="POST">
              <div class="modal-body">
                  <input type="hidden" name="id" id="row_id" value="">
                  <div class="mb-3">
                      <label for="inputName5" class="form-label">Time:</label>
                      <input type="text" name="time" class="form-control" id="inputName1" required>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" name="add_ojt_hour" class="btn btn-primary">Submit</button>
              </div>
            </form>
        </div>
    </div>
</div>




<?php
include('footer.php');
?>
