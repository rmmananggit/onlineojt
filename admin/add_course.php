<?php
 include('authentication.php');
 include('header.php');
 include('sidebar.php');
 ?>

<div class="container">

<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Add Course</h5>

               <!-- Button to trigger the modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
        Add Course
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form fields to capture data -->
                    <form method="post" action="process.php">
                        <div class="form-group">
                            <label for="name"><b>Course:</b></label>
                            <input type="text" class="form-control" placeholder="Enter Course" name="course" required>
                        </div>
                        <div class="form-group">
                            <label for="acronym"><b>Acronym:</b></label>
                            <input class="form-control" placeholder="Eg. BSIT/BTLED  " name="acronym" required>
                        </div>
                      
                 
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_course" class="btn btn-primary">Save changes</button>
                </div>

                </form>
            </div>
        </div>
    </div>

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

include('footer.php')

?>