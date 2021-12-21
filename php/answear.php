<?php
include 'header.php';
include 'connect.php';

$bardcodeElement = $_POST['bardcodeInputContent'];

function renderArticle($bardcodeElement, $conn)
{
    $sql = "SELECT * FROM `STANY` WHERE `ean` = $bardcodeElement";
    $result = mysqli_query($conn, $sql);
    while ($answear = mysqli_fetch_array($result)) {
        global $answearNazwa;
        global $answearStan;
        global $answearCSprzed;
        global $answearMarka;
        $answearNazwa = $answear['NAZWA'];
        $answearStan = $answear['STAN'];
        $answearCSprzed = $answear['CENA_SPRZEDAZY'];
        $answearMarka = $answear['DOST'];    
    };
}

//verify is not a string
function eanVerification($bardcodeElement, $conn){
    global $eanVerification;
if(preg_match('/^[0-9]+$/', $bardcodeElement)){
$eanVerification = true;
renderArticle($bardcodeElement, $conn);
}else{
   $eanVerification=false;
}
}

eanVerification($bardcodeElement, $conn);
 ?>

<?php if($eanVerification): ?>
<div class="container">
    <div class="row text-center mt-5">
        <div class="col-12 mt-3 answearDiv border border-dark bg-light">Plu: <?php echo $bardcodeElement ?></div>
        <div class="col-12 mt-3 answearDiv border border-dark bg-dark text-white">Nazwa: <?php if(@$answearNazwa){echo $answearNazwa;}else{echo "Brak danych w bazie";} ?></div>
        <div class="col-12 mt-3 answearDiv border border-dark bg-light">Ilość: <?php if(@$answearStan){echo $answearStan;}else{echo "Brak danych w bazie";} ?></div>
        <div class="col-12 mt-3 answearDiv border border-dark bg-dark text-white">Cena Sprzedaży: <?php if(@$answearCSprzed){echo $answearCSprzed;}else{echo "Brak danych w bazie";} ?>
        </div>
        <div class="col-12 mt-3 answearDiv border border-dark bg-light">Marka: <?php if(@$answearMarka){echo $answearMarka;}else{echo "Brak danych w bazie";} ?></div>
    </div>
    <!-- button -->
    <div class="row mt-5">
        <div class="col-12 text-center buttonStartScanParent">
            <a href="scanner.php"> <button type="button" id="startScan" class="btn btn-primary">Rozpocznij
                    skanowanie</button></a>
        </div>
    </div>
</div>
<?php else: ?>
    <div class="container">
        <div class="row text-center mt-5 justify-content-center">
             <div class="col-10 p-5 border border-danger text-center eanVerificationFalse">W twoim kodzie znalazł się niedozwolony znak. Spróbuj jeszcze raz.</div>
        </div>
    </div>
        <div class="row mt-5">
            <div class="col-12 text-center buttonStartScanParent">
            <a href="scanner.php"> <button type="button" id="startScan" class="btn btn-danger">Rozpocznij
                    skanowanie</button></a>
        </div>
    </div>
    <?php endif; ?>