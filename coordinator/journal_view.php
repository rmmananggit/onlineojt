<?php
 include('authentication.php');
 include('includes/header.php');
 include('includes/sidebar.php');
 ?>

<div class="container">
<div class="card">
            <div class="card-body">
              <h5 class="card-title">View Journal</h5>
              
              <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">


              <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT
                            student.fname, 
                            student.mname, 
                            student.lname, 
                            journal.*
                          FROM
                            student
                            INNER JOIN
                            journal
                            ON 
                              student.id = journal.id
                          WHERE
                            journal.journal_id = $id";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>


                <div class="col-md-12">
                  <label for="inputName5" class="form-label"> <b>Student Name:</b></label>
                  <input readonly class="form-control-plaintext" value="<?= $user['fname']; ?> <?= $user['mname']; ?> <?= $user['lname']; ?>"></input>

                </div>
              <div class="col-md-12">
                  <label for="inputName5" class="form-label"> <b>Journal Title:</b></label>
                  <input readonly class="form-control-plaintext" value="<?= $user['title']; ?>"></input>
                </div>

                <div class="col-md-12">
                  <label for="inputName5" class="form-label"> <b>Journal Message:</b></label>
                  <textarea readonly class="form-control-plaintext" rows="20" value="" ><?= $user['message']; ?></textarea>
                </div>

                <div class="col-md-12">
                  <label for="inputName5" class="form-label"> <b>Date Submitted:</b></label>
                  <input readonly class="form-control-plaintext" value="<?= $user['date']; ?>"></input>
                </div>

                <div class="col-md-6 text-center">                 
                <label class="mb-2">Photo #1</label> <br>
                <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['pic1']).'" 
                                        alt="image" style="height: 300px; max-width: 500px; object-fit: cover;">'; ?>
                </div>

                <div class="col-md-6">                 
                <label class="mb-2">Photo #2</label> <br>
                <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['pic2']).'" 
                                        alt="image" style="height: 300px; max-width: 500px; object-fit: cover;">'; ?>
              
               
                <div class="text-end">
                <a type="button" class="btn btn-danger" href="journal_manage.php">Back</a>
                </div>

              </form><!-- End Multi Columns Form -->
              <?php
                                }
                            }
                            else
                            {
                                ?>
                                <h4>No Record Found!</h4>
                                <?php
                            }
                        }
                        ?>
            </div>
          </div>

</div>


<?php

include('includes/footer.php')

?>