<?php
include "connect.php";

$login = $_POST['loginPanel'];
$password = $_POST['passwordPanel'];

$sql = "SELECT * FROM `MEMBERS` WHERE `login` = $login";
$result = mysqli_query($conn, $sql);

while(@$row = mysqli_fetch_array($result)){
global $dbPassword;
global $dbLogin;
$dbLogin = $row['LOGIN'];
$dbPassword = $row['PASSWORD'];
};


if(!@$dbLogin){
    echo 'Użytkownik nie istnieje w bazie</br>';
}

if(password_verify($password,@$dbPassword)){
    header('location: mainPage.php');
}else{
    echo 'niepoprawne hasło';
};



?>