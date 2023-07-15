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
<div class="card">
            <div class="card-body">
              <h5 class="card-title">View Student Attendance</h5>

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
                                if(isset($_GET['id']))
                                {
                                    $id = $_GET['id'];
                                $query = "SELECT `attendance_id`,`date`, TIME_FORMAT(`time_in`, '%H:%i:%s') AS `formatted_time_in`, TIME_FORMAT(`time_out`, '%H:%i:%s') AS `formatted_time_out` FROM `attendance` WHERE `user_id` = $id ORDER BY `time_in` ASC";
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
                              }else{
                                echo "No attendance!";
                              }
                                ?>
                            </tbody>
                        </table>




            </div>
</div>





<?php
include('footer.php')
?>