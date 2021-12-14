<?php
$nameFileExcel = $_POST['excelFileToConvert'];
// header('refresh: .5;');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/api/simplexlsx/src/SimpleXLSX.php';
// header('refresh: .5;');

$dateToTable="";
if ( $xlsx = SimpleXLSX::parse('excel/'.$nameFileExcel)) {

	// Produce array keys from the array values of 1st array element
	$header_values = $rows = [];

	foreach ( $xlsx->rows() as $k => $r ) {
		if ( $k === 0 ) {
			$header_values = $r;
			continue;
		}
		$rows[] = array_combine( $header_values, $r );
	}
    
    //create question to sql
    for ($i=0; $i <count($xlsx->rows())-1 ; $i++) {
     if ($i<count($xlsx->rows())-2){
  $dateToTable= $dateToTable."(".$rows[$i]['EAN'].",'".$rows[$i]['NAZWA']."',".$rows[$i]['STAN'].",".$rows[$i]['CENA_ZAKUPU'].",".$rows[$i]['CENA_SPRZEDAZY'].",'".$rows[$i]['MARKA']."','".$rows[$i]['DOST']."'),";
        }
     else{$dateToTable= $dateToTable."(".$rows[$i]['EAN'].",'".$rows[$i]['NAZWA']."',".$rows[$i]['STAN'].",".$rows[$i]['CENA_ZAKUPU'].",".$rows[$i]['CENA_SPRZEDAZY'].",'".$rows[$i]['MARKA']."','".$rows[$i]['DOST']."')";}
    }


    include "php/connect.php";
//create table
$sql= "CREATE TABLE IF NOT EXISTS STANY (
    `EAN` BIGINT,
    `NAZWA` VARCHAR(30) CHARACTER SET utf8,
    `STAN` INT,
    `CENA_ZAKUPU` NUMERIC(5, 2),
    `CENA_SPRZEDAZY` NUMERIC(5, 2),
    `MARKA` VARCHAR(10) CHARACTER SET utf8,
    `DOST` VARCHAR(29) CHARACTER SET utf8
);";
$result = mysqli_query($conn, $sql );

//clear table
$sql2="DELETE FROM `STANY`";
$result2=mysqli_query($conn, $sql2);

//add table to db

$sql3="INSERT INTO STANY VALUES $dateToTable";
$result3 = mysqli_query($conn, $sql3);

    // EAN
    // NAZWA
    // STAN
    // CENA_ZAKUPU
    // CENA_SPRZEAZY
    // MARKA
    // DOST

}
include 'php/header.php';
include 'php/navbar.php';

?>
<style>
.navbar{
background-color: #198754!important;
}


</style>


<div class="container h-100 border border-dark">
    <div class="row h-100 d-flex align-items-center">
        <div class="col-12  d-flex align-items-center justify-content-center">
            <div class="text justify-content-center text-white bg-success p-4">Gratulacje! Baza została zaktualizowana!</div>
        </div>
        <div class="col-12  d-flex align-items-center justify-content-center">
            <button class="btn btn-outline-success"><a href="index.php" class="text-success text-decoration-none">Powróć do menu głównego</a></button>
        </div>
    </div>
</div>
<?php 
include 'php/footer.php';
?>