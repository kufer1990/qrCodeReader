<?php
include 'header.php';
?>
<div class="background-login"></div>
<div class="row">

</div>
<div class="container h-100 d-flex justify-content-center align-items-center">
    <form action="" method="POST">
        <div class="wrap border border-info bg-light p-5 ">
            <div class="requestPanelLog alert alert-danger text-center">
            </div>
            <div class="alert alert-danger text-center alertWithLogPanel" role="alert"></div>
            <div class="form-group">
                <label for="loginInput">Login:</label>
                <input type="text" name="loginPanel" class="form-control mb-2" id="loginInput"
                    aria-describedby="emailHelp" placeholder="Wpisz Login">
            </div>
            <div class="form-group">
                <label for="loginPassword" class="mt-1">Hasło</label>
                <input type="password" name="passwordPanel" class="form-control mb-2 " id="passwordInput"
                    placeholder="Wpisz Hasło">
            </div>
            <div class="row justify-content-center">
                <div onclick="runAjax()" class="btn btn-primary w-100 border mt-3 btnLoginAccepted">Zaloguj</div>
                <div  class="btn btn-primary w-100 borde mt-2 btnCreateAccount">Załóż konto</div>
                <!-- <button type="submit" class="btn btn-primary mt-5 d-none" id="loginAccount">Zaloguj</button> -->
            </div>
        </div>
    </form>
    <form action="create_account.php">
        <button type="submit" class="btn btn-primary mt-1 d-none" id="registerAccount">Załóż konto</button>
    </form>
</div>

</body>
<!-- <script>
function runAjax(){
    console.log('test');
    let xhr= new XMLHttpRequest();
    console.log(xhr.status);
    

    xhr.onreadstatechange = function(){
if(xhr.status==200){
    console.log('tak');
    document.getElementById("requestPanelLog").innerHTML = 'tak';
    // xmlhttp.responseText;
}
}

xhr.open("POST", "verify_user.php", true);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send("loginPanel="+'5179024', "passwordPanel="+'ut3pa8c2');

}
</script> -->


<script src="../js/panel_log_event.js"></script>

</html>