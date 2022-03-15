<?php session_start() ?>
<?php require "dbconfig.php" ?>
<?php

$email = $_POST["email"];
$password = $_POST["password"];

if(empty($email) || empty($password)){
    echo "<h1> enter email id or password</h1>";
}else{
    $sql = "SELECT * FROM `user` WHERE `email`='$email' ";
    $sql1 = "SELECT * FROM `admin` WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql1);
   
    $rData = $result->fetch_assoc();
    $rData1 = $result1->fetch_assoc();

    if(is_null($rData1)){
        if($rData["is_verified"]==1){
        if($rData["email"]!=$email ){
            echo "<h1> wrong email </h1>";
    
    }elseif($rData["password"]!=$password){
        echo "<h1> wrong password </h1>";
    
    }else{
    
        $_SESSION["sessionName"] = $rData["name"];
        $_SESSION["sessionEmail"] =$rData["email"];
        $_SESSION["sessionID"] =$rData["uid"];
    
        $_SESSION["sessionAuth"] = "user";
    
        // $a= $_SESSION["sessionName"];
        // $b = $_SESSION["sessionEmail"];
        header("Location: ../students/index.php");
       // echo "login successfull";
        // echo $a;
        // echo $b;
       // echo  $_SESSION["sessionName"];
        //echo $rData1["name"];
         $conn->close();   
    
    
    }
}else{

    echo '<h1> please verify your email address by going to your registered email account </h1>';
}
    }else{
        if($rData1["is_verified"]==1){
        if($rData1["email"]!=$email ){
            echo "<h1> wrong email </h1>";
    
    }elseif($rData1["password"]!=$password){
        echo "<h1> wrong password </h1>";
    
    }else{
    
        $_SESSION["sessionName"] = $rData1["name"];
        $_SESSION["sessionEmail"] = $rData1["email"];
        $_SESSION["sessionID"] = $rData1["id"];
    
        $_SESSION["sessionAuth"] = "admin";
    
        // $a= $_SESSION["sessionName"];
        // $b = $_SESSION["sessionEmail"];
        header("Location: ../teachers/index.php");
      //  echo "login successfull";
        // echo $a;
        // echo $b;
       // echo  $_SESSION["sessionName"];
        //echo $rData1["name"];
         $conn->close();   
    
    
    }
}else{
    echo '<h1> please verify your email address by going to your registered email accounts </h1>';
}
    }
  
    
    
    

// if(isset($rData["name"])){

//     $_SESSION["sessionName"] = $rData["name"];
// }else if(isset($rData1["name"])){
//     $_SESSION["sessionName"] =$rData1["name"];
// }else if(isset($rData["email"])){
//     $_SESSION["sessionEmail"] = $rData1["email"];

// }else if(isset($rData1["email"])){
//     $_SESSION["sessionEmail"] = $rData["email"];
// }
  
    
}

?>