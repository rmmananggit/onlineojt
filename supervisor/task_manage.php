<?php
include('authentication.php');
include('header.php');
include('sidebar.php');
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process.php" method="POST">
          <input type="hidden" id="accountID" name="id">

          <div class="form-group">
            <label for="message-text" class="col-form-label">Task Description:</label>
            <textarea required class="form-control" name="task" rows="5" placeholder="Add Task Description"></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Task Deadline:</label>
            <input required type="date" class="form-control" name="deadline">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_task" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('.btn-add-task').click(function() {
      var accountID = $(this).data('account-id');
      $('#accountID').val(accountID);
    });
  });
</script>

<div class="container">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage Student Task</h5>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id Number</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Mobile Number</th>
                  <th scope="col">Status</th>
                  <th class="col-3 text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_SESSION['auth_user'])) {
                  $super_id = $_SESSION['auth_user']['user_id'];
                  $query = "SELECT
                  acc_status.status_name, 
                  supervisor_student.*
                FROM
                  supervisor_student
                  INNER JOIN
                  acc_status
                  ON 
                    supervisor_student.acc_status = acc_status.status_id
                WHERE
                  supervisor_student.supervisor = $super_id";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                ?>
                      <tr>
                        <td><?= $row['student_id']; ?></td>
                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['mobile']; ?></td>
                        <td style="color: <?= $row['status_name'] === 'Active' ? 'green' : 'red'; ?>;"><?= $row['status_name']; ?></td>
                        <td class="text-center">
                          <form action="process.php" method="POST">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                              <a type="button" class="btn btn-outline-primary" href="task_view.php?id=<?= $row['id']; ?>">View</a>
                              <a type="button" class="btn btn-outline-info btn-add-task" data-toggle="modal" data-target="#exampleModal1" data-account-id="<?= $row['id']; ?>">Add Task</a>
                            </div>
                          </form>
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
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal -->
<div class="modal fade" id="importStudentModal" tabindex="-1" aria-labelledby="importStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="importStudentModalLabel">Import Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <section class="section">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <form action="import_student.php" method="POST" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="csvFile" class="form-label">Select CSV File:</label>
                        <input type="file" class="form-control" id="csvFile" name="csvFile">
                      </div>
                      <button type="submit" name="import" class="btn btn-primary float-end">Import</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('footer.php');
?>
