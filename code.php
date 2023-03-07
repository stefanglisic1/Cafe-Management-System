<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_kafic']))
{
    $kafic_id = mysqli_real_escape_string($con, $_POST['delete_kafic']);

    $query = "DELETE FROM kafic WHERE id='$kafic_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Uspešno ste obrisali piće";
        header("Location:welcome.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Piće nije obrisano";
        header("Location: welcome.php");
        exit(0);
    }
}

if(isset($_POST['update_kafic']))
{  
    $kafic_id = mysqli_real_escape_string($con, $_POST['kafic_id']);

    $naziv = mysqli_real_escape_string($con, $_POST['naziv']);
    $vrsta = mysqli_real_escape_string($con, $_POST['vrsta']);
    $stanje = mysqli_real_escape_string($con, $_POST['stanje']);
    $cena = mysqli_real_escape_string($con, $_POST['cena']);

    $query = "UPDATE kafic SET naziv='$naziv', vrsta='$vrsta', stanje='$stanje', cena='$cena' WHERE id='$kafic_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Piće uspešno uređeno";
        header("Location: welcome.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Piće nije uređeno";
        header("Location: welcome.php");
        exit(0);
    }

}


if(isset($_POST['save_kafic']))
{
    $naziv = mysqli_real_escape_string($con, $_POST['naziv']);
    $vrsta = mysqli_real_escape_string($con, $_POST['vrsta']);
    $stanje = mysqli_real_escape_string($con, $_POST['stanje']);
    $cena = mysqli_real_escape_string($con, $_POST['cena']);

    $query = "INSERT INTO kafic (naziv,vrsta,stanje,cena) VALUES ('$naziv','$vrsta','$stanje','$cena')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Piće uspešno uneto";
        header("Location: welcome.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Piće nije uneto";
        header("Location: welcome.php");
        exit(0);
    }
}
if(isset($_POST['naruci']))
{  
    $kafic_id = mysqli_real_escape_string($con, $_POST['kafic_id']);

   
    $stanje= mysqli_real_escape_string($con, $_POST['stanje'])-1;
   
    $query = "UPDATE kafic SET stanje='$stanje' WHERE id='$kafic_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Piće uspešno uređeno";
        header("Location: pretraga.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Piće nije uređeno";
        header("Location: welcome.php");
        exit(0);
    }

}