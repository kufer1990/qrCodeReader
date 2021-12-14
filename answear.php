<?php 
include 'php/header.php';
// include 'php/navbar.php';
// header('refresh: .5;');
$bardcodeElement=$_POST['bardcodeInputContent'];
?>
<div class="container">
<div class="row text-center mt-5">
    <div class="col-12 mt-3 border border-dark bg-light">Plu: <?php echo $bardcodeElement ?></div>
    <div class="col-12 mt-3 border border-dark bg-dark text-white">Nazwa:  <?php echo $bardcodeElement ?></div>
    <div class="col-12 mt-3 border border-dark bg-light">Ilość:  <?php echo $bardcodeElement ?></div>
    <div class="col-12 mt-3 border border-dark bg-dark text-white">Cena Sprzedaży:  <?php echo $bardcodeElement ?></div>
    <div class="col-12 mt-3 border border-dark bg-light">Cena Zakupu:  <?php echo $bardcodeElement ?></div>
    <div class="col-12 mt-3 border border-dark bg-dark text-white">Marża:  <?php echo $bardcodeElement ?></div>
    <!-- <div class="col-12 mt-3 border border-dark bg-light"></div>
    <div class="col-12 mt-3 border border-dark bg-dark text-white"></div> -->
</div>


<!-- button -->
<div class="row mt-5">
    <div class="col-12 text-center buttonStartScanParent">    
         <a href="scanner.php"> <button type="button" id="startScan" class="btn btn-primary">Rozpocznij skanowanie</button></a>
    </div>
  </div>

  <!-- <div class="row mt-5">
    <div class="col-12 text-center buttonStartScanParent">    
         <a href="scanner.php"> <button type="button" id="startScan" class="btn btn-primary">Rozpocznij skanowanie</button></a>
    </div>
  </div> -->
// 
  </div>