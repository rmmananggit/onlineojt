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
              <h5 class="card-title"> Manage Student Account</h5>
          
              <a type="button" href="student_create.php" class="btn btn-primary mb-3">Add Student Account</a>
              <table class="table">
                <thead>
                  <tr>
                    <th class="col-2">Id Number</th>
                    <th class="col-2">Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                            $query = "SELECT
                            student.*, 
                            course.course_name, 
                            account_type.`name`, 
                            acc_status.status_name
                          FROM
                            student
                            INNER JOIN
                            course
                            ON 
                              student.course = course.course_id
                            INNER JOIN
                            account_type
                            ON 
                              student.acc_type = account_type.acc_id
                            INNER JOIN
                            acc_status
                            ON 
                              student.acc_status = acc_status.status_id";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td> <?= $row['student_id']; ?> </td>
                                    <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                                    <td><?= $row['course_name']; ?></td>
                
                                    <td style="color: <?= $row['status_name'] === 'Active' ? 'green' : 'red'; ?>;"><?= $row['status_name']; ?></td>
                                    <td class="text-center">

<form action="process.php" method="POST">
    
<div class="btn-group" role="group" aria-label="Basic outlined example">
<a type="button" class="btn btn-outline-primary" href="student_update.php?id=<?=$row['id'];?>">Update</a>

<button type="submit" name="download_student" value="<?=$row['id']; ?>" class="btn btn-outline-warning">Download</button>

<button type="submit" name="delete_student" value="<?=$row['id']; ?>" class="btn btn-outline-danger">Archive</button>

</div>

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
</div>














<?php

include('footer.php')

?>