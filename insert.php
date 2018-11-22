<?php


//var_dump($data);

//$data['password'] = 'Labas';

//$json = json_encode($data);


//echo $json;

include 'config.php';
include "ajax.php";
//$name = $_POST["name"];
//$surname = $_POST["surname"];
$sql = "INSERT INTO pirkejai (Name,Surname) VALUES('$vardas','$pavarde')";
if ($conn->query($sql)) {
	echo "Irasas sekmingai sukurtas";
} else {
	echo "Irasas nesekmingas: " . $sql . "<br>" . $conn->error;
}
