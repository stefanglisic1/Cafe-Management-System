<?php
session_start();
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

    <title>Uredi piće</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>
      
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Uredi piće 
                            <a href="welcome.php" class="btn btn-danger float-end">NAZAD</a>
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
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="kafic_id" value="<?= $kafic['id']; ?>">

                                    <div class="mb-3">
                                        <label>Naziv</label>
                                        <input type="text" name="naziv" value="<?=$kafic['naziv'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Vrsta</label>
                                        <input type="text" name="vrsta" value="<?=$kafic['vrsta'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Stanje</label>
                                        <input type="text" name="stanje" value="<?=$kafic['stanje'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Cena</label>
                                        <input type="text" name="cena" value="<?=$kafic['cena'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit"  name="update_kafic" class="btn btn-primary">
                                            Uredi
                                        </button>
                                    </div>

                                </form>
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