<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>ONLINE OJT</title>
  </head>
  <body>
  <?php session_start(); ?>
  <main>
  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Hi! Welcome to</h3>
              <p>Web-based OJT Monitoring System in Panaon Campus</p>
            </div>
            <form action="codeforlogin.php" method="POST" class="needs-validation" novalidate>
              <div class="form-group first">
                <label for="username">Email/Student ID</label>
                <input type="text" class="form-control" name="email" id="email">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password"  name="password" id="password" class="form-control" id="password">
                
              </div>
          
              <input type="submit" name="login" class="btn btn-block btn-primary">

            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
  </main>
  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
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