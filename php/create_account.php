<?php
include 'header.php';
?>

<div class="background-login"></div>

<div class="container h-100 d-flex justify-content-center align-items-center">


    <form method="POST">
        <div class="wrap border border-info bg-light p-5 ">

        <div class="alert responseCreateAccount" id="allertAfterResponse" role="alert">
  
</div>
            <div class="row">
            <div class="alert alert-danger text-center alertDangerCreateAccount" role="alert">
            </div>
            </div>
            <div class="form-group">
                <label for="createLogin">Login:</label>
                <input type="text" name="login" class="form-control  mb-2" id="createLogin" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="createPassword" class="mt-1">Hasło: </label>
                <input type="password" name="password" id="createPassword" class="form-control mb-2">
            </div>
            <div class="form-group">
                <label for="createPasswordRepeat" class="mt-1">Powtórz Hasło:</label>
                <input type="password" id="createPasswordRepeat" class="form-control mb-2" >
            </div>
            <div class="form-group">
                <label for="shopNumber" class="mt-1">Numer Sklepu:</label>
                <input type="number" name="companyNumber" id="shopNumber" class="form-control mb-2" >
            </div>
            <div class="row justify-content-center">
                <div class="btn btn-primary w-100 borde mt-3" id="btnSubmit">Załóż konto</div>
                <button type="submit" class="btn btn-primary mt-5 d-none" id="submit" >Zaloguj</button>
                <div class="btn btn-primary w-100 borde mt-3" id="returnToLog">Wróć do logowania</div>
            </div>
        </div>
    </form>
    </div>
</body>
<script src="../js/create_account.js"></script>
</html>