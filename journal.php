<?php session_start() ?>
    <?php require "html/top.php" ?>
    <?php require  "headercomponent/header.php" ?>
    <?php require  "headercomponent/navbar.php" ?>

    
<?php require "authentication/dbconfig.php" ?>

<?php 


$sql = "SELECT t1.journal_id, t1.heading, t1.description, t1.file_no, t1.author_name , t2.file_name, t2.user_id FROM journal t1, file_upload t2 WHERE t1.file_no=t2.serial_no ";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
  
    while ($row=$result->fetch_assoc()) {
        
        echo '<div class="card mt-3">
        <h5 class="card-header"> Author: '.$row["author_name"].'</h5>
        <div class="card-body">
          <h5 class="card-title">'.$row["heading"].'</h5>
          <p class="card-text">'.$row["description"].'</p>
          <a href="../upload/'.$row["file_name"].'" class="btn btn-primary">download</a>
        </div>
      </div>';
    }
}


?>





<?php require "footercomponent/footer.php" ?>
    <?php require "html/bottom.php" ?>