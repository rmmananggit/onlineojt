<?php
session_start();
include('authentication.php');
include('includes/header.php');
include('includes/sidebar.php');
?>

<div class="container">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage Student Account</h5>
            <a type="button" href="import_student.php" class="btn btn-primary mb-3">Import Student</a>
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
                  $user_id = $_SESSION['auth_user']['user_id'];
                  $query = "SELECT
                              coordinator_student.id,
                              coordinator_student.coordinator,
                              coordinator_student.student_id,
                              coordinator_student.fname,
                              coordinator_student.mname,
                              coordinator_student.lname,
                              coordinator_student.suffix,
                              coordinator_student.mobile,
                              coordinator_student.email,
                              coordinator_student.`password`,
                              coordinator_student.gender,
                              course.course_name,
                              acc_status.status_name
                            FROM
                              coordinator_student
                              INNER JOIN
                              accounts
                              ON
                                coordinator_student.coordinator = accounts.id
                              INNER JOIN
                              course
                              ON
                                coordinator_student.course = course.course_id
                              INNER JOIN
                              acc_status
                              ON
                                accounts.acc_status = acc_status.status_id AND
                                coordinator_student.acc_status = acc_status.status_id
                            WHERE
                              coordinator_student.acc_status = 1 AND
                              coordinator_student.coordinator = $user_id";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                ?>
                      <tr>
                        <td><?= $row['student_id']; ?></td>
                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['mobile']; ?></td>
                        <td><?= $row['status_name']; ?></td>
                        <td class="text-center">
                          <form action="process.php" method="POST">
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                              <a type="button" class="btn btn-outline-primary" href="student_view.php?id=<?= $row['id']; ?>">View</a>
                              <a type="button" class="btn btn-outline-info" href="student_update.php?id=<?= $row['id']; ?>">Update</a>
                              <a type="button" class="btn btn-outline-danger" href="student_update.php?id=<?= $row['id']; ?>">Archive</a>
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

<?php
include('includes/footer.php');
?>
