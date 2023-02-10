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

              <a type="button" href="add_file.php" class="btn btn-primary mb-3">Add File   </a>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Journal #</th>
                     <th>File Title</th>
                     <th>File Name</th>
                     <th class="text-center">ACTION</th>
                  </tr>
                </thead>
              <tbody>
              <?php

                if(isset($_SESSION['auth_user'])) 
                $currentUSER = $_SESSION['auth_user']['user_id'];

                            $query = "SELECT
                            student_files.*
                          FROM
                          student_files
                          WHERE
                            id = '$currentUSER'";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['file_id']; ?></td>
                                    <td><?= $row['filetitle']; ?></td>
                                    <td><?= $row['filename']; ?></td>
                                    <td class="text-center"><a href="pdf/<?php echo $row['filename']; ?>" download>Download</td>
                                  
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