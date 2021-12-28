
    <?php 
    include 'php/connect.php';
    
  //   $login = json_decode($_POST['question']);
  //   // $password = $_POST['pass'][1];
  // print_r($login->val->name);
  // print_r($login->val->pass);
  //   // echo $password;
   
//     $sql3="SELECT * FROM `MEMBERS` WHERE `login` = '$login'";
// $serchMemberWitchDb = mysqli_query($conn, $sql3);
// while($row = mysqli_fetch_array($serchMemberWitchDb)){
//     global $loginDb;
//     $loginDb = $row['PASSWORD'];
// }
// echo $loginDb;





function sendMail(){
  $to="jakub.ferdek@gmail.com";
$subject = "email@test.pl";
$message = 'Kod dla weryfikacji użytkownika  to';
$header='Weryfikacja użytkownika.';

echo mail($to,$subject,$message,$header);




}

sendMail()

   ?>
    
