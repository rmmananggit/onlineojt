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
              <h5 class="card-title"> Supervisor</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Action</th>
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
                            accounts.email
                        FROM
                            accounts
                        WHERE
                            accounts.acc_type = 3 AND
                            accounts.acc_status = 1";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                                    <td><?= $row['mobile']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td class="text-center">

                                   
 
<div class="btn-group" role="group" aria-label="Basic outlined example">

<a type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Add Comment</a>
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




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comment for Supervisor</h5>
        </button>
      </div>
      <div class="modal-body">
        <form action="process.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $_SESSION['auth_user']['user_id']; ?>">

          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="comment" rows="5" placeholder="Enter Message here!"></textarea>
          </div>
       
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_comment" class="btn btn-primary">Save</button>
      </div>
        </form>

       
      </div>
    </div>
  </div>
</div>











<?php

include('includes/footer.php')

?>