<?php
$servername = "localhost";
$username = "root";
$password = "KODapa4294";
$dbname = "Doopy";

$connect = new mysqli($servername, $username, $password, $dbname);
if($connect->connect_error){
die("Connection failed: " . $connect->connect_error);
}
?>
