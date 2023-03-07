<?php
session_start();
require 'connection.php';



if(isset($_POST['update_prijava']))
{  
    $prijava_id = mysqli_real_escape_string($conn, $_POST['prijava_id']);

    $username= mysqli_real_escape_string($conn, $_POST['edituser']);
    $password = mysqli_real_escape_string($conn, $_POST['editpass']);
    $profile = mysqli_real_escape_string($conn, $_POST['editprofil']);
    
    $query = "UPDATE prijava SET username='$username', lozinka='$password', profile='$profile' WHERE id='$prijava_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Profil uspešno uređen";
        header("Location: profile.php");
        exit(0); 
    }
    else
    {
        $_SESSION['message'] = "Profil nije uređen";
        header("Location: profile.php");
        exit(0);
    }

}

if(isset($_POST['delete_profile']))
{
    $prijava_id = mysqli_real_escape_string($conn, $_POST['delete_profile']);

    $query = "DELETE FROM prijava WHERE id='$prijava_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Uspešno ste obrisali profil";
        header("Location:profile.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Profil nije obrisan";
        header("Location: profile.php");
        exit(0);
    }
}



?>