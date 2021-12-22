<?php 
include 'connect.php';
// $LOGIN = password_hash($_POST['login'], PASSWORD_DEFAULT);
// $PASSWORD =$_POST['password'];
// $COMPANY_NUMBER = $_POST['companyNumber'];
// $RANDOM_NUMBER = rand(1000,9999);


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
// echo $createTable;
// print_r($createTable);
// $sql2 = "INSERT INTO `MEMBERS` VALUES ('', $LOGIN, $PASSWORD, $RANDOM_NUMBER,)"
$sql2="INSERT INTO `MEMBERS` VALUES ('','51650','ASDFAFA',7446,5498,'NO',NOW())";

// $sql2 = "INSERT INTO `members` VALUES ('','51790','asdf',7446,7777,'no',NOW())";



$result = mysqli_query($conn, $sql2);
print_r($result);
echo $result;





// $sql = "CREATE TABLE IF NOT EXISTS STANY (
//     `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     `EAN` BIGINT,
//     `NAZWA` VARCHAR(30) CHARACTER SET utf8,
//     `STAN` INT,
//     `CENA_SPRZEDAZY` NUMERIC(7, 2),
//     `DOST` VARCHAR(29) CHARACTER SET utf8
// );";
// $result = mysqli_query($conn, $sql);
?>



