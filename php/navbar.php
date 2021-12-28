<?php session_start();
if(empty($_SESSION['users'])){
    header('location: panel_log.php');
}
?>
<style>
    #sessionInfo {
        font-size: 1.5em;
        /* padding: 25px; */
    }
    #sessionLogOut{
        font-size: 1.5em;
    }
</style>

<nav class="navbar navbar-light bg-primary fixed-top">

    <div class="container justify-content-center">
        <div class="row w-100">
            <div class="col-sm-6 col-md-6 col-lg-8 text-center">
                <a class="navbar-brand" href="mainPage.php">
                    <i class="fas fa-qrcode navbar-icon"></i>
                </a></div>
            <div class="col-sm-3 col-md-3 col-lg-2 mt-2 mb-2 d-flex justify-content-center text-center
                 align-items-center text-white mt-1" id="sessionInfo">
                <i class="fab fa-angellist"></i><p id="userLogin" class="h-100 m-0 d-flex align-items-center"><?=$_SESSION['users']?></p></div>

            <div class="col-sm-3 col-md-3 col-lg-2 mt-2 mb-2 border" id="sessionLogOut"><a class="btn btn-primary btn-lg w-100 h-100 text-white text-decoration-none  d-flex justify-content-center align-items-center" href="logout.php">Wyloguj</a></div>

        </div>


    </div>
</nav>