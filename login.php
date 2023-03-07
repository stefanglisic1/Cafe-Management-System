<?php
session_start();
// Check if the user is already logged in
if (isset($_SESSION['admin'])) {
    header("Location: adminpage.php");
    exit();
  }else if (isset($_SESSION['user'])) {
    header("Location: user.php");
    exit();
  }
  
   include("connection.php");
   
   
        if(isset($_POST['submit'])){
            $username= $_POST['user'];
            $password = $_POST['pass'];
            $profile = $_POST['izbor'];
            $str2= "admin";
            $sql = "select * from prijava where username = '$username' and lozinka = '$password' and profile= '$profile'";
            $result=mysqli_query($conn,$sql);
           $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
           $count = mysqli_num_rows($result);

            if($count==1){
                
                if(!strcmp($profile,$str2)){ 
                $_SESSION['admin'] = $username;
                
                header("Location:adminpage.php");
                exit();
            }

            
                else{
                      
                    $_SESSION['user'] = $username;
                header("Location:user.php");
                }}
            
            else{
                echo'<script>
                window.location.href="index.php";
                alert("Login failed.Invalid username or password")
                </script>';
            }
        }
    

?>