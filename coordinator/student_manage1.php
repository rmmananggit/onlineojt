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
                  <th class="col-2">ID Number</th>
                    <th class="col-2">Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Course</th>
                    <th scope="col">Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
              <tbody>
              <?php

$userID = $_SESSION['auth_user']['user_course'];
                            $query = "SELECT
                            student.id, 
                            student.student_id, 
                            student.fname, 
                            student.mname, 
                            student.lname, 
                            student.suffix, 
                            student.email, 
                            student.mobile, 
                            student.gender, 
                            student.course, 
                            account_type.`name`, 
                            acc_status.status_name, 
                            course.course_name
                        FROM
                            account_type
                            INNER JOIN
                            student
                            ON 
                                student.acc_type = account_type.acc_id
                            INNER JOIN
                            acc_status
                            ON 
                                student.acc_status = acc_status.status_id
                            INNER JOIN
                            course
                            ON 
                                student.course = course.course_id
                        WHERE
                            student.course = $userID";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td> <?= $row['student_id']; ?> </td>
                                    <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                                    <td><?= $row['mobile']; ?></td>
                                    <td style="font-size: 13px; color: green;"><?= $row['course_name']; ?></td>

                                    <td style="color: <?= $row['status_name'] === 'Active' ? 'green' : 'red'; ?>;"><?= $row['status_name']; ?></td>

</td>

</td>

                                    <td class="text-center">

<form action="process.php" method="POST">
    
<div class="btn-group" role="group" aria-label="Basic outlined example">
<a type="button" class="btn btn-outline-primary" href="student_view.php?id=<?=$row['id'];?>">View</a>

<a type="button" class="btn btn-outline-info" href="#">Print</a>
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