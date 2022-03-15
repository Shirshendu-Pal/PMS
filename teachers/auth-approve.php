<?php session_start() ?>
<?php require "../authentication/dbconfig.php" ?>
<?php require "head.php" ?>
<?php 



$serial_no = $_POST["sn"];
$author = $_POST["author"];
// $heading = $_POST["heading"];
// $description= $_POST["description"];

//$sql1="INSERT INTO `journal`(`heading`, `description`, `file_no`) 
//VALUES ('$heading','$description','$serial_no')";
$sql="UPDATE `file_upload` SET `status`= 1 WHERE serial_no = '$serial_no'";
    if(mysqli_query($conn, $sql)){

        echo '<div class="col-6" style="margin-left:30%; margin-top: 50px;">
        <form method="post" action="approve.php">

        <input type="hidden" name="sn" value='.$serial_no.'>
        <input type="hidden" name="author" value='.$author.'>
        
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Enter Heading for the Journal</label>
            <input type="text" class="form-control" name="heading" >
            
          </div>
          <div class="mb-3">
          <div class="form-floating">
          <textarea class="form-control" name="desc" style="height: 100px"></textarea>
          <label for="floatingTextarea2">Description</label>
            </div>
          </div>
         
          <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
        </form>
        </div>';
          
           // header("Location: approve.php");

    }
    else{
        echo "<h1> something went worng </h1> " ;
    }





?>


<?php require "bottom.php" ?>