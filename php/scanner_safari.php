<?php 
include 'header.php';
// include 'navbar.php';
?>



<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-12">
            <div id="qr-reader" class="border border-primary" style="width:500px"></div>
            <div id="qr-reader-results">
                <div class="scannTextElement"></div>
            </div>
        </div>

        <div class="col-12">
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
    <!-- <div class="row">
        <div class="col-12">
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
</div> -->


</body>
<script src="../api/html5-qrcode/minified/html5-qrcode.js"></script>
<script>
    //  document.querySelector('#barcodesinputWithContent').value = "testtttttt";
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete" ||
            document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;

        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                console.log(`Scan result ${decodedText}`, decodedResult);
                // document.querySelector('#barcodesinputWithContent').value = decodedText;

            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>