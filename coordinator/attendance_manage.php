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
            <h5 class="card-title">View Student Attendance</h5>
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Student ID Number</th>
                  <th scope="col">Full Name</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(isset($_SESSION['auth_user'])) {
                  // Retrieve the user ID from the session
                  $user_id = $_SESSION['auth_user']['user_id'];

                  // Prepare and execute the SQL query
                  $query = "SELECT
                              attendance.attendance_id, 
                              attendance.user_id, 
                              attendance.time, 
                              attendance.`name`, 
                              coordinator_student.fname, 
                              coordinator_student.mname, 
                              coordinator_student.lname
                            FROM
                              attendance
                              INNER JOIN
                              coordinator_student
                              ON 
                                attendance.attendance_id = coordinator_student.id
                            WHERE
                              coordinator_student.coordinator = $user_id";
                  $query_run = mysqli_query($con, $query);

                  if(mysqli_num_rows($query_run) > 0) {
                    foreach($query_run as $row) {
                      ?>
                      <tr>
                        <td><?= $row['student_id']; ?></td>
                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                        <td class="text-center">
                          <form action="process.php" method="POST">  
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                              <a type="button" class="btn btn-outline-primary" href="attendance_view.php?id=<?=$row['id'];?>">View</a>

                            </div>
                          </form>
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

<?php
include('footer.php');
?>
