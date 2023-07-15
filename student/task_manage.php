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
              <h5 class="card-title"> My Task</h5>

             
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                  <th class="col-3">Task</th>
                    <th scope="col">Status</th>
                    <th scope="col">Deadline</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
              <tbody>
              <?php

                if(isset($_SESSION['auth_user'])) 
                $currentUSER = $_SESSION['auth_user']['user_id'];

                            $query = "SELECT
                            task.student_id,
                            task.task, 
                            task.`status`, 
                            task.deadline
                          FROM
                            task
                            INNER JOIN
                            supervisor_student
                            ON 
                              task.student_id = supervisor_student.id
                          WHERE
                            task.student_id = $currentUSER'
                          ";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['task']; ?></td>
                          <td>
                          <?php 
                                                          if($row['status']=="Pending"){
                                                              ?>
                                                               <p><span style="color: red;">Pending</span></p>
                                                              <?php
                                                          }else{
                                                              ?>
                                                                 <p><span style="color: green;"><?php echo $row['status']; ?></span></p>
                                                              <?php
                                                          }
                                                        ?>
                          </td>
                          <td><?= $row['deadline']; ?></td>

                                    <td class="text-center">

                                   
 
<div class="btn-group" role="group" aria-label="Basic outlined example">
<form action="process.php" method="POST">  
<button type="submit" name="done_btn" value="<?=$row['task_id']; ?>" class="btn btn-outline-primary">Done</button>
</form>
</div>

                                  
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