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
              <h5 class="card-title"> My Journal</h5>

              <a type="button" href="journal_create.php" class="btn btn-primary mb-3">Add New Journal</a>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Journal #</th>
                    <th scope="col">Message</th>
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
                            id = '$currentUSER'";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['journal_id']; ?></td>
                                    <td><?= $row['title']; ?></td>
              
                                    <td>
                                    <?php 
                                                          if($row['grade']=="0"){
                                                              ?>
                                                               <p><span style="color: red;">Not yet graded</span></p>
                                                              <?php
                                                          }else{
                                                              ?>
                                                                 <p><span style="color: green;"><?php echo $row['grade']; ?></span></p>
                                                              <?php
                                                          }
                                                        ?>
                                    </td>
                                    <td><?= $row['date']; ?></td>
                                    <td class="text-center">

                                   
                                    <form action="process.php" method="POST">
<div class="btn-group" role="group" aria-label="Basic outlined example">
<a type="button" class="btn btn-outline-primary" href="journal_view.php?id=<?=$row['journal_id'];?>">View</a>

<a type="button" class="btn btn-outline-info" href="journal_update.php?id=<?=$row['journal_id'];?>">Update</a>

<button type="submit" name="delete_journal" value="<?=$row['journal_id']; ?>" class="btn btn-outline-danger">Delete</button>
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