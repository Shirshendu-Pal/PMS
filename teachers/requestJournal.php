<?php error_reporting(0) ?>
<?php session_start() ?>
<?php require "../authentication/dbconfig.php"; ?>
<?php require "head.php" ?>
    <?php require  "headline.php" ?>
    <?php require  "../headercomponent/adminNavbar.php" ?>


    <?php
    
    
    ?>
    
    <!-- <div class="col-7 my-3" style=" margin-left: 10%;">
    
    <input class="row-3 form-control" type="file" id="formFile" >
    <button class="btn btn-primary row-3 mx-10">upload</button>
    </div> -->

    <?php
    

    $userid = $_SESSION["sessionID"];
    
    $sql = "SELECT  t1.serial_no, t1.user_id, t1.file_name, t1.orig_name,t1.post_date, t1.status, t2.name FROM file_upload t1, user t2 WHERE t1.user_id=t2.uid ";


    $result = mysqli_query($conn, $sql);


    
    ?>
    
    
    
        <table class="table">
  <thead>
    <tr>
      <th scope="col">SN.</th>
      <th scope="col">Author</th>
      <th scope="col">Filename</th>
      <th scope="col">Date uploaded</th>
      <th scope="col">Status</th>
      <th scope="col">Download</th>
      <th scope="col">Approve</th>
      <th scope="col">Reject</th>
      

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
            <td>'.$counter.'</td>
            <td>'.$row["name"].'</td>
            <td>'.$row["orig_name"].'</td>
            <td>'.$row["post_date"].'</td>
            <td>'.$approve. '</td>
            
            <td> <a href="../upload/'.$row["file_name"].'"><img src="../assets/downloadicon.png" alt="baal" class="download" ></a> </td>
            <td> 
            <form action="auth-approve.php" method="post"> <input type="hidden" name="sn" value='.$row["serial_no"].'> 
            <input type="hidden" name="author" value='.$row["name"].'>
            <button class="btn btn-success">Approve</button> </form>  </td>



            <td> <form action="auth-reject.php" method="post"> <input type="hidden" name="sn" value='.$row["serial_no"].'> <button class="btn btn-danger">Reject</button> </form> </td>
            </tr>';

            $counter++;

  }
}
      ?>
    
   
  </tbody>
</table>
 
    
<!-- <form action="auth-approve.php" method="post"> <input type="hidden" name="sn" value='.$row["serial_no"].'> <button class="btn btn-success">Approve</button> </form> -->
<!-- <a href="./login.php"><img src="./assets/loginPMS.png" alt="" class="login"></a> -->
  

    <?php require "bottom.php" ?>