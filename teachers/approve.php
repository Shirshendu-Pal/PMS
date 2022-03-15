<?php session_start() ?>
<?php require "../authentication/dbconfig.php" ?>

<?php 



$serial_no = $_POST["sn"];
$author = $_POST["author"];
$heading =$_POST["heading"];
$description =$_POST["desc"];


if (isset($_POST["submit"])){

    $sql = "INSERT INTO `journal`(`heading`, `description`, `file_no`, `author_name`)
     VALUES ('$heading','$description','$serial_no','$author')";

    if(mysqli_query($conn, $sql)){

        header("Location: requestJournal.php");


    }
    else{
        echo "<h1> something went worng </h1> " ;
    }



}

?>