<?php
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
                
                  
                header("Location:adminpage.php");}

            
                else{
                      
                  
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