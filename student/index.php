<?php
 include('authentication.php');
 include('header.php');
 include('sidebar.php');
 ?>


<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
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



            <div class="col-xxl-4 col-xl-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">No. of Journal Passed:</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal"></i>
                    </div>
                    <div class="ps-3">

                    <?php
if (isset($_SESSION['auth_user'])) {
    $userID = $_SESSION['auth_user']['user_id'];
    $sql = "SELECT * FROM journal WHERE id = $userID";
    $sql_run = mysqli_query($con, $sql);
    if ($sql_run) {
        $journal_count = mysqli_num_rows($sql_run);
        echo '<h6>' . $journal_count . '</h6>';
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


            <div class="col-xxl-4 col-xl-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">No. of Task Completed:</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-list-task"></i>
                    </div>
                    <div class="ps-3">

                    <?php
                                        // $sql = "SELECT * FROM accounts WHERE acc_type = 3";
                                        // $sql_run = mysqli_query($con, $sql);
                                        // if($coor_count = mysqli_num_rows($sql_run)){
                                        //     echo '<h6>'.$coor_count.'</h6>';
                                        // }
                                        // else{
                                        //     echo '<h6>0</h6>';
                                        // }
                                    ?>

                 
                    </div>
                  </div>

                </div>
              </div>

            </div>




          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>


<?php
 include('footer.php');
 ?>