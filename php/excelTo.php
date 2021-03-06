<?php

$nameFileExcelTemp =  $_FILES['excelFileToConvert']['tmp_name'];
$nameFileExcel = $_FILES['excelFileToConvert']['name'];
$location = "../excel/" . $_FILES['excelFileToConvert']['name'];
if (is_uploaded_file($_FILES['excelFileToConvert']['tmp_name'])) {
    if (!move_uploaded_file($_FILES['excelFileToConvert']['tmp_name'],  $location)) {
        echo 'problem: Nie udało się skopiować pliku do katalogu.';
        return false;
    }
} else {
    echo 'problem: Możliwy atak podczas przesyłania pliku.';
    echo 'Plik nie został zapisany.';
    return false;
}
// return true;

// header('refresh: .5;');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/../api/simplexlsx/src/SimpleXLSX.php';
$dateToTable = "";
if ($xlsx = SimpleXLSX::parse("../excel/" . $nameFileExcel)) {
    // Produce array keys from the array values of 1st array element
    $header_values = $rows = [];
    foreach ($xlsx->rows() as $k => $r) {
        if ($k === 0) {
            $header_values = $r;
            continue;
        }
        $rows[] = array_combine($header_values, $r);
    }
}

include "connect.php";

$sqlDrop = "DROP TABLE `STANY`";
$resultDrop = mysqli_query($conn, $sqlDrop);
//create table
$sql = "CREATE TABLE IF NOT EXISTS STANY (
    `ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `EAN` BIGINT,
    `NAZWA` VARCHAR(30) CHARACTER SET utf8,
    `STAN` INT,
    `CENA_SPRZEDAZY` NUMERIC(7, 2),
    `DOST` VARCHAR(29) CHARACTER SET utf8
);";
$result = mysqli_query($conn, $sql);

//clear table
$sql2 = "DELETE FROM `STANY`";
$result2 = mysqli_query($conn, $sql2);
// mysqli_close($conn);

$j = 0;
$wykonanePetle = 0;

$IloscLiniiWPliku = count($xlsx->rows());
$iloscPetliPo1000 = floor($IloscLiniiWPliku / 1000);

//create question to sql
for ($i = 0; $i < $IloscLiniiWPliku - 1; $i++) {
    if ($IloscLiniiWPliku < 1000) {
        if ($i < $IloscLiniiWPliku - 2) {
            $dateToTable = $dateToTable . "(''," . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "'),";
        } else {
            $dateToTable = $dateToTable . "(''," . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "')";
        }
        $sql3 = "INSERT INTO STANY VALUES $dateToTable";
        $result3 = mysqli_query($conn, $sql3);
    } else {  // jeżeli plik jest większy niż 1000 linii
        if ($j < 1000 && $wykonanePetle < $iloscPetliPo1000) {
            if ($i < $IloscLiniiWPliku - 2) {
                // "('',$rows[$i]['EAN'],'$rows[$i]['NAZWA']',$rows[$i]['STAN'],$rows[$i]['CENA_SPRZEDAZY'],'$rows[$i]['MARKA']'),";
                $dateToTable = $dateToTable . "(''," . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "'),";
            } else {
                $dateToTable = $dateToTable . "(''," . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "')";
            }
        } else if ($j < 1000 && $wykonanePetle == $iloscPetliPo1000) {
            if ($i < $IloscLiniiWPliku - 2) {
                $dateToTable = $dateToTable . "(''," . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "'),";
            } else {
                $dateToTable = $dateToTable . "(''," . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "')";
            }
            $sql3 = "INSERT INTO STANY VALUES $dateToTable";
            $result3 = mysqli_query($conn, $sql3);
            if ($i == $IloscLiniiWPliku - 2) {
                $sql3 = "INSERT INTO STANY VALUES $dateToTable";
                $result3 = mysqli_query($conn, $sql3);
            }
        } else if ($j == 1000) {
            $dateToTable = $dateToTable . "(''," . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "')";
            $j = 0;
            $sql3 = "INSERT INTO STANY VALUES $dateToTable";
            $result3 = mysqli_query($conn, $sql3);
            $dateToTable = "";
            $wykonanePetle++;
        }
        $j++;
    }
}
$sql3 = "";
// ID
// EAN
// NAZWA
// STAN
// CENA_SPRZEAZY
// MARKA
function countOfDatabase(){
    include 'connect.php';
    $sql= "SELECT count(*) FROM `STANY`";
    $result = mysqli_query($conn, $sql);
    while($row =mysqli_fetch_array($result)){
        global $countOfTableStany;
   $countOfTableStany = $row[0];

}
}
countOfDatabase();


include 'header.php';
include 'navbar.php';

?>
<style>
    .navbar {
        background-color: #198754 !important;
    }

    #sessionLogOut>a{
        background-color: #198754 !important;
    }
</style>


<div class="container h-100 border border-dark">
    <div class="row h-100 d-flex align-items-center">
        <div class="col-12  d-flex align-items-center justify-content-center">
            <div class="text justify-content-center text-white bg-success p-4">Gratulacje! Baza została zaktualizowana!
            </div>
        </div>
        <div class="col-12  d-flex align-items-center justify-content-center">
            <div class="text justify-content-center text-success border border-success p-4"><?php echo "Zaimportowanych zostało <strong>$countOfTableStany</strong> kodów. Wartość powinna zgadzać się z ilością referencji znajdujących się w excelu.";?>
            </div>
        </div>
        <div class="col-12  d-flex align-items-center justify-content-center">
            <button class="btn btn-outline-success"><a href="mainPage.php"
                    class="text-success text-decoration-none">Powróć
                    do menu głównego</a></button>
        </div>
    </div>
</div>
</body>

</html>