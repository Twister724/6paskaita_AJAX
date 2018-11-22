<?php

//var_dump($_POST);

$vardas = $_POST['name'];
$pavarde = $_POST['surname'];
//echo $vardas;
//echo $pavarde;
//var_dump($data);

//$data['password'] = 'Labas';

//$json = json_encode($data);


//echo $json;

include 'config.php';
//$name = $_POST["name"];
//$surname = $_POST["surname"];
$sql = "INSERT INTO pirkejai (Name,Surname) VALUES('$vardas','$pavarde')";
if ($conn->query($sql)) {
	echo "Irasas sekmingai sukurtas";
} else {
	echo "Irasas nesekmingas: " . $sql . "<br>" . $conn->error;
}
//exit;