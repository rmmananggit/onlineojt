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
              <h5 class="card-title">Add Weekly Task</h5>
          
          
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                            $query = "SELECT
                            student.id, 
                            student.fname, 
                            student.mname, 
                            student.lname, 
                            student.email, 
                            student.course, 
                            acc_status.status_name, 
                            student.mobile
                          FROM
                            student
                            INNER JOIN
                            account_type
                            ON 
                              student.acc_type = account_type.acc_id
                            INNER JOIN
                            acc_status
                            ON 
                              student.acc_status = acc_status.status_id
                          WHERE
                            student.acc_status = 1";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['mobile']; ?></td>
                                    <td><?= $row['status_name']; ?></td>
                                    <td class="text-center">

<form action="process.php" method="POST">  
<div class="btn-group" role="group" aria-label="Basic outlined example">
<a type="button" class="btn btn-outline-primary" href="task_view.php?id=<?=$row['id'];?>">View</a>

<a type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal1">Add Task</a>
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













<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Task</h5>
        </button>
      </div>
      <div class="modal-body">
        <form action="process.php" method="POST">

        <input type="hidden" name="id" value="<?= $row['id']; ?>">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Task Title:</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Task Description:</label>
            <textarea class="form-control" name="description" rows="5" placeholder="Pull down to read full message"></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Task Deadline:</label>
            <input type="date" class="form-control" name="deadline">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_task" class="btn btn-primary">Save</button>
      </div>
        </form>

       
      </div>
    </div>
  </div>
</div>


                     



<?php

include('includes/footer.php')

?>