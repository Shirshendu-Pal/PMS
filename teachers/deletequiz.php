<?php session_start() ?>
<?php require "../authentication/dbconfig.php" ?> 

<?php

        $gid= $_GET["qid"];

        $sql="DELETE FROM `quiz` WHERE `qid`='$gid'";

        if(mysqli_query($conn, $sql)){

            header("Location: quiz.php");

        }else{
            echo "<h1> wrong querry </h1>";
        }

?>