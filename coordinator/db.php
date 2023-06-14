<!DOCTYPE html>
<html>
<head>
    <title>Data Export/Import</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Data Export/Import</h2>
        <form method="post" enctype="multipart/form-data" action="import_export.php">
            <div class="form-group">
                <label for="file">Select file:</label>
                <input type="file" name="file" id="file" class="form-control-file">
            </div>
            <div class="form-group">
                <input type="submit" name="export" value="Export" class="btn btn-primary">
                <input type="submit" name="import" value="Import" class="btn btn-primary">
            </div>
        </form>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
