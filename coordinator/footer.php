</main><!-- End #main -->

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    // Add an event listener to the "Add Rating" buttons
    var addRatingButtons = document.querySelectorAll('.add-rating-btn');
    addRatingButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var journalId = button.getAttribute('data-journal-id');
            document.querySelector('#addRatingModal input[name="journalIdInput"]').value = journalId;
        });
    });

    function printContent() {
        // ...
    }
</script>
  
<script>
  $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var rowId = button.data('course-id');
    var modal = $(this);
    modal.find('#row_id').val(rowId);
  });
</script>






<?php
        if(isset($_SESSION['status']) && $_SESSION['status_code'] !='' )
        {
            ?>
                <script>
                swal({
                  title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                });
                </script>
                <?php
                unset($_SESSION['status']);
                unset($_SESSION['status_code']);
        }     
 ?>

<script>
    // JavaScript code to handle the delete confirmation modal and pass the ID to the form
    const deleteConfirmationModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
    const deleteButtons = document.querySelectorAll('[data-toggle="modal"][data-target="#deleteConfirmationModal"]');

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const deleteId = button.getAttribute('data-delete-id');
            const deleteIdInput = document.getElementById('deleteIdInput');
            deleteIdInput.value = deleteId;
            deleteConfirmationModal.show();
        });
    });
</script>
 
</body>

</html>