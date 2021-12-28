<?php 

function sendEmail($LOGIN,$RANDOM_NUMBER){
    $to="jakub.ferdek@gmail.com";
    $subject = "email@test.pl";
    $message = "Kod dla weryfikacji użytkownika $LOGIN to $RANDOM_NUMBER";
    $header="Weryfikacja użytkownika. $LOGIN";
    
    mail($to,$subject,$message,$header);
    }



?>