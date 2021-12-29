 <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "merckolnqe";

    // $servername = "serwer2104676.home.pl";
    // $username = "34509116";
    // $password = "";
    // $db = "34509116";




    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die('connectionfailed: ' . $conn->connect_error);
    }
