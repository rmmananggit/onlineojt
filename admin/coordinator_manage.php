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
              <h5 class="card-title"> Manage Coordinator Account</h5>
          
              <a type="button" href="coordinator_create.php" class="btn btn-primary mb-3">Add Coordinator Account</a>
              <table class="table">
                <thead>
                  <tr>
                    <th class="col-2">Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                            $query = "SELECT
                            accounts.id, 
                            accounts.fname, 
                            accounts.mname, 
                            accounts.lname, 
                            accounts.mobile, 
                            accounts.picture,
                            accounts.email, 
                            accounts.course,
                            account_type.`name`, 
                            acc_status.status_name
                        FROM
                            accounts
                            INNER JOIN
                            account_type
                            ON 
                                accounts.acc_type = account_type.acc_id
                            INNER JOIN
                            acc_status
                            ON 
                                accounts.acc_status = acc_status.status_id
                        WHERE
                            accounts.acc_type = 2 AND
                            accounts.acc_status = 1";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><b><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></b></td>
                                    <td style="color: green;"><?= $row['course']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['mobile']; ?></td>
                                    <td><?= $row['status_name']; ?></td>
                                    <td class="text-center">

<form action="process.php" method="POST">  
<div class="btn-group" role="group" aria-label="Basic outlined example">
<a type="button" class="btn btn-outline-primary" href="coordinator_view.php?id=<?=$row['id'];?>">View</a>
<a type="button" class="btn btn-outline-warning" href="coordinator_update.php?id=<?=$row['id'];?>">Update</a>

<button type="submit" name="delete_coordinator" value="<?=$row['id']; ?>" class="btn btn-outline-danger">Archive</button>
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