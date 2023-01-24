<?php
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Piće</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pregled stanja pića
                            <a href="welcome.php" class="btn btn-danger float-end">Nazad</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $kafic_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM kafic WHERE id='$kafic_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $kafic = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Naziv</label>
                                        <p class="form-control">
                                            <?=$kafic['naziv'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Vrsta</label>
                                        <p class="form-control">
                                            <?=$kafic['vrsta'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Stanje</label>
                                        <p class="form-control">
                                            <?=$kafic['stanje'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Cena (din)</label>
                                        <p class="form-control">
                                            <?=$kafic['cena'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>