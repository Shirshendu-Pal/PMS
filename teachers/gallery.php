
<?php error_reporting(0) ?>
    <?php session_start() ?>
    <?php require "../authentication/dbconfig.php" ?> 
   <?php require "head.php" ?>
    <?php require  "headline.php" ?>
    <?php require  "../headercomponent/adminNavbar.php" ?>

    <?php



    $userid = $_SESSION["sessionID"];
    
    $sql = "SELECT * FROM `gallery`";

    $result = mysqli_query($conn, $sql);


    
    ?>

<form action="upload_photo.php" method="post" enctype="multipart/form-data">

<input type="file" name="fileToUpload" id="fileToUpload" size="50" />


<br>

<input type="submit" value="Upload" name="submit" />

</form>



      <?php


  if ($result->num_rows > 0) {
  
  while ($row=$result->fetch_assoc()) {
      
    
   
    echo    '<div class="flex-container">
    <div class="card" >

    <a href="photodelete.php?gid='.$row["gid"].'" class="btn-close" style="width:50px; height:50px; background-color: red; display: flex; float: left;" ></a>
    
            

    
            <img src="photos/'.$row["file_name"].'" class="card-img-top" alt="...">
           
            </div>
            </div>
            ';

           

  }
}
      ?>

      <!-- <a href="photodelete.php?delid= $row["gid"]" class="btn-close" style="width:50px; height:50px; background-color: red; display: flex; float: left;" ></a> -->
    
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
