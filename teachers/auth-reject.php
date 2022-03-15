<?php session_start() ?>
<?php require "../authentication/dbconfig.php" ?>
<?php 



$serial_no = $_POST["sn"];
$sql="UPDATE `file_upload` SET `status`=3 WHERE serial_no = '$serial_no'";
if(mysqli_query($conn, $sql)){
    header("Location: requestJournal.php");
}else{
    echo "<h1> wrong querry</h1>";
}


?>