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
              <h5 class="card-title">Comment by Student</h5>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
              <tbody>
              <?php


                            $query = "SELECT
                            `comment`.comment_id, 
                            student.fname, 
                            student.mname, 
                            student.lname, 
                            `comment`.message
                        FROM
                            `comment`
                            INNER JOIN
                            student
                            ON 
                                `comment`.student_id = student.id";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['comment_id']; ?></td>
                                    <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                                    <td><?= $row['message']; ?></td>
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

        
      
    </section>
</div>







<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Rating (1 is the lowest and 5 is the highest)</h5>
        </button>
      </div>
      <div class="modal-body">
        <form action="process.php" method="POST">

        <input type="hidden" name="id" value="<?= $row['id']; ?>">

        <div class="col-md-12 mb-4">
                  <label for="inputName5" class="form-label">Enter Rating of the Student's Journal</label>
                  <input type="text" name="rate" class="form-control" id="inputName5">
                </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add_ratings" class="btn btn-primary">Save changes</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>


                     


<?php

include('includes/footer.php')

?>