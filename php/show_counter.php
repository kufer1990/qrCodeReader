<?php 
include 'header.php';
include 'navbar.php';
include 'connect.php';

$result = mysqli_query($conn, "SELECT * FROM `COUNTER`");
$ans = mysqli_fetch_array($result);


// echo $ans[0];

?>

<div class="contaier h-100 d-flex border border-danger justify-content-center align-items-center">
    <div class="row">
        <div class="col">
<p><?php echo "ilosc klikniec w strony scanner / answear $ans[0]"?></p>

        </div>
    </div>
</div>