<?php
include 'header.php';
// include 'navbar.php';
// header('refresh: .5;');
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

renderArticle($bardcodeElement, $conn);

?>
<div class="container">
    <div class="row text-center mt-5">
        <div class="col-12 mt-3 border border-dark bg-light">Plu: <?php echo $bardcodeElement ?></div>
        <div class="col-12 mt-3 border border-dark bg-dark text-white">Nazwa: <?php echo $answearNazwa ?></div>
        <div class="col-12 mt-3 border border-dark bg-light">Ilość: <?php echo $answearStan ?></div>
        <div class="col-12 mt-3 border border-dark bg-dark text-white">Cena Sprzedaży: <?php echo $answearCSprzed ?>
        </div>
        <div class="col-12 mt-3 border border-dark bg-light">Marka: <?php echo $answearMarka ?></div>

    </div>


    <!-- button -->
    <div class="row mt-5">
        <div class="col-12 text-center buttonStartScanParent">
            <a href="scanner.php"> <button type="button" id="startScan" class="btn btn-primary">Rozpocznij
                    skanowanie</button></a>
        </div>
    </div>

    <!-- <div class="row mt-5">
    <div class="col-12 text-center buttonStartScanParent">    
         <a href="scanner.php"> <button type="button" id="startScan" class="btn btn-primary">Rozpocznij skanowanie</button></a>
    </div>
  </div> -->

</div>