
<?php session_start() ?>
<?php require "../authentication/dbconfig.php" ?>

<?php 

if($_SESSION["sessionAuth"]!="admin"){
	header("Location: ../index.php");
}


$username =  $_SESSION["sessionName"];

?>
<div class="d-flex justify-content-between" style="background-color: rgb(170, 170, 192); height: 120px">
<a href="../index.php"><img src="../assets/pic.png" alt="" class="logo" style=" width:150px;
    height: 150px;
    margin-top: 5px;"></a>
    <span class="fs-1 text-light">PERMEAN MEDICAL SOCIETY <?php
        echo '<span class="name" style=" color:red; font-size:20px;"> Hi,'.$username.'</span>';
        ?> </span>
    <a href="../logout.php"><img src="../assets/logout.png" alt="" class="login" style=" width:100px;
    height: 100px;
    margin-top: 10px;
    margin-bottom: 40px;"></a>
    </div>
        
    


    </div>