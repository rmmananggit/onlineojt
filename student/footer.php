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
<script src="path/to/lightbox.js"></script>
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
 
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $("#togglePassword").click(function() {
      var passwordInput = $("#passwordInput");
      var eyeIcon = $("#eyeIcon");
      
      if (passwordInput.attr("type") === "password") {
        passwordInput.attr("type", "text");
        eyeIcon.removeClass("bi-eye").addClass("bi-eye-slash");
      } else {
        passwordInput.attr("type", "password");
        eyeIcon.removeClass("bi-eye-slash").addClass("bi-eye");
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    $("#togglePassword1").click(function() {
      var passwordInput1 = $("#passwordInput1");
      var eyeIcon = $("#eyeIcon");
      
      if (passwordInput1.attr("type") === "password") {
        passwordInput1.attr("type", "text");
        eyeIcon.removeClass("bi-eye").addClass("bi-eye-slash");
      } else {
        passwordInput1.attr("type", "password");
        eyeIcon.removeClass("bi-eye-slash").addClass("bi-eye");
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    $("#togglePassword2").click(function() {
      var passwordInput2 = $("#passwordInput2");
      var eyeIcon = $("#eyeIcon");
      
      if (passwordInput2.attr("type") === "password") {
        passwordInput2.attr("type", "text");
        eyeIcon.removeClass("bi-eye").addClass("bi-eye-slash");
      } else {
        passwordInput2.attr("type", "password");
        eyeIcon.removeClass("bi-eye-slash").addClass("bi-eye");
      }
    });
  });
</script>
</body>

</html>