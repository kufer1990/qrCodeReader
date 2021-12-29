<?php
include 'header.php';
include 'navbar.php';
?>
<?php if($_SESSION['verification']=="NO") : ?>
<div class="container justify-content-center align-items-center w-100 h-100">
        <div class="row position-absolute top-50 start-50 translate-middle">
                <div class="responseMainPage"></div>
                <form method="POST">
                        <div class="col-12 text-center w-100 d-flex align-items-center">Twoje konto jest
                                niezweryfikowane na email pdv został wysłany kod aktywacyjny.</div>
                        <div class="col-12 mt-3"><input class="w-100 inputActivateAccount" type="number"
                                        placeholder="Wpisz kod aktywacyjny"></div>

                </form>
                <div class="col-12 mt-3"><button class="btn btn-primary w-100" id="confirmActivation">Zatwierdź</button>
                </div>
                <div class="col-12 mt-3"><button class="btn btn-primary w-100" id="resendEmail">Wyślij kod
                                ponownie</button></div>
        </div>

</div>

<?php elseif($_SESSION['verification'] != "NO") : ?>
<div class="container d-flex justify-content-center align-items-center h-100">
        <div class="row">
                <div class="col-md-12 col-lg-6 text-center">
                        <a href="scanner.php">
                                <button type="button" id="startScan" class="btn btn-primary m-5">Rozpocznij
                                        skanowanie</button>
                        </a>
                </div>
                <div class="col-md-12 col-lg-6 text-center">
                        <a href="dataUpdate.php" class="dataUpdateButton"> 
                                <button type="button" id="startScan" class="btn btn-primary m-5">Aktualizuj bazę danych</button>
                        </a>
                </div>

        </div>
        <div class="row">
                <div class="col-12">
                        
                </div>
        </div>
</div>
<?php endif;?>
</body>
<script src="../js/mainPage.js"></script>

</html>