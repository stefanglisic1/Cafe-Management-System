<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Unos pića</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Unos pića 
                            <a href="welcome.php" class="btn btn-danger float-end">NAZAD</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Naziv</label>
                                <input type="text" name="naziv" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Vrsta</label>
                                <input type="text" name="vrsta" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Stanje</label>
                                <input type="text" name="stanje" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Cena</label>
                                <input type="text" name="cena" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_kafic" class="btn btn-primary">Sačuvaj</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>