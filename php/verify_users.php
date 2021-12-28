<?php
include "connect.php";


$send = json_decode($_POST['send']);

$login =$send->val->login;
$password = $send->val->password;
// echo $login."    ".$password;
$sql = "SELECT * FROM `MEMBERS` WHERE `login` = $login";
$result = mysqli_query($conn, $sql);

while(@$row = mysqli_fetch_array($result)){
global $dbPassword;
global $dbLogin;
$dbLogin = $row['LOGIN'];
$dbPassword = $row['PASSWORD'];
};


if(!@$dbLogin){
    echo 'Błędny login. Brak użytkownika w bazie danych.';
}else{

if(password_verify($password,@$dbPassword)){
    session_start();
    $_SESSION['users'] = htmlspecialchars($login);
    echo "Zostałeś zalogowany";
   }else{
    echo 'Niepoprawne hasło.';
};
}


?>