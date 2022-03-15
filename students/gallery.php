
<?php error_reporting(0) ?>
    <?php session_start() ?>
    <?php require "../authentication/dbconfig.php" ?> 
   <?php require "head.php" ?>
    <?php require  "headline.php" ?>
    <?php require  "../headercomponent/userNavbar.php" ?>

    <?php



    $userid = $_SESSION["sessionID"];
    
    $sql = "SELECT * FROM `gallery`";

    $result = mysqli_query($conn, $sql);


    
    ?>


      <?php


  if ($result->num_rows > 0) {
  
  while ($row=$result->fetch_assoc()) {
      
    
   
    echo    '<div class="flex-container">
    <div class="card" >
            <img src="../teachers/photos/'.$row["file_name"].'" class="card-img-top" alt="...">
            
    
            </div>
            </div>
            ';

           

  }
}
      ?>
    
    <style>
       /* .flex-container {
  display: flex;
 
} */

.flex-container > div {
  margin-left: 3.125em;
  margin-top:1.875em;
  width: 80%;
  text-align: center;
  
  
}
   </style>
    





<?php require "bottom.php" ?>
