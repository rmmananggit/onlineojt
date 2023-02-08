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
              <h5 class="card-title"> My Journal</h5>

              <a type="button" href="journal_create.php" class="btn btn-primary mb-3">Add New Journal</a>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Journal Id</th>
                    <th scope="col">Message</th>
                    <th scope="col">Picture #1</th>
                    <th scope="col">Picture #2</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Date Submitted</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
              <tbody>
              <?php

                          if(isset($_SESSION['auth_user'])) 
                          $currentUSER = $_SESSION['auth_user']['user_id'];
              
                            $query = "SELECT
                            journal.*
                          FROM
                            journal
                          WHERE
                            journal.id = '$currentUSER'";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['journal_id']; ?></td>
                                    <td><?= $row['message']; ?></td>
                                    <td><?= $row['pic1']; ?></td>
                                    <td><?= $row['pic2']; ?></td>
                                    <td><?= $row['grade']; ?></td>
                                    <td><?= $row['date']; ?></td>
                                    <td class="text-center">

                                   


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

include('includes/footer.php')

?>