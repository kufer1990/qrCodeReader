<?php
include 'php/connect.php';
// // echo "tekst";
// $sql = "SELECT * FROM `stany` WHERE `EAN` = 5907520527077";
// $result =  mysqli_query($conn, $sql);
// echo $result;


$query = "SELECT * FROM `stany` WHERE `EAN` = '5902163077675'";
$sql = mysqli_query($conn, $query);


while ($wynik = mysqli_fetch_array($sql)) {
    // print_r($wynik);
    echo "</br></br>$wynik[0]";
}
mysqli_close($conn);

include 'php/connect.php';
$query2 = "SELECT * FROM `stany` WHERE `EAN` = '5902163077675'";
$sql2 = mysqli_query($conn, $query2);

while ($wynik2 = mysqli_fetch_array($sql2)) {
    // print_r($wynik);
    echo "</br></br>$wynik2[2]";
}


// mysql_close($con);

//5902163077675