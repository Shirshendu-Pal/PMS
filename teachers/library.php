
<?php error_reporting(0) ?>
    <?php session_start() ?>
    <?php require "../authentication/dbconfig.php" ?> 
   <?php require "head.php" ?>
    <?php require  "headline.php" ?>
    <?php require  "../headercomponent/adminNavbar.php" ?>

    <?php



    $userid = $_SESSION["sessionID"];
    
    $sql = "SELECT `lid`, `user_id`,`bookname`, `file_name`, `orig_name`,`post_date` FROM `library`";

    $result = mysqli_query($conn, $sql);


    
    ?>

<form action="upload_book.php" method="post" enctype="multipart/form-data">

<input type="file" name="fileToUpload" id="fileToUpload" size="50" />

<br />

<input type="text"  id="fileToUpload" name="bookname" />

<br>

<input type="submit" value="Upload" name="submit" />

</form>


<table class="table">
  <thead>
    <tr>
      <th scope="col">SN.</th>
      <th scope="col">Filename</th>
      <th scope="col">Date uploaded</th>
      <th scope="col">Dloaded</th>
     
      
      

    </tr>
  </thead>
  <tbody>
      <?php

$counter=1;
  if ($result->num_rows > 0) {
  
  while ($row=$result->fetch_assoc()) {
      
    
   
    echo    '<tr>
            <td>'.$counter.'</td>
            <td>'.$row["bookname"].'</td>
            <td>'.$row["post_date"].'</td>
            
            
            <td> <a href="library/'.$row["file_name"].'"><img src="../assets/downloadicon.png" alt="baal" class="download" ></a> </td>
            
            </tr>';

            $counter++;

  }
}
      ?>
    
   
  </tbody>
</table>





<?php require "bottom.php" ?>
