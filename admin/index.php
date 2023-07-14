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

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Total Student Accounts</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-video"></i>
                    </div>
                    <div class="ps-3">

                    <?php
                                        $sql = "SELECT * FROM student";
                                        $sql_run = mysqli_query($con, $sql);
                                        if($student_count = mysqli_num_rows($sql_run)){
                                            echo '<h6>'.$student_count.'</h6>';
                                        }
                                        else{
                                            echo '<h6>0</h6>';
                                        }
                                    ?>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Total Coordinator Account</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">

                    <?php
                                        $sql = "SELECT * FROM accounts WHERE acc_type = 2";
                                        $sql_run = mysqli_query($con, $sql);
                                        if($coor_count = mysqli_num_rows($sql_run)){
                                            echo '<h6>'.$coor_count.'</h6>';
                                        }
                                        else{
                                            echo '<h6>0</h6>';
                                        }
                                    ?>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-4">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total Supervisor Account</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">

                    <?php
                                        $sql = "SELECT * FROM accounts WHERE acc_type = 3";
                                        $sql_run = mysqli_query($con, $sql);
                                        if($coor_count = mysqli_num_rows($sql_run)){
                                            echo '<h6>'.$coor_count.'</h6>';
                                        }
                                        else{
                                            echo '<h6>0</h6>';
                                        }
                                    ?>

                 
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

               <!-- Customers Card -->
               <div class="col-xxl-6 col-xl-6">

<div class="card info-card customers-card">

  <div class="card-body">
    <h5 class="card-title">Total Journal's Passed</span></h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
      <i class="bi bi-journal"></i>
      </div>
      <div class="ps-3">

      <?php
                          $sql = "SELECT * FROM journal";
                          $sql_run = mysqli_query($con, $sql);
                          if($coor_count = mysqli_num_rows($sql_run)){
                              echo '<h6>'.$coor_count.'</h6>';
                          }
                          else{
                              echo '<h6>0</h6>';
                          }
                      ?>

   
      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->


   <!-- Customers Card -->
   <div class="col-xxl-6 col-xl-6">

<div class="card info-card customers-card">

  <div class="card-body">
    <h5 class="card-title">Total Task</span></h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
      <i class="bi bi-list-task"></i>
      </div>
      <div class="ps-3">

      <?php
                          $sql = "SELECT * FROM task";
                          $sql_run = mysqli_query($con, $sql);
                          if($coor_count = mysqli_num_rows($sql_run)){
                              echo '<h6>'.$coor_count.'</h6>';
                          }
                          else{
                              echo '<h6>0</h6>';
                          }
                      ?>

   
      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->

      
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>


<?php
 include('footer.php');
 ?>