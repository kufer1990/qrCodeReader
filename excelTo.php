<?php
$nameFileExcelTemp =  $_FILES['excelFileToConvert']['tmp_name'];
$nameFileExcel = $_FILES['excelFileToConvert']['name'];

$location = "excel/" . $_FILES['excelFileToConvert']['name'];

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

require_once __DIR__ . '/api/simplexlsx/src/SimpleXLSX.php';

$dateToTable = "";
if ($xlsx = SimpleXLSX::parse("excel/" . $nameFileExcel)) {

    // Produce array keys from the array values of 1st array element
    $header_values = $rows = [];

    foreach ($xlsx->rows() as $k => $r) {
        if ($k === 0) {
            $header_values = $r;
            continue;
        }
        $rows[] = array_combine($header_values, $r);
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




if (count($xlsx->rows())>1000){
    $numberOfLines = 10000;// quantity lines to import in one inquiry // ilosc linii importowanych w jednym zapytaniu
    $overallIteration= floor(count($xlsx->rows())/$numberOfLines);
}
else{
    $numberOfLines = count($xlsx->rows())-1;
    $overallIteration= floor(count($xlsx->rows())/$numberOfLines);
}

    $numberOfIterarion =0; // the number of iteration that is being performed// numer iterazji, która się wykonuje
 
  
 
    $moduloNumberOfLine = count($xlsx->rows())%$numberOfLines;

    // if($overallIteration = floor(count($xlsx->rows())/$numberOfLines){}

    for ($j =0;$j<=$overallIteration;$j++){

       

    if($j>0){
    $numberOfIterarion = $j*$numberOfLines;// if the iteration is greater than 0 multiples the line number
    }

    if($j==$overallIteration){
        $numberOfLines = $moduloNumberOfLine;
    }



    for ($i=$numberOfIterarion; $i< $numberOfLines; $i++) {
        // echo $i."</br>";
        if ($i < $numberOfLines-1) {
            $dateToTable = $dateToTable . "(" . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_ZAKUPU'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "','" . $rows[$i]['DOST'] . "'),";
        } else {
            $dateToTable = $dateToTable . "(" . $rows[$i]['EAN'] . ",'" . $rows[$i]['NAZWA'] . "'," . $rows[$i]['STAN'] . "," . $rows[$i]['CENA_ZAKUPU'] . "," . $rows[$i]['CENA_SPRZEDAZY'] . ",'" . $rows[$i]['MARKA'] . "','" . $rows[$i]['DOST'] . "')";
        }
    }    
    //add table to db

    $sql3 = "INSERT INTO STANY VALUES $dateToTable";
    $result3 = mysqli_query($conn, $sql3);
    $sql3 ="";
}

    // EAN
    // NAZWA
    // STAN
    // CENA_ZAKUPU
    // CENA_SPRZEAZY
    // MARKA
    // DOST

}

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