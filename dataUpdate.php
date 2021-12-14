<?php
include 'php/header.php';
// include 'php/navbar.php';

?>
<div class="conainer">
    <div class="row">
        <div class="col">
            <form enctype="multipart/form-data" action="excelTo.php" method="post">
                <input type="hidden" name="MAX_FILE_SIZE" value="512000000" />
                <input type="file" name="excelFileToConvert" />
                <input type="submit" value="wyślij" />
            </form>
        </div>
    </div>
</div>



<!-- 
<div class="container">

    <div class="row">
        <form action="excelTo.php" method="post">
            <div class="col"></div>
            <div class="col"><input type="file" name="excelFileToConvert"></div>
            <div class="col"><button type="submit">Zatwierdź</button></div>
    </div>
    </form>
</div> -->

</body>
<script src="answear.js"></script>

</html>
<?php
//  

// include 'php/footer.php';
?>