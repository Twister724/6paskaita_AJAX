<?php
include 'config.php';
$vardas = $_GET['name'];
$sql = "DELETE FROM pirkejai Where Name='$vardas'";
$data = mysqli_query($conn,$sql);
if ($data) {
	echo "Irasas pasalintas";
}else{
	echo "NOT DELETED";
}

?>