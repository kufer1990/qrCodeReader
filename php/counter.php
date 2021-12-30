<?php 
function counter(){
include 'connect.php';
$sqlCreateTable = 'CREATE TABLE IF NOT EXISTS `COUNTER` ('. ' `LICZNIK` INT(255) NOT NULL'. ' )'. ' ENGINE = myisam;';
$sqlResult = mysqli_query($conn, $sqlCreateTable);
$query1 = mysqli_query($conn, "SELECT * FROM `COUNTER`");
$sq = mysqli_fetch_array($query1);
if ($sq['LICZNIK'] == ""){
  $sqlAddLine = mysqli_query($conn, "INSERT INTO `COUNTER`(`LICZNIK`) VALUES ('1')");
}else{
  mysqli_query($conn, "UPDATE `COUNTER` SET LICZNIK = LICZNIK+1");
//   echo $sq['LICZNIK'];
}

}

?>