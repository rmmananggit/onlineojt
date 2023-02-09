
<?php
 include('authentication.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
<link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
  
<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
   
<style type="text/css" media="print">
 @media print{
    .noprint, .noprint *{
        display: none; 
    }
 }

</style>



    </head>
    <body onload="print()">
    <div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">View Student Information</h5>

              <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM student WHERE id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>

            
              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="id" value="<?=$user['id'];?>"> 

              <div class="col-md-12">
                  <label for="inputName5" class="form-label">Full Name</label>
                  <input type="text" readonly name="fname" class="form-control-plaintext" value="<?= $user['fname']; ?> <?= $user['mname']; ?> <?= $user['lname']; ?>" id="inputName5">
                </div>

              <div class="col-md-12">  
                <h6>Id Picture:</h6>               
                <?php 
                echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['picture']).'" 
                alt="image" style="height: 200px; max-width: 300px; object-fit: cover;">';
                ?>
                </div>

               
                <div class="col-md-12 mt-4">  
               <h2><center>ATTENDANCE</center></h2>
                </div>
     

               
                  
<section class="section mt-3">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">TIME-IN</h5>
        
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">DATE</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                            $query = "SELECT
                            attendance.id,
                            attendance.title, 
                            attendance.date
                          FROM
                            attendance
                          WHERE
                           attendance.id = '$id' AND
                            attendance.title = 'TIME-IN'
                          ORDER BY
                            attendance.date DESC";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['title']; ?></td>
                                    <td><?= $row['date']; ?></td>
                                  
                                    </tr>
                                    <?php
                                }
                            } else
                            {
                            ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
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

<div class="card">
  <div class="card-body">
    <h5 class="card-title">TIME-OUT</h5>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">DESCRIPTION</th>
          <th scope="col">DATE</th>
        </tr>
      </thead>
    <tbody>
    <?php
                  $query = "SELECT
                  attendance.id,
                  attendance.title, 
                  attendance.date
                FROM
                  attendance
                WHERE
                 attendance.id = '$id' AND
                  attendance.title = 'TIME-OUT'
                ORDER BY
                  attendance.date DESC";
                  $query_run = mysqli_query($con, $query);
                  if(mysqli_num_rows($query_run) > 0)
                  {
                      foreach($query_run as $row)
                      {
                          ?>
                          <tr>
                          <td><?= $row['title']; ?></td>
                          <td><?= $row['date']; ?></td>
                        
                          </tr>
                          <?php
                      }
                  } else
                  {
                  ?>
                      <tr>
                          <td colspan="6">No Record Found</td>
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

        </div>
      </div>
    </section>



               

                
               
              
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