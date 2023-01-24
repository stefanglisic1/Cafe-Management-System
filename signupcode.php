<?php
include_once 'connection.php';
if(isset($_POST['signup']))
{	 
	 $username = $_POST['unosuser'];
	 $password = $_POST['unospass'];
	 
	 
	 $sql = "INSERT INTO prijava (username,lozinka,profile)
	 VALUES ('$username','$password','korisnik')";
	 if (mysqli_query($conn, $sql)) {
       
        echo'<script>
        window.location.href="index.php";
        alert("Uspešno ste se registrovali.")
        </script>';
	 } else {
		$_SESSION['message'] = "Neuspešna registracija.Pokušaj ponovo.";
        header("Location: signup.php");
        exit(0);
	 }
	 mysqli_close($conn);
}
?>