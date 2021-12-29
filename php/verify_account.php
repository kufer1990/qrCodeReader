<?php 
include 'connect.php';
$number = $_POST['inputValue'];
$login = $_POST['loginUserWitchSession'];

$sql = "SELECT `RANDOM_NUMBER` FROM `MEMBERS` WHERE `LOGIN` = '$login'";
$result = mysqli_query($conn, $sql);
while(@$row = mysqli_fetch_array(@$result)){
    global $numberWitchDB;
    $numberWitchDB = $row[0];
    
}

if($numberWitchDB == $number){
    activateAccount($number, $login);
echo "Konto zosało aktywowane, wyloguj się i zaloguj ponownie.";
}else{
echo "Wpisany numer jest nieprawidłowy";
}


function activateAccount($number, $login){
// połączenie z bazą danych i zmiana weryfikacji na YES
include 'connect.php';
$sql2 = "UPDATE `members` SET `VERIFICATION`='YES' WHERE `LOGIN` = '$login'";
$result2 = mysqli_query($conn, $sql2);

}





// UPDATE `members` SET `VERIFICATION`='YES' WHERE `LOGIN` = 51790
?>