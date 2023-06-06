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
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script>
    function previewImage(frameId, imageId) {
      const frame = document.getElementById(frameId);
      const image = document.getElementById(imageId);

      // Create a FileReader object to read the uploaded file
      const reader = new FileReader();

      // Define the callback function when file reading is completed
      reader.onload = function(e) {
        const imageURL = e.target.result;
        frame.innerHTML = `<img src="${imageURL}" alt="Preview" width="200" height="200">`;
      };

      // Read the uploaded file as a data URL
      reader.readAsDataURL(image.files[0]);
    }
  </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



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
 
</body>

</html>