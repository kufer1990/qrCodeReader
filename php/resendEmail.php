<?php 
include "sendEmail.php";
$LOGIN = $_POST['question'];

include "connect.php";
$sql="SELECT * FROM `MEMBERS` WHERE `LOGIN` = '$LOGIN'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    global $RANDOM_NUMBER;
     $RANDOM_NUMBER = $row['RANDOM_NUMBER'];

}
sendEmail($LOGIN,$RANDOM_NUMBER)





?>