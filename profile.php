
<?php
    session_start();
    require 'connection.php';
   
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
<?php include "header.html"?>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Profili
                            
                         
                            
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Profil</th>
                                    <th>Akcija</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM prijava";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $prijava)
                                        {
                                            ?>
                                            <tr>
                                                
                                                <td><?= $prijava['username']; ?></td>
                                                <td><?= $prijava['lozinka']; ?></td>
                                                <td><?= $prijava['profile']; ?></td>
                                                <td>
                                                   
                                                    <a href="changeprofile.php?id=<?= $prijava['id']; ?>" class="btn btn-success btn-sm">Uredi</a>
                                                    <form action="changeprofilecode.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_profile" value="<?=$prijava['id'];?>" class="btn btn-danger btn-sm">Izbriši</button>
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