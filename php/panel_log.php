<?php
include 'header.php';
?>
<div class="background-login"></div>
<div class="container h-100 d-flex justify-content-center align-items-center">
    <form action="login_active.php">
        <div class="wrap border border-info bg-light p-5 ">
            <div class="form-group">
                <label for="loginInput">Login:</label>
                <input type="text" class="form-control  mb-2" id="loginInput" aria-describedby="emailHelp"
                    placeholder="Wpisz Login">
                           </div>
            <div class="form-group">
                <label for="loginPassword" class="mt-1">Hasło</label>
                <input type="password" class="form-control mb-2 " id="passwordInput"
                    placeholder="Wpisz Hasło">
            </div>
            <div class="row justify-content-center">
                <div class="btn btn-primary w-100 border mt-3 btnLoginAccepted">Zaloguj</div>
                <div class="btn btn-primary w-100 borde mt-2 btnCreateAccount">Załóż konto</div>
                <button type="submit" class="btn btn-primary mt-5 d-none" id="loginAccount">Zaloguj</button>
            </div>
        </div>
    </form>
    <form action="create_account.php">
    <button type="submit" class="btn btn-primary mt-1 d-none" id="registerAccount">Załóż konto</button>
    </form>
    </div>

</body>
<script src="../js/panel_log_event.js"></script>
</html>