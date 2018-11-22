<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "ajax_baze";

$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
} 


?>