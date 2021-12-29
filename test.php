
    <?php 
    
    
    
    function countOfDatabase(){
      include 'php/connect.php';
      $sql= "SELECT count(*) FROM `STANY`";
      $result = mysqli_query($conn, $sql);
      // echo "test test test";
      while($row =mysqli_fetch_array($result)){
echo $row[0];


      }
      // print_r($result);
  }
  countOfDatabase()
    ?>
