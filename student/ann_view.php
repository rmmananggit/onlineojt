<?php
include('authentication.php');
include('header.php');
include('sidebar.php');
?>

<div class="pagetitle">
      <h1>View Announcement</h1>

    </div>

    <section class="section">
      <div class="row align-items-top">
        <div class="col-lg-12">

<?php
$query="SELECT
announcement.message, 
announcement.date_announced, 
accounts.fname, 
accounts.mname, 
accounts.lname, 
account_type.`name`
FROM
announcement
INNER JOIN
accounts
ON 
    announcement.user_id = accounts.id
INNER JOIN
account_type
ON 
    accounts.acc_type = account_type.acc_id
ORDER BY
announcement.date_announced DESC";
$query_run = mysqli_query($con,$query);
$check_announcement = mysqli_num_rows($query_run) > 0;

if($check_announcement)
{
    while($row = mysqli_fetch_assoc($query_run))
    {
            ?>


<div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['fname'] ?> <?php echo $row['mname'] ?> <?php echo $row['lname'] ?></h5>
             
              <?php echo $row['message'] ?>


            </div>
            
            <div class="card-footer">
                <p class="submitted"> <?php echo $row['date_announced'] ?> </p>
            </div>
          </div>


            <?php
    }
}else
{

}


?>
        </div>
    </div>
</section>






<?php
include('footer.php');
?>
