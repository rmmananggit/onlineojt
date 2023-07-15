<?php
include('authentication.php');
include('header.php');
include('sidebar.php');
?>

<div class="container">
  <!-- MODAL FOR CREATE ANNOUNCEMENT -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add Announcement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form fields to capture data -->
          <form method="POST" action="process.php">
            <div class="form-group">
              <label class="mb-2" for="name"><b>Message:</b></label>
              <textarea class="form-control" placeholder="Enter Announcement" name="ann" rows="10" required></textarea>
            </div>

            <div class="form-group">
              <input type="hidden" class="form-control" name="userid" value="<?php echo $_SESSION['auth_user']['user_id']; ?>" readonly>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_ann" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage Announcement</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Announcement</button>
            <table class="table">
              <thead>
                <tr>
                  <th class="col-6">Message</th>
                  <th scope="col">Date Announced:</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_SESSION['auth_user'])) {
                  // Retrieve the user ID from the session
                  $user_id = $_SESSION['auth_user']['user_id'];
                  $query = "SELECT * FROM `announcement` WHERE user_id='$user_id'";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                      ?>
                      <tr>
                        <td style="text-align: justified;"><?php echo $row['message']; ?></td>
                        <td><?= $row['date_announced']; ?></td>
                        <td class="text-center">
                          <form action="process.php" method="POST">
                            <button type="button" class="btn btn-outline-primary view-btn" data-toggle="modal" data-target="#viewModal<?=$row['id'];?>" data-id="<?=$row['id'];?>">View</button>
                            <a type="button" class="btn btn-outline-warning" href="ann_update.php?id=<?= $row['id']; ?>">Update</a>
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteConfirmationModal" data-delete-id="<?=$row['id'];?>">Delete</button>
                          </form>
                        </td>
                      </tr>
                      <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="6">No Record Found</td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- View Modal -->
<?php
if (isset($_SESSION['auth_user'])) {
  $user_id = $_SESSION['auth_user']['user_id'];
  $query = "SELECT * FROM `announcement` WHERE user_id='$user_id'";
  $query_run = mysqli_query($con, $query);
  if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
      ?>
      <div class="modal fade" id="viewModal<?=$row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel<?=$row['id'];?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewModalLabel<?=$row['id'];?>">View Announcement</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Display announcement details -->
              <p><?php echo $row['message']; ?></p>
              <p>Date Announced: <?php echo $row['date_announced']; ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
  }
}
?>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this announcement?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="process.php" method="POST">
                    <input type="hidden" name="delete_id" id="deleteIdInput">
                    <button type="submit" name="ann_delete" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php')
?>
