<?php
session_start();
require 'dbcon.php';



if (isset($_POST['naruci'])) {
    $kafic_id = mysqli_real_escape_string($con, $_POST['kafic_id']);

    $naziv = mysqli_real_escape_string($con, $_POST['naziv']);
    $vrsta = mysqli_real_escape_string($con, $_POST['vrsta']);
    $stanje = mysqli_real_escape_string($con, $_POST['stanje'])-1;
    $cena = mysqli_real_escape_string($con, $_POST['cena']);

    $query = "UPDATE kafic SET stanje=stanje-1 WHERE id='$kafic_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Piće uspešno uređeno";
        header("Location: welcome.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Piće nije uređeno";
        header("Location: welcome.php");
        exit(0);
    }
}