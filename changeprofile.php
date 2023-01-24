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

    <title>Uredi profil</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Uredi profil
                            <a href="profile.php" class="btn btn-danger float-end">NAZAD</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $prijava_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM prijava WHERE id='$prijava_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $prijava = mysqli_fetch_array($query_run);
                                ?>
                                <form action="changeprofilecode.php" method="POST">
                                    <input type="hidden" name="prijava_id" value="<?= $prijava['id']; ?>">

                                    <div class="mb-3">
                                        <label>Username</label>
                                        <input type="text" name="edituser" value="<?=$prijava['username'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="text" name="editpass" value="<?=$prijava['lozinka'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Tip profila</label>
                                        <select name="editprofil" id="izbor">
                                          <option value="admin" name="editprofil">Admin</option>
                                          <option value="korisnik" name="editprofil">Korisnik</option>
                                        </select>
                                       
                                    </div>
                                   
                                    <div class="mb-3">
                                        <button type="submit"  name="update_prijava" class="btn btn-primary">
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