<?php

// header('refresh: .5;');
// // ini_set('error_reporting', E_ALL);
// // ini_set('display_errors', true);

// require_once __DIR__.'/api/simplexlsx/src/SimpleXLSX.php';

// // echo '<h1>rows() and rowsEx()</h1>';
// if ( $xlsx = SimpleXLSX::parse('excel/STANY.xlsx')) {
// // 	// ->rows()
// // 	// echo '<h2>$xlsx->rows()</h2>';
// 	// echo '<pre>';
// 	// print_r( $xlsx->rows() );
// 	// echo '</pre>';
// // echo count($xlsx->rows());
// // 	// ->rowsEx();
// // 	// echo '<h2>$xlsx->rowsEx()</h2>';
// // 	// echo '<pre>';
// // 	// print_r( $xlsx->rowsEx() );
// // 	// echo '</pre>';
// $array = print_r($xslx->rows());
// echo $array;
// // echo '<pre>';
// for ($i=0; $i < count($xlsx->rows()) ; $i++) { 

//     // print_r($array);

//     # code...
// }
// echo '</pre>';
// // } else {
// // 	echo SimpleXLSX::parseError();
//  }



// include "php/connect.php";

// $sql= "CREATE TABLE IF NOT EXISTS STANY (
//     `EAN` BIGINT,
//     `NAZWA` VARCHAR(30) CHARACTER SET utf8,
//     `STAN` INT,
//     `CENA_ZAKUPU` NUMERIC(5, 2),
//     `CENA_SPRZEDAZY` NUMERIC(5, 2),
//     `MARKA` VARCHAR(10) CHARACTER SET utf8,
//     `DOST` VARCHAR(29) CHARACTER SET utf8
// );";

// $result = mysqli_query($conn, $sql );

?>








<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/api/simplexlsx/src/SimpleXLSX.php';
// header('refresh: .5;');
echo '<h1>Rows with header values as keys</h1>';
$dateToTable="";
if ( $xlsx = SimpleXLSX::parse('excel/STANY.xlsx')) {

	// Produce array keys from the array values of 1st array element
	$header_values = $rows = [];

	foreach ( $xlsx->rows() as $k => $r ) {
		if ( $k === 0 ) {
			$header_values = $r;
			continue;
		}
		$rows[] = array_combine( $header_values, $r );
	}
	// print_r( $rows );
    // $result2 = mysqli_query($conn, $sql );
 
    
    for ($i=0; $i <count($xlsx->rows())-1 ; $i++) {
     if ($i<count($xlsx->rows())-2){
  $dateToTable= $dateToTable."(".$rows[$i]['EAN'].",'".$rows[$i]['NAZWA']."'".$rows[$i]['STAN']."'".$rows[$i]['CENA_ZAKUPU']."'".$rows[$i]['CENA_SPRZEDAZY']."'".$rows[$i]['MARKA']."'".$rows[$i]['DOST']."'),";
        }
     else{$dateToTable = $dateToTable."(".$rows[$i]['EAN'].",'".$rows[$i]['NAZWA']."'".$rows[$i]['STAN']."'".$rows[$i]['CENA_ZAKUPU']."'".$rows[$i]['CENA_SPRZEDAZY']."'".$rows[$i]['MARKA']."'".$rows[$i]['DOST']."');";}
    }
    echo $dateToTable;
    
    // EAN
    // NAZWA
    // STAN
    // CENA_ZAKUPU
    // CENA_SPRZEAZY
    // MARKA
    // DOST

}