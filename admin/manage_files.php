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
              <h5 class="card-title"> Download Student Files</h5>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                  <th scope="col">File Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">File Name</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                            $query = "SELECT
                            student_files.stud_id, 
                            coordinator_student.fname, 
                            coordinator_student.mname, 
                            coordinator_student.lname, 
                            student_files.file
                          FROM
                            student_files
                            INNER JOIN
                            coordinator_student
                            ON 
                              student_files.stud_id = coordinator_student.id
                          WHERE
                            coordinator_student.acc_status = 1
                          ORDER BY
                            student_files.stud_id DESC";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['stud_id']; ?></td>
                                    <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                                    <td><?= $row['file_title']; ?></td>
                                    <td class="text-center"><a href="pdf/<?php echo $row['file']; ?>" download>Download</td>
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