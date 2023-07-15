<?php  include('authentication.php'); 

function formatDate($time)
{
    $formattedTime = date("h:i A", strtotime($time));
    return $formattedTime;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ONLINE OJT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  

  
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>



<body onload="print()">

<div class="container">
    <div class="col-md-2">
<div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>

              <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM supervisor_student WHERE id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>

            
              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="id" value="<?=$user['id'];?>"> 

                <div class="col-md-4">
                  <label for="inputName5" class="form-label">First Name</label>
                  <input type="text" name="fname" class="form-control" value="<?= $user['fname']; ?>" id="inputName5" readonly>
                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Middle Name</label>
                  <input type="text" name="mname" class="form-control"  value="<?= $user['mname']; ?>" id="inputName5" readonly>
                </div>
                <div class="col-md-4">
                  <label for="inputName5" class="form-label">Last Name</label>
                  <input type="text" name="lname" class="form-control"  value="<?= $user['lname']; ?>" id="inputName5" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control"  value="<?= $user['email']; ?>" id="inputEmail5" readonly>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Phone Number</label>
                  <input type="text" name="mobile" class="form-control"  value="<?= $user['mobile']; ?>" id="inputPassword5" readonly>
                </div>

        
              </form>
              
              <?php
                                }
                            }
                            else
                            {
                                ?>
                                <h4>No Record Found!</h4>
                                <?php
                            }
                        }
                        ?>
<!-- End Multi Columns Form -->

            </div>
          </div>
          </div>
</div>


<div class="container mt-4">
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



<script type="text/javascript">
    window.onafterprint = window.close;
    window.print();
</script>