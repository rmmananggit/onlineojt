<?php
include('authentication.php');
include('header.php');
include('sidebar.php');
?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">View Journal</h5>
            <form class="row g-3" action="process.php" method="POST" enctype="multipart/form-data">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "SELECT
                            journal.journal_id, 
                            journal.title, 
                            journal.message, 
                            journal.grade, 
                            journal.date, 
                            journal.id, 
                            photos.photo
                          FROM
                            journal
                          INNER JOIN
                            photos
                          ON 
                            journal.journal_id = photos.journal_id
                          WHERE
                            journal.journal_id = $id";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                        $user = mysqli_fetch_assoc($result);
                        ?>
                        <div class="col-md-12">
                            <label for="inputName5" class="form-label"><b>Journal Title:</b></label>
                            <input readonly class="form-control" value="<?= $user['title']; ?>">
                        </div>

                        <div class="col-md-12">
                            <label for="inputName5" class="form-label"><b>Journal Message:</b></label>
                            <textarea readonly class="form-control" rows="10"><?= $user['message']; ?></textarea>
                        </div>

                        <div class="col-md-3">
                            <label for="inputName5" class="form-label"><b>Date Submitted:</b></label>
                            <input readonly class="form-control" value="<?= $user['date']; ?>">
                        </div>

                        <div class="col-md-3">
                            <label for="inputName5" class="form-label"><b>Grade:</b></label>
                            <input readonly class="form-control" value="<?= ($user['grade'] == 0) ? 'Not yet graded' : $user['grade']; ?>">
                        </div>

                        <div class="col-md-12">
    <label for="inputName5" class="form-label"><b>Photos:</b></label>
    <div class="row">
        <?php
        $query = "SELECT photo FROM photos WHERE journal_id = $id";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $photoData = $row['photo'];
                $imageData = base64_encode($photoData);
                $src = 'data:image/jpeg;base64,' . $imageData;
                ?>
                <div class="col-md-4">
                    <div class="image-container" style="height: 100%; width: 100%; max-width: 100%;">
                        <img src="<?= $src; ?>" alt="Journal Photo" class="img-fluid" style="height: 100%; width: 100%; object-fit: contain;">
                    </div>
                </div>
                <?php
                $count++;
                if ($count % 3 == 0) {
                    echo '</div><div class="row">';
                }
            }
        } else {
            ?>
            <div class="col-md-12">
                <p>No photos available.</p>
            </div>
            <?php
        }
        ?>
    </div>
</div>

                        <div class="text-end">
                            <a type="button" class="btn btn-danger" href="journal_manage.php">Back</a>

                            <a type="button" class="btn btn-primary" href="journal_manage.php">Print</a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <h4>No Record Found!</h4>
                        <?php
                    }
                }
                ?>
            </form><!-- End Multi Columns Form -->
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
