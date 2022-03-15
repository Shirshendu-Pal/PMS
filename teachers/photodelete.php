<?php session_start() ?>
<?php require "../authentication/dbconfig.php" ?> 

<?php

        $gid= $_GET["gid"];

        $sql="DELETE FROM `gallery` WHERE `gid`='$gid'";

        if(mysqli_query($conn, $sql)){

            header("Location: gallery.php");

        }else{
            echo "<h1> wrong querry </h1>";
        }

?>