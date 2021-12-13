<?php 
$servername="localhost";
$username="root";
$password="";
$db="merckolnqe";

$conn= new mysqli($servername, $username, $password, $db);

if($conn->connect_error){
    die('connectionfailed: '.$conn->connect_error);
}
?>