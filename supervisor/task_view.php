<?php
 include('authentication.php');
 include('includes/header.php');
 include('includes/sidebar.php');
 ?>

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

              <div class="col-md-6">
                  <label for="inputName5" class="form-label">Full Name</label>
                  <input type="text" readonly name="fname" class="form-control-plaintext" value="<?= $user['fname']; ?> <?= $user['mname']; ?> <?= $user['lname']; ?>" id="inputName5">
                </div>

              <div class="col-md-6">  
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

<div class="col-lg-12">
  <h2><center>Weekly Task</center></h2>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title"></h5>
    <table class="table">
      <thead>
        <tr>
          <th scope="col"> Task Title</th>
          <th scope="col"> Task Description</th>
          <th scope="col"> Status</th>
          <th scope="col"> Date Given</th>
          <th scope="col"> Date Deadline</th>
        </tr>
      </thead>
    <tbody>
    <?php
                  $query = "SELECT
                  task.task_id, 
                  task.student_id, 
                  task.title, 
                  task.status,
                  task.task, 
                  task.date_given, 
                  task.deadline
                FROM
                  task
                WHERE
                  task.student_id = '$id'
                ORDER BY
                  task.date_given DESC ";
                  $query_run = mysqli_query($con, $query);
                  if(mysqli_num_rows($query_run) > 0)
                  {
                      foreach($query_run as $row)
                      {
                          ?>
                          <tr>
                          <td><?= $row['title']; ?></td>
                          <td><?= $row['task']; ?></td>
                          <td><?= $row['status']; ?></td>
                          <td><?= $row['date_given']; ?></td>
                          <td><?= $row['deadline']; ?></td>
                        
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