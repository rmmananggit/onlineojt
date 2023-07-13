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
                        <h5 class="card-title">Student's Journal</h5>
                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Grade</th>
                                    <th scope="col">Date Submitted</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['auth_user'])) {
                                    $currentCOURSE = $_SESSION['auth_user']['user_course'];

                                    $query = "SELECT
                                                supervisor_student.fname, 
                                                supervisor_student.mname, 
                                                supervisor_student.lname, 
                                                supervisor_student.student_id, 
                                                journal.journal_id, 
                                                journal.id, 
                                                journal.title, 
                                                journal.grade, 
                                                journal.message, 
                                                journal.date, 
                                                supervisor_student.course
                                            FROM
                                                journal
                                                INNER JOIN
                                                supervisor_student
                                                ON 
                                                    journal.id = supervisor_student.id
                                            WHERE
                                                supervisor_student.course = $currentCOURSE";
                                    $query_run = mysqli_query($con, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $row) {
                                ?>
                                            <tr>
                                                <td><?= $row['student_id']; ?></td>
                                                <td><?= $row['fname']; ?> <?= $row['lname']; ?></td>

                                                <td>
                                                    <?php
                                                    if ($row['grade'] == "0") {
                                                    ?>
                                                        <p><span style="color: red;">Not yet graded</span></p>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <p><span style="color: green;"><?php echo $row['grade']; ?></span></p>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $row['date']; ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                        <a type="button" class="btn btn-outline-primary" href="journal_view.php?id=<?= $row['journal_id']; ?>">View</a>

                                                        <button type="button" class="btn btn-outline-warning" data-journal-id="<?= $row['journal_id']; ?>" data-toggle="modal" data-target="#addRatingModal">Add Rating</button>

                                                        <a type="button" class="btn btn-outline-info" href="comment_add.php?id=<?= $row['journal_id']; ?>">Add Comment</a>
                                                    </div>
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
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="addRatingModal" tabindex="-1" role="dialog" aria-labelledby="addRatingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRatingModalLabel">Add Rating</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="process.php" method="POST">
                <div class="modal-body">
                    <!-- Rating form goes here -->
                    <input type="hidden" name="journalIdInput" value="">

                    <div class="form-group">
                        <label class="mb-2" for="name"><b>Rating:</b></label>
                        <input type="text" class="form-control" placeholder="Enter Rating" name="rating" maxlength="3" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 3);" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_rating" class="btn btn-primary">Submit Rating</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var addRatingButtons = document.querySelectorAll('.btn-outline-warning');
    var journalIdInput = document.querySelector('#addRatingModal input[name="journalIdInput"]');

    addRatingButtons.forEach(function (button) {
                  ON 
                    supervisor_student.acc_status = acc_stat
        button.addEventListener('click', function () {
            var journalId = button.getAttribute('data-journal-id');
            journalIdInput.value = journalId;
        });
    });
</script>

<?php
include('footer.php');
?>
