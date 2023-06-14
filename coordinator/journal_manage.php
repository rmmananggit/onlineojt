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
              <h5 class="card-title">Student Journals</h5>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Date Submitted</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
              <tbody>
              <?php


                            $query = "SELECT
                            student.fname, 
                            student.mname, 
                            student.lname, 
                            journal.journal_id, 
                            journal.title, 
                            journal.message, 
                            journal.pic1, 
                            journal.pic2, 
                            journal.grade, 
                            journal.date
                          FROM
                            student
                            INNER JOIN
                            journal
                            ON 
                              student.id = journal.id";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                                    <td><?= $row['title']; ?></td>
                                    <td>
                                    <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['pic1']).'" 
                                        alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">'; ?>
                                    </td>
              
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

                                    
<div class="btn-group" role="group" aria-label="Basic outlined example">
<a type="button" class="btn btn-outline-primary" href="journal_view.php?id=<?=$row['journal_id'];?>">View</a>

<a type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Add Rating</a>
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

        <input type="" name="journalid" value="<?=$row['journal_id'];?>">

        <div class="col-md-12 mb-4">
                  <label for="inputName5" class="form-label">Enter Rating of the Student's Journal</label>
                  <input type="text" name="rate" class="form-control" id="inputName5">
                </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="journal_add_ratings" class="btn btn-primary">Save changes</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>


                     


<?php

include('includes/footer.php')

?>