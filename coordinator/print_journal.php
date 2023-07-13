<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <?php include('authentication.php'); ?>

  <title>ONLINE OJT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  

  
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


  <style type="text/css" media="print">
    @page {
      size: auto;
    }

    @media print {
      .noprint,
      .noprint * {
        display: none;
      }

      .image-container {
        page-break-inside: avoid;
      }
    }
  </style>

</head>


<body onload="print()">


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

<input type="hidden" name="id" value="<?=$user['id'];?>"> 


                        <div class="col-md-12">
                            <label for="inputName5" class="form-label"><b>Journal Title:</b></label>
                            <input name="title" class="form-control" value="<?= $user['title']; ?>">
                        </div>

                        <div class="col-md-12">
                            <label for="inputName5" class="form-label"><b>Journal Message:</b></label>
                            <textarea name="message" class="form-control" rows="10"><?= $user['message']; ?></textarea>
                        </div>

                        <div class="col-md-3">
                            <label for="inputName5" class="form-label"><b>Date Submitted:</b></label>
                            <input class="form-control" readonly value="<?= $user['date']; ?>">
                        </div>

                        <div class="col-md-3">
                            <label for="inputName5" class="form-label"><b>Grade:</b></label>
                            <input name="grade" class="form-control" value="<?= ($user['grade'] == 0) ? 'Not yet graded' : $user['grade']; ?>">
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
                                            <div class="image-container" style="height: 400px; width: 400px; max-width: 100%; ">
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

</body>
</html>
