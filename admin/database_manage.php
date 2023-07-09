<?php
 include('authentication.php');
 include('header.php');
 include('sidebar.php');
 ?>

<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard / Export/Import in Database</li>
        </ol>
      </nav>
    </div>

<div class="col-lg-12">
    <div class="row">
        <div class="col-md-6">
            <h4>Export Database:</h4>
        <a href="export.php" class="btn btn-primary">Export Data</a>
        </div>

        <div class="col-md-6">
        <h4>Import Database:</h4>
        <form method="import.php" action="">
        <input type="submit" name="import" value="Import Data">
    </form>
        </div>
    </div>
</div>






<?php
 include('footer.php');
 ?>