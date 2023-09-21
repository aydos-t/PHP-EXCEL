<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP-EXCEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <?php
            if (isset($_SESSION['message'])) {
                echo "<h4>" . $_SESSION['message'] . "</h4>";
                unset($_SESSION['message']);
            }
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>Import Excel data into database</h4>
                </div>
                <div class="card-body">
                    <form action="app.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="import_file" class="form-control">
                        <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>
</html>