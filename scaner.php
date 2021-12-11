<?php
 include 'php/header.php';
include 'php/navbar.php';
?>

<!-- code scanner qr -->
<div class="container"></div>
<section class="qrReaderSection h-100">
  <div class="row qrReaderSectionRow">
    <div class="col-12">
      <div class="row parentOfCanvasTrue">
        <div class="col-12"> <canvas id="canvas" class=""></canvas></div>
      </div>
      <div class="row">
        <div class="col-12 inputPluParent">
          <div id="barcodes" class="border"></div>
          <input type="text" id="barcodesinput" class="border border-dark">
          <input type="text" id="barcodesinputWithContent" class="border border-primary parentOfCanvas">
        </div>
      </div>
    </div>
<!-- section choice camera -->
    <div class="row  mt-5">
      <div class="col-12 mb-2">Wybierz Kamerę, z której chcesz korzystać</div>
      <div class="col-12 listDetectedCameraParent">
        <select name="" id="listDetectedCamera" class="border border-primary w-100">
            <!-- <option value="1">asd</option> -->
        </select>
      </div>
    </div>

  </div>
  </div>
</section>
<!-- choice camera -->


<!-- </div> -->
<?php include 'php/footer.php';?>