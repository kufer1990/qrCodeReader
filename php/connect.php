 <?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $db = "merckolnqe";

    $servername = "serwer2104676.home.pl";
    $username = "34509116_merkol";
    $password = "Ut3pa8c2@";
    $db = "34509116_merkol";




    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die('connectionfailed: ' . $conn->connect_error);
    }