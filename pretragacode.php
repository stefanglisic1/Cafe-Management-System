<?php
session_start();
require 'dbcon.php';

if (isset($_POST['naruci'])) {
    $kafic_id = mysqli_real_escape_string($con, $_POST['kafic_id']);
    $stanje = mysqli_real_escape_string($con, $_POST['stanje']);
    $stanje1 = intval($stanje)-1;

    $query = "UPDATE kafic SET stanje='$stanje1' WHERE id='$kafic_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Piće naručeno";
        header("Location:pretraga.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Piće nije naručeno";
        header("Location: welcome.php");
        exit(0);
    }
}