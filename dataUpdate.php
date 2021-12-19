<?php
include 'php/header.php';
include 'php/navbar.php';

?>
<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col">
        <div class="alert alert-danger text-center alertElementFreeFile" role="alert">
         Załącz plik aby przejść dalej.
        </div>
            <form enctype="multipart/form-data" action="excelTo.php" method="post">
                <div class="row">
                    <div class="col-12"><input type="hidden" name="MAX_FILE_SIZE" value="512000000" />
                <input class="border border-primary w-100 p-3 addFile" type="file" name="excelFileToConvert" /></div>
                    <div class="col-12 text-center mt-3"> <input class="w-50 p-2 bg-primary text-white border text-center viewSendButton"  value="WYŚLIJ"></input>
                    <div class="col-12 text-center mt-3"> <input class="w-50 p-2 bg-primary text-white border hiddenSendButton invisible" type="submit" value="send" /></div>
                </div>
                
               
            </form>
        </div>
    </div>
</div>

</body>
<script src="js/dataUpdate.js"></script>

</html>
<?php

?>