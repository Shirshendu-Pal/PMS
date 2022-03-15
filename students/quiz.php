<?php error_reporting(0) ?>
<?php session_start() ?>
<?php require "../authentication/dbconfig.php" ?> 
<?php require "head.php" ?>
    <?php require  "headline.php" ?>
    <?php require  "../headercomponent/userNavbar.php" ?>

    <?php

    $userid = $_SESSION["sessionID"];
    
    $sql = "SELECT `qid`, `author`, `link`,`description` FROM `quiz`";

    $result = mysqli_query($conn, $sql);


    
    ?>

<div class="body">
<table class="table">
  <thead>
    <tr>
      <th scope="col">SN.</th>
      <th scope="col">Author</th>
      <th scope="col">Name of the Quiz</th>
      <th scope="col">Quiz link</th>

     
      
      

    </tr>
  </thead>
  <tbody>
      <?php

     $counter = 1;
  if ($result->num_rows > 0) {
  
  while ($row=$result->fetch_assoc()) {
      
    
    
   
    echo    '<tr>
            <td>'.$counter.'</td>
            <td>'.$row["author"].'</td>
            <td>'.$row["description"].'</td>
            <td> <a href='.$row["link"].' target="blank">'.$row["link"].'</a> </td>
            
            
            
            
            </tr>';

            $counter++; 

  }
}
      ?>
    
   
  </tbody>
</table>
</div>




<?php require "../footercomponent/footer.php" ?>
    <?php require "bottom.php" ?>