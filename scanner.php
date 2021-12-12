<?php
 include 'php/header.php';
include 'php/navbar.php';
?>

<!-- code scanner qr -->
<div class="container"></div>
<section class="qrReaderSection">
  <div class="row qrReaderSectionRow">
    <div class="col-12">
      <div class="row parentOfCanvasRow">
        <div class="col-12 wrapCanvas"> <canvas id="canvas" class=""></canvas></div>
      </div>
      <div class="row">
        <div class="col-12 inputPluParent">
          <div id="barcodes" class="border"></div>
          <input type="text" id="barcodesinput" class="border border-dark">
          <input type="text" id="barcodesinputWithContent" class="border border-primary">
        </div>
      </div>
    </div>
<!-- section choice camera -->
    <!-- <div class="row  mt-5">
      <div class="col-12 mb-2">Wybierz Kamerę, z której chcesz korzystać</div>
      <div class="col-12 listDetectedCameraParent">
        <select name="" id="listDetectedCamera" class="border border-primary w-100">

        </select>
      </div>
    </div> -->

  </div>
  </div>
</section>
<!-- choice camera -->


<!-- </div> -->
</body>
<script src="scanner.js"></script>

</html>
