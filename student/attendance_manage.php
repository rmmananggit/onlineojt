<?php
 include('authentication.php');
 include('includes/header.php');
 include('includes/sidebar.php');
 ?>

<div class="container">
    

   
<section class="section mt-2">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> My Attendance</h5>
          
              <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
  Add Attendance
</button>
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
                            $query = "#";
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
<a type="button" class="btn btn-outline-primary" href="student_update.php?id=<?=$row['id'];?>">Update</a>

<button type="submit" name="delete_student" value="<?=$row['id']; ?>" class="btn btn-outline-primary">Delete</button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ATTENDANCE!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<form>
  <div class="form-group row">
    <label for="time-in" class="col-sm-2 col-form-label">Time In</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" id="time-in">
    </div>
  </div>
  <div class="form-group row mt-2">
    <label for="time-out" class="col-sm-2 col-form-label">Time Out</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" id="time-out">
    </div>
  </div>

  


      </div>
      <div class="modal-footer">
      <div class="text-end mt-2">
                <a type="button" class="btn btn-danger" href="journal_manage.php">Back</a>
                  <button type="submit" name="add_student" class="btn btn-primary">Submit</button>
                </div>
      </div>
</form>
    </div>
  </div>
</div>



<?php

include('includes/footer.php')

?>