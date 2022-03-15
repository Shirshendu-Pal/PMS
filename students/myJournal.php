<?php error_reporting(0) ?>
<?php session_start() ?>
<?php require "../authentication/dbconfig.php"; ?>
<?php require "head.php" ?>
    <?php require  "headline.php" ?>
    <?php require  "../headercomponent/userNavbar.php" ?>


    
    <!-- <div class="col-7 my-3" style=" margin-left: 10%;">
    
    <input class="row-3 form-control" type="file" id="formFile" >
    <button class="btn btn-primary row-3 mx-10">upload</button>
    </div> -->

    <?php

    $userid = $_SESSION["sessionID"];
    
    $sql = "SELECT `serial_no`, `user_id`, `file_name`, `orig_name`,`post_date`, `status` FROM `file_upload` WHERE `user_id` = '$userid'";

    $result = mysqli_query($conn, $sql);


    
    ?>
    <div class="body">
    <form action="./stuauth/upload_file.php" method="post" enctype="multipart/form-data">

        <input type="file" name="fileToUpload" id="fileToUpload" size="50" />

        <br />

        <input type="submit" value="Upload" name="submit" />

        </form>
    
        <table class="table">
  <thead>
    <tr>
      <th scope="col">SN.</th>
      <th scope="col">Filename</th>
      <th scope="col">Date uploaded</th>
      <th scope="col">Status</th>
      <th scope="col">Download</th>
      
      

    </tr>
  </thead>
  <tbody>
      <?php

      $counter = 1;
  if ($result->num_rows > 0) {
  
  while ($row=$result->fetch_assoc()) {
      
    $status = $row["status"];
    $approve = "";
    if($status==0){
        $approve = "Pending";
    }else if($status==1){
      $approve = "Approved";
  }else{
      $approve = "REJECTED";
  }

    echo    '<tr>
            <td>'.$counter.'
            <td>'.$row["orig_name"].'</td>
            <td>'.$row["post_date"].'</td>
            <td>'.$approve. '</td>
            
            <td> <a href="../upload/'.$row["file_name"].'"><img src="../assets/downloadicon.png" alt="baal" class="download" ></a> </td>
            
            </tr>';

            $counter++;

  }
}
      ?>
    
   
  </tbody>
</table>
</div>
    


<!-- <a href="./login.php"><img src="./assets/loginPMS.png" alt="" class="login"></a> -->
  
<?php require "../footercomponent/footer.php" ?>
    <?php require "bottom.php" ?>