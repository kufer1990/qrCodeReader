<?php
// $nameFileExcelTemp =  $_FILES['excelFileToConvert']['tmp_name'];
// $nameFileExcel = $_FILES['excelFileToConvert']['name'];
// $location = "excel/" . $_FILES['excelFileToConvert']['name'];
// if (is_uploaded_file($_FILES['excelFileToConvert']['tmp_name'])) {
//     if (!move_uploaded_file($_FILES['excelFileToConvert']['tmp_name'],  $location)) {
//         echo 'problem: Nie udało się skopiować pliku do katalogu.';
//         return false;
//     }
// } else {
//     echo 'problem: Możliwy atak podczas przesyłania pliku.';
//     echo 'Plik nie został zapisany.';
//     return false;
// }
// return true;
// header('refresh: .5;');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/api/simplexlsx/src/SimpleXLSX.php';
$dateToTable = "";
// if ($xlsx = SimpleXLSX::parse("excel/" . $nameFileExcel)) {
if ($xlsx = SimpleXLSX::parse("excel/STANYmale.xlsx")) {
    // Produce array keys from the array values of 1st array element
    $header_values = $rows = [];
    foreach ($xlsx->rows() as $k => $r) {
        if ($k === 0) {
            $header_values = $r;
            continue;
        }
        $rows[] = array_combine($header_values, $r);
    }
    // print_r($rows[0]);
}

    include "php/connect.php";
    //create table
    $sql = "CREATE TABLE IF NOT EXISTS STANY (
    `EAN` BIGINT,
    `NAZWA` VARCHAR(30) CHARACTER SET utf8,
    `STAN` INT,
    `CENA_ZAKUPU` NUMERIC(5, 2),
    `CENA_SPRZEDAZY` NUMERIC(5, 2),
    `MARKA` VARCHAR(10) CHARACTER SET utf8,
    `DOST` VARCHAR(29) CHARACTER SET utf8
);";
    $result = mysqli_query($conn, $sql);

    //clear table
    $sql2 = "DELETE FROM `STANY`";
    $result2 = mysqli_query($conn, $sql2);




// if (count($xlsx->rows())>1000){
//     $numberOfLines = 10000;// quantity lines to import in one inquiry // ilosc linii importowanych w jednym zapytaniu
//     $overallIteration= floor(count($xlsx->rows())/$numberOfLines);
// }
// else{
//     $numberOfLines = count($xlsx->rows())-1;
//     $overallIteration= floor(count($xlsx->rows())/$numberOfLines);
// }

//     $numberOfIterarion =0; // the number of iteration that is being performed// numer iterazji, która się wykonuje
//     $moduloNumberOfLine = count($xlsx->rows())%$numberOfLines;
//     for ($j =0;$j<=$overallIteration;$j++){
     
//         //     else 
//             if($j>0){ $numberOfIterarion = $j*$numberOfLines;}// if the iteration is greater than 0 multiples the line number   
//             if($j==$overallIteration){
           
//                 $numberOfLines = $moduloNumberOfLine;
//                 }
        
$j=0;
$wykonanePetle =0;

$IloscLiniiWPliku = count($xlsx->rows());
$iloscPetliPo1000 = floor($IloscLiniiWPliku/1000);
echo $iloscPetliPo1000;
    //create question to sql
for ($i =0; $i<$IloscLiniiWPliku-1; $i++) {
     if ($IloscLiniiWPliku<1000){
        if ($i < $IloscLiniiWPliku-2) {
            $dateToTable = $dateToTable . "(" . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_ZAKUPU'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "','" . $rows[$i]['DOST'] . "'),";
        } else {
            $dateToTable = $dateToTable . "(" . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_ZAKUPU'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "','" . $rows[$i]['DOST'] . "')";
        }
        $sql3 = "INSERT INTO STANY VALUES $dateToTable";
        $result3 = mysqli_query($conn, $sql3);
    }
    else {  // jeżeli plik jest większy niż 1000 linii
     
     if($j<1000 && $wykonanePetle < $iloscPetliPo1000 ){
        if ($i < $IloscLiniiWPliku-2 ) {
            $dateToTable = $dateToTable . "(" . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_ZAKUPU'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "','" . $rows[$i]['DOST'] . "'),";
        } else {
            $dateToTable = $dateToTable . "(" . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_ZAKUPU'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "','" . $rows[$i]['DOST'] . "')";
        }
    }
   
    else if($j<1000 && $wykonanePetle == $iloscPetliPo1000){
        if ($i < $IloscLiniiWPliku-2 ) {
            $dateToTable = $dateToTable . "(" . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_ZAKUPU'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "','" . $rows[$i]['DOST'] . "'),";
        } else {
            $dateToTable = $dateToTable . "(" . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_ZAKUPU'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "','" . $rows[$i]['DOST'] . "')";
        }
        if($i==$IloscLiniiWPliku-2){

            echo "teraz dostales sie do ostatnich elementow";
           
            $sql3 = "INSERT INTO STANY VALUES $dateToTable";
            $result3 = mysqli_query($conn, $sql3);


        }
    }
    else if($j==1000){
        $dateToTable = $dateToTable . "(" . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_ZAKUPU'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "','" . $rows[$i]['DOST'] . "')";
        $j=0;
        $sql3 = "INSERT INTO STANY VALUES $dateToTable";
        $result3 = mysqli_query($conn, $sql3);
        $dateToTable="";
        $wykonanePetle++;
           }
$j++;
}




    }
   
        
    // echo $dateToTable;   

    //add table to db

    $sql3 ="";

// }

    // EAN
    // NAZWA
    // STAN
    // CENA_ZAKUPU
    // CENA_SPRZEAZY
    // MARKA
    // DOST



// include 'php/header.php';
// include 'php/navbar.php';

?>
<style>
    .navbar {
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
            <button class="btn btn-outline-success"><a href="index.php" class="text-success text-decoration-none">Powróć
                    do menu głównego</a></button>
        </div>
    </div>
</div>
<?php
include 'php/footer.php';
?>