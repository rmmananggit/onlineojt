<?php
 include('authentication.php');
 include('includes/header.php');
 include('includes/sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Student Information</h5>

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

  <div class="col-md-6 text-center">  
  <h6>Current Picture:</h6>               
  <?php 
  echo '<img class="img-fluid" src = "data:image;base64,'.base64_encode($user['picture']).'" 
  alt="image" style="height: 300px;">';
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
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                            $query = "SELECT
                            attendance.attendance_id,
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
                                  <td>
                                  <form action="process.php" method="POST">  
                                  <button type="submit" name="delete_attendance" value="<?=$row['attendance_id']; ?>" class="btn btn-outline-danger">Delete</button>
                                  </form>
                                </td>
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
                    <th scope="col">ACTION</th>
        </tr>
      </thead>
    <tbody>
    <?php
                  $query = "SELECT
                  attendance.attendance_id,
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
                        <td>
                        <form action="process.php" method="POST">  
                                  <button type="submit" name="delete_attendance" value="<?=$row['attendance_id']; ?>" class="btn btn-outline-danger">Delete</button>
                                  </form>
                        </td>
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



               

                
               
                <div class="text-end mt-5">
                <a type="button" class="btn btn-danger" href="attendance_manage.php">Back</a>
                 
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


<?php

include('includes/footer.php')

?>