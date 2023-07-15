<?php
include('authentication.php');
include('header.php');
include('sidebar.php');

function formatDate($time)
{
    $formattedTime = date("h:i A", strtotime($time));
    return $formattedTime;
}


?>

<div class="container">
    <h2><center>ATTENDANCE</center></h2>

    <section class="section dashboard">
        <div class="row">
        <div class="col-xxl-4 col-md-6">
  <div class="card info-card sales-card">
    <div class="card-body">
      <h5 class="card-title">Your Total Hours Rendered:</h5>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-stopwatch"></i>
        </div>
        <div class="ps-3">
          <?php
          if (isset($_SESSION['auth_user'])) {
            $userId = $_SESSION['auth_user']['user_id'];
            $query1 = "SELECT time_in, time_out FROM attendance WHERE user_id = $userId";
            $result = mysqli_query($con, $query1);

            // Calculate total hours rendered
            $total_hours = 0; // Initialize the total hours variable
            while ($row = mysqli_fetch_assoc($result)) {
              $in_time = strtotime($row['time_in']);
              $out_time = strtotime($row['time_out']);
              $difference = $out_time - $in_time;
              $total_hours += $difference / 3600; // Convert seconds to hours
            }

            mysqli_free_result($result);

            $total_hours_formatted = intval($total_hours); // Convert total hours to an integer
            echo '<h6>' . $total_hours_formatted . '</h6>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xxl-4 col-md-6">
  <div class="card info-card sales-card">
    <div class="card-body">
      <h5 class="card-title">Hours Required for Rendering:</h5>
      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-stopwatch"></i>
        </div>
        <div class="ps-3">
        <?php
        if (isset($_SESSION['auth_user'])) {
          $user_course = $_SESSION['auth_user']['user_course'];
          $sql = "SELECT ojt_hours FROM course WHERE course_id = $user_course";
          $sql_run = mysqli_query($con, $sql);
          if ($sql_run && mysqli_num_rows($sql_run) > 0) {
            $row = mysqli_fetch_assoc($sql_run);
            $ojt_hours = $row['ojt_hours'];
            echo '<h6>' . $ojt_hours . '</h6>';
          } else {
            echo '<h6>0</h6>';
          }
        }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>
        </div>
    </section>

    <!-- HTML code with the button -->
    <section class="section mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Attendance</h5>

                        <form action="process.php" method="POST">
                            <?php if (isset($_SESSION['auth_user'])) {
                                $currentTime = new DateTime('now', new DateTimeZone('Asia/Manila'));
                                $disableTimein = ($currentTime->format('H:i') > '08:15') ? 'disabled' : '';
                            ?>
                                <label for="" hidden="true">user_id</label>
                                <input type="text" hidden name="user_id" value="<?= $_SESSION['auth_user']['user_id']; ?>">

                                <div class="d-flex justify-content-between mb-4">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Click me!
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button class="dropdown-item" type="submit" name="timein" <?= $disableTimein; ?>>Log me in</button>
                                            <button class="dropdown-item" type="submit" name="timeout">Log me out</button>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-secondary">Print Attendance</button>
                                </div>

                            <?php } ?>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">DATE</th>
                                    <th scope="col">TIME-IN</th>
                                    <th scope="col">TIME-OUT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $userId = $_SESSION['auth_user']['user_id'];
                                $query = "SELECT `user_id`,`date`, TIME_FORMAT(`time_in`, '%H:%i:%s') AS `formatted_time_in`, TIME_FORMAT(`time_out`, '%H:%i:%s') AS `formatted_time_out` FROM `attendance` WHERE `user_id` = $userId ORDER BY `time_in` ASC";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                        ?>
                                        <tr>
                                            <td><?= $row['date']; ?></td>
                                            <td><?= formatDate($row['formatted_time_in']); ?></td>
                                            <td><?= formatDate($row['formatted_time_out']); ?></td>
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
