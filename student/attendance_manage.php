<?php
 include('authentication.php');
 include('includes/header.php');
 include('includes/sidebar.php');
 ?>

<div class="container">
    
<h2><center>ATTENDANCE</center></h2>
   
<section class="section mt-3">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">TIME-IN</h5>
          
              <form action="process.php" method="POST">

<?php if(isset($_SESSION['auth_user']))  ?>

<label for="" hidden="true">user_id</label>
<input required type="text" hidden name="user_id" value="<?=$_SESSION['auth_user']['user_id']; ?>">


<button class="btn btn-secondary mb-2" type="submit" name="timein" >CLICK HERE TO TIME-IN</button>


</form>
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
                            attendance.title, 
                            attendance.date
                          FROM
                            attendance
                          WHERE
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

    <form action="process.php" method="POST">

<?php if(isset($_SESSION['auth_user']))  ?>

<label for="" hidden="true">user_id</label>
<input required type="text" hidden name="user_id" value="<?=$_SESSION['auth_user']['user_id']; ?>">


<button class="btn btn-secondary mb-2" type="submit" name="timeout" >CLICK HERE TO TIME-OUT</button>


</form>
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
                  attendance.title, 
                  attendance.date
                FROM
                  attendance
                WHERE
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
</div>




<?php

include('includes/footer.php')

?>