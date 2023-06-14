<?php
 include('authentication.php');
 include('includes/header.php');
 include('includes/sidebar.php');
 ?>

<div class="container">

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Add Course</h5>

              <a type="button" href="coordinator_create.php" class="btn btn-primary mb-3">Click here to add course</a>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Course</th>
                    <th scope="col">Acronym</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                            $query = "SELECT
                            course.course_name, 
                            course.acronym
                        FROM
                            course";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['course_name']; ?></td>
                                    <td><?= $row['acronym']; ?></td>

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