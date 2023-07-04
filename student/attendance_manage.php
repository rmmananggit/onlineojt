<?php
include('authentication.php');
include('includes/header.php');
include('includes/sidebar.php');
?>

<div class="container">

  <h2><center>ATTENDANCE</center></h2>
  <h5><center>You must time-in at 8 am and time-out at 12 pm. Also in 1 pm and 5 pm.</center></h5>

  <?php
  $currentHour = date('H'); // Get the current hour in 24-hour format

  $disableButton = false; // Assume the button is enabled by default

  $timein = false;
  $timeout = false; // Initialize the $timein variable

  // Check if the current time is within the specified ranges
  if (($currentHour >= 8 && $currentHour < 12) || ($currentHour >= 13 && $currentHour < 17)) {
      $timein = true;
      $timeout = true; // Disable the button
  }
  ?>

  <!-- HTML code with the button -->

  <section class="section mt-3">
    <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Attendance</h5>

                        <form action="process.php" method="POST">

                            <?php if(isset($_SESSION['auth_user']))  ?>

                            <label for="" hidden="true">user_id</label>
                            <input type="text" hidden name="user_id" value="<?=$_SESSION['auth_user']['user_id']; ?>">

                            <div class="dropdown mb-4">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Click me!
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <button class="dropdown-item" type="submit" name="timein">Log me in</button>
                                    <button class="dropdown-item" type="submit" name="timeout">Log me out</button>
                                </div>
                            </div>


                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">TIME</th>
                                    <th scope="col">NAME</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $userId = $_SESSION['auth_user']['user_id']; 
                                $query = "SELECT `user_id`, `time`, `name` FROM `attendance` WHERE `user_id` = $userId ORDER BY `time` DESC";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                        <tr>
                                          <td><?= $row['time']; ?></td>
                                          <td><?= $row['name']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                ?>
                                    <tr>
                                      <td colspan="2">No Record Found</td>
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

            <div class="col-lg-6">

                <!-- Rest of your HTML code -->

            </div>


    </div>
  </section>
</div>

<?php
include('includes/footer.php')
?>
