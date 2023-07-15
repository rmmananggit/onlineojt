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
                        <h5 class="card-title"> My Files</h5>
                        <a type="button" href="add_file.php" class="btn btn-primary mb-3">Add File   </a>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['auth_user'])) {
                                    $currentUSER = $_SESSION['auth_user']['user_id'];

                                    $query = "SELECT
                                        files_table.*
                                    FROM
                                        files_table
                                    WHERE
                                        student_id = '$currentUSER'";
                                    $query_run = mysqli_query($con, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        while ($row = mysqli_fetch_assoc($query_run)) {
                                            ?>
                                            <tr>
                                                <td><?= $row['file_name']; ?></td>
                                                <td class="text-center">
                                                    <a href="download_file.php?file_id=<?= $row['id']; ?>" class="btn btn-outline-warning">Download</a>
                                                </td>
                                            </tr>
                                <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="2">No Record Found</td>
                                        </tr>
                                <?php
                                    }
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

<?php
include('footer.php');
?>
