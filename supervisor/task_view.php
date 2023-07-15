<?php
include('authentication.php');
include('header.php');
include('sidebar.php');
?>

<div class="pagetitle">
      <h1>View Task</h1>

    </div>

    <section class="section">
      <div class="row align-items-top">
        <div class="col-lg-12">

<?php
 if (isset($_GET['id'])) {
  $id = $_GET['id'];
$query="SELECT * FROM task WHERE student_id='$id' ";
$query_run = mysqli_query($con,$query);
$check_announcement = mysqli_num_rows($query_run) > 0;

if($check_announcement)
{
    while($row = mysqli_fetch_assoc($query_run))
    {
            ?>


<div class="card">
            <div class="card-body"> 
            <?php
            $status = $row['status'];
            ?>

            <h5 class="card-title">
            Deadline: <?php echo $row['deadline'] ?>
            </h5>

             
              <?php echo $row['task'] ?> 

     
            </div>
            
            <div class="card-footer">
            <p class="submitted">
    Status: <span style="color: <?php echo $status === 'Pending' ? 'red' : 'green'; ?>;"><?php echo $status; ?></span>
</p>
            </div>
          </div>


            <?php
    }
    }
    else
{
 echo "This student has no task";
}
  }

?>
        </div>
    </div>
</section>






<?php
include('footer.php');
?>
