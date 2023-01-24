<?php
 
   include("connection.php");
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
</head>
<body>
   

    <div id="form">
        <h1>Login</h1>
        <form name="form" action="login.php" method="POST">
            <label >Username:</label>
            <input type="text" id="user" name="user" placeholder="username"></br></br>
            <label >Password:</label>
            <input type="password" id="pass" name="pass"placeholder="password"></br></br>
            <label for="cars">Choose a profile:</label>
            <select name="izbor" id="izbor">
              <option value="admin" name="admin">Admin</option>
              <option value="korisnik" name="korisnik">User</option>
            </select>
  <br><br>
             
            <input type="submit" id="btn" value="Login" name="submit"/>
            
        </form>
    </div>
</body>
</html>