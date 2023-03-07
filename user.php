<?php
  
  session_start();
  require 'dbcon.php';
  // Check if the user is logged in
  if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
    }
    
    if (isset($_POST['logout'])) {
      session_destroy();
      header("Location: index.php");
      exit();
    }
    
    
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>UserPage</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Stanje pića
                        <div class="nav-item" style="position:absolute; right:25px; top:11px" >
            <form method="POST">
              <button  class="odjavi" type="submit" name="logout" style="color:white; background-color:crimson; border:transparent; border-radius:2px; padding:5px ">Odjavi se</button>
            </form></div>
            
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Redni broj</th>
                                    <th>Naziv</th>
                                    <th>Vrsta</th>
                                    <th>Stanje </th>
                                    <th>Cena (din)</th>
                                  
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