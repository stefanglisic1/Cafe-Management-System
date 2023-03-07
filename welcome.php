
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

    <title>AdminPage</title>
</head>
<body>
<?php include "header.php"?>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Stanje pića
                            <a href="unos_pica.php" class="btn btn-primary float-end">Unesi piće</a>
                         
                            
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Redni broj</th>
                                    <th>Naziv</th>
                                    <th>Vrsta</th>
                                    <th>Stanje</th>
                                    <th>Cena (din)</th>
                                    <th>Opcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM kafic";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $kafic)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $kafic['id']; ?></td>
                                                <td><?= $kafic['naziv']; ?></td>
                                                <td><?= $kafic['vrsta']; ?></td>
                                                <td><?= $kafic['stanje']; ?></td>
                                                <td><?= $kafic['cena']; ?></td>
                                                <td>
                                                    <a href="korisnik.php?id=<?= $kafic['id']; ?>" class="btn btn-info btn-sm">Pregledaj</a>
                                                    <a href="uredi_pice.php?id=<?= $kafic['id']; ?>" class="btn btn-success btn-sm">Uredi</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_kafic" value="<?=$kafic['id'];?>" class="btn btn-danger btn-sm">Izbriši</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>