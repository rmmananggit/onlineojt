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
            <h5 class="card-title">Manage Student Account</h5>
            <a type="button" href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#importStudentModal">Import Student</a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id Number</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Mobile Number</th>
                  <th scope="col">Status</th>
                  <th class="text-center">Action</th>
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
                                    <td><?= $row['mobile']; ?></td>
                                    <td><?= $row['mobile']; ?></td>
                                    <td style="color: <?= $row['status_name'] === 'Active' ? 'green' : 'red'; ?>;"><?= $row['status_name']; ?></td>
                        <td class="text-center">
                          <form action="process.php" method="POST">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                              <a type="button" class="btn btn-outline-primary" href="student_view.php?id=<?= $row['id']; ?>">View</a>
                              <!-- <a type="button" class="btn btn-outline-warning" href="student_update.php?id=<?= $row['id']; ?>">Update</a>
                              <a type="button" class="btn btn-outline-danger" href="student_update.php?id=<?= $row['id']; ?>">Archive</a> -->
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
