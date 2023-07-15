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
                  <h5 class="card-title">Total Student Handled</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-video"></i>
                    </div>
                    <div class="ps-3">

                    <?php
                                        $sql = "SELECT * FROM supervisor_student";
                                        $sql_run = mysqli_query($con, $sql);
                                        if($student_count = mysqli_num_rows($sql_run)){
                                            echo '<h6>'.$student_count.'</h6>';
                                        }
                                        else{
                                            echo '<h6>0</h6>';
                                        }
                                    ?>
                  

                    </div>
                  </div>
                </div>

              </div>
            </div>

      
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Total Journal</span></h5>

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
            </div>

     
            <div class="col-xxl-4 col-xl-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Pending Task:</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-list-task"></i>
                    </div>
                    <div class="ps-3">

                    <?php
                                        $sql = "SELECT * FROM `task` WHERE `status` = 'Pending'";
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

            </div>

                 
            <div class="col-xxl-4 col-xl-6">

              <div class="card info-card done-card">

                <div class="card-body">
                  <h5 class="card-title">Done Task:</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-list-task"></i>
                    </div>
                    <div class="ps-3">

                    <?php
                                        $sql = "SELECT * FROM `task` WHERE `status` = 'Done'";
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

            </div>

           

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>


<?php
include('footer.php')
?>