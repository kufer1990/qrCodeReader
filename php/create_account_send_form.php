<?php 
include 'connect.php';
$LOGIN = $_POST['login'];
$PASSWORD = password_hash($_POST['password'], PASSWORD_DEFAULT);
$COMPANY_NUMBER = $_POST['companyNumber'];
$RANDOM_NUMBER = rand(1000,9999);
$VERIFY = 'NO';

$sql="CREATE TABLE IF NOT EXISTS MEMBERS (
    `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `LOGIN` VARCHAR(30) CHARACTER SET utf8,
    `PASSWORD` VARCHAR(100) CHARACTER SET utf8,
    `COMPANY_NUMBER` INT,
    `RANDOM_NUMBER` INT,
    `VERIFICATION` VARCHAR(10),
    `CREATION_DATE` DATETIME NOT NULL
    );";
$createTable = mysqli_query($conn, $sql);


$sql3="SELECT * FROM `MEMBERS` WHERE `login` = '$LOGIN'";
$serchMemberWitchDb = mysqli_query($conn, $sql3);
while($row = mysqli_fetch_array($serchMemberWitchDb)){
    global $loginDb;
    $loginDb = $row['LOGIN'];
}
if(@$loginDb>""){
    echo 'login w użyciu';
}else{
    $sql2="INSERT INTO `MEMBERS` VALUES ('','$LOGIN','$PASSWORD',$COMPANY_NUMBER,$RANDOM_NUMBER,'$VERIFY',NOW())";
    $result = mysqli_query($conn, $sql2);
   echo 'Konto zostało założone';
}







?>