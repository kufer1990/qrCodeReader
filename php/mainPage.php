<?php
include 'header.php';
include 'navbar.php';
// echo $_SESSION['verification'];
// echo $_SESSION['verification'];
?>
<!-- <div class="background-login"></div> -->

<!-- buttons -->
<!-- <div class="row bg-primary w-100 h-100 border justify-content-text align-items-center"> -->

<!-- </div> -->

<?php if($_SESSION['verification']=="NO") : ?>
<div class="container justify-content-center align-items-center w-100 h-100">
        <div class="row position-absolute top-50 start-50 translate-middle">
        <div class="responseMainPage"></div>
                <form method="POST">
                        <div class="col-12 text-center w-100 d-flex align-items-center">Twoje konto jest
                                niezweryfikowane na email pdv został wysłany kod aktywacyjny.</div>
                        <div class="col-12 mt-3"><input class="w-100" type="number" placeholder="Wpisz kod aktywacyjny"></div>
                        <div class="col-12 mt-3"><button class="btn btn-primary w-100" id="confirmActivation">Zatwierdź</button></div>
                        
                </form>
                <div class="col-12 mt-3"><button class="btn btn-primary w-100" id="resendEmail">Wyślij kod ponownie</button></div>
        </div>
      
</div>

<?php elseif($_SESSION['verification'] != "NO") : ?>
<div class="row h-100 indexButton">
        <div class="col-12 text-center buttonStartScanParent">
                <a href="scanner.php"> <button type="button" id="startScan" class="btn btn-primary m-5">Rozpocznij
                                skanowanie</button></a>
                <a href="dataUpdate.php" class="dataUpdateButton"> <button type="button" id="startScan"
                                class="btn btn-primary m-5">Aktualizuj bazę danych</button></a>
        </div>
        <?php endif;?>
        </body>
<script src="../js/mainPage.js"></script>
        </html>