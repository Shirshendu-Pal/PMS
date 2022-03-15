    
    <?php error_reporting(0) ?>
    <?php session_start() ?>
    <?php require "../authentication/dbconfig.php" ?> 
    <?php 

    $user = $_SESSION["sessionName"];
    $link = $_POST["quiz"];
    $name = $_POST["desc"];
    
   
      if (isset($_POST["sub"])){

        $sql = "INSERT INTO `quiz`(`author`, `link`,`description`)
        VALUES ('$user','$link','$name')";

        if(mysqli_query($conn, $sql)){

            header("Location: quiz.php");


        }
        else{
            echo "<h1> something went worng </h1> " ;
        }



    }
    
    ?>