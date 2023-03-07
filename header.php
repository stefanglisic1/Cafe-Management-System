<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin'])) {
  header("Location: index.php");
  exit();
  }
  
  if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
  }
  
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="header.css" rel="stylesheet">
   
    <title>AdminPage</title>

</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      
     
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link " href="adminpage.php">Početna </a>
            <li class="nav-item">
              <a class="nav-link " href="profile.php">Profili </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="welcome.php">Stanje pica</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="uredi_stolove.php">Uredi stolove</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pretraga.php">Pretrazi</a>
            </li>
            <li class="nav-item" style="position:absolute; right:25px; top:11px" >
            <form method="POST">
              <button  class="odjavi" type="submit" name="logout" style="color:white; background-color:crimson; border:transparent; border-radius:2px; padding:5px ">Odjavi se</button>
            </form>
            </li>
           
          </ul>
       
        </div>
      </nav>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>