<?php
include 'header.php';
include 'navbar.php';
?>

<!-- code scanner qr -->
<div class="container"></div>
<section class="qrReaderSection">
    <div class="row qrReaderSectionRow">
        <div class="col-12">
            <div class="row parentOfCanvasRow">
                <div class="col-12 wrapCanvas"> <canvas id="canvas" class=""></canvas></div>
            </div>
            <form action="answear.php" method="POST">
                <div class="row">
                    <div class="col-12 inputPluParent">
                        <div id="barcodes" class="border"></div>
                        <input type="text" id="barcodesinput" class="border border-dark">

                        <input type="text" id="barcodesinputWithContent" name='bardcodeInputContent'
                            class="border border-primary">
                        <button type="send" class="sendForm d-none">wyslij</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>

</body>
<script src="../js/scanner.js"></script>

</html>