<?php 
include 'connect.php';
$question = json_decode($_POST['question']);
$LOGIN = $question->val->login;
$PASSWORD = password_hash($question->val->password, PASSWORD_DEFAULT);
$COMPANY_NUMBER = $question->val->companyNumber;
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
    echo 'Ten login jest już zajęty, spróbuj ponownie z innym loginem.';
}else{
    $sql2="INSERT INTO `MEMBERS` VALUES ('','$LOGIN','$PASSWORD',$COMPANY_NUMBER,$RANDOM_NUMBER,'$VERIFY',NOW())";
    $result = mysqli_query($conn, $sql2);
// send mail
sendEmail($LOGIN,$RANDOM_NUMBER);
   echo 'Twoje konto zostało założone. Na email pdv został wysłany kod weryfikacyjny, który trzeba wpisać po pierwszym logowaniu w celu weryfikacji konta.';
}







function sendEmail($LOGIN,$RANDOM_NUMBER){
$to="jakub.ferdek@gmail.com";
$subject = "email@test.pl";
$message = "Kod dla weryfikacji użytkownika $LOGIN to $RANDOM_NUMBER";
$header="Weryfikacja użytkownika. $LOGIN";

mail($to,$subject,$message,$header);
}
?>