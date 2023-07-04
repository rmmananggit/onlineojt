
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

      
            <h1><center>STUDENT ATTENDANCE </center></h1>

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

  <div class="col-md-3">
    <label for="inputName5" class="form-label">First Name</label>
    <input type="text" name="fname" class="form-control" value="<?= $user['fname']; ?>" id="inputName5" readonly>
  </div>
  <div class="col-md-3">
    <label for="inputName5" class="form-label">Middle Name</label>
    <input type="text" name="mname" class="form-control"  value="<?= $user['mname']; ?>" id="inputName5" readonly>
  </div>
  <div class="col-md-3">
    <label for="inputName5" class="form-label">Last Name</label>
    <input type="text" name="lname" class="form-control"  value="<?= $user['lname']; ?>" id="inputName5" readonly>
  </div>

  <div class="col-md-3">
                <label class="mb-2">Suffix:</label>
                <select class="form-control" name="suffix" disabled>
  <option selected disabled>Select Suffix</option>
  <option value="JR" <?= $user['suffix'] == 'JR' ? 'selected' :'' ?> >JR</option>
  <option value="SR" <?= $user['suffix'] == 'SR' ? 'selected' :'' ?> >SR</option>
  <option value="II" <?= $user['suffix'] == 'II' ? 'selected' :'' ?> >II</option>
  <option value="III" <?= $user['suffix'] == 'III' ? 'selected' :'' ?> >III</option>
  <option value="IV" <?= $user['suffix'] == 'IV' ? 'selected' :'' ?> >IV</option>
</select>
                </div>
  <div class="col-md-6">
    <label for="inputEmail5" class="form-label">Email</label>
    <input type="email" name="email" class="form-control"  value="<?= $user['email']; ?>" id="inputEmail5" readonly>
  </div>
  <div class="col-md-6">
    <label for="inputPassword5" class="form-label">Phone Number</label>
    <input type="text" name="mobile" class="form-control"  value="<?= $user['mobile']; ?>" id="inputPassword5" readonly>
  </div>


  <div class="col-md-6">                 

  <label class="mb-2">Course:</label>
  <select name="course" required class="form-control" disabled>
      <option value="" disabled>--Status--</option>
      <option value="3" <?= $user['course'] == '3' ? 'selected' :'' ?> >Bachelor of Science in Marine Biology</option>
      <option value="4" <?= $user['course'] == '4' ? 'selected' :'' ?> >Bachelor of Science in Information Technology</option>
      <option value="5" <?= $user['course'] == '5' ? 'selected' :'' ?> >Bachelor of Secondary Education Major in Technology and Livelihood Education</option>
      <option value="6" <?= $user['course'] == '6' ? 'selected' :'' ?> >Bachelor of Technology Livelihood Education Major in Home Economics and Major in Industrial Arts</option>
      
  </select>
                
  </div>



               
                <div class="col-md-12 mt-4">  
               <h2><center>ATTENDANCE</center></h2>
                </div>
     
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
                            $query = "SELECT `attendance_id`, `user_id`, `time`, `name` FROM attendance WHERE attendance_id = '$id' AND attendance.name = 'TIME-IN' ORDER BY attendance.time DESC";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['time']; ?></td>
                                  
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
                  $query = "SELECT `attendance_id`, `user_id`, `time`, `name` FROM attendance WHERE attendance_id = '$id' AND attendance.name = 'TIME-OUT' ORDER BY attendance.time DESC";
                  $query_run = mysqli_query($con, $query);
                  if(mysqli_num_rows($query_run) > 0)
                  {
                      foreach($query_run as $row)
                      {
                          ?>
                          <tr>
                          <td><?= $row['name']; ?></td>
                          <td><?= $row['time']; ?></td>
                        
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