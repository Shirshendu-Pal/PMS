<?php 

require "dbconfig.php";


$v_code = $_GET["v_code"];
$email = $_GET["email"];

if(isset($email) && isset($v_code)){

    $sql= "SELECT * FROM `user` WHERE `email`='$email' AND `verification_code`='$v_code'";
    $sql1= "SELECT * FROM `admin` WHERE `email`='$email' AND `verification_code`='$v_code'";

    $result=mysqli_query($conn,$sql);
    $result1=mysqli_query($conn,$sql1);


    if($result || $result1){

        if(mysqli_num_rows($result)==1 || mysqli_num_rows($result1)==1 ){
            $rData = mysqli_fetch_assoc($result);
            $rData1 = mysqli_fetch_assoc($result1);

            if(!empty($rData) && $rData["is_verified"]==0){

                $xemail = $rData["email"];

                    $update = "UPDATE `user` SET `is_verified`='1' WHERE `email`='$xemail'";

                    if(mysqli_query($conn,$update)){

                        echo '<script>
                        alert ("verification done!");
                    </script>';

                    }else{
                        echo ' <h1> error query 1 </h1>';
                    }



            
            
                }else if(!empty($rData1) && $rData1["is_verified"]==0){

                    $xemail1 = $rData1["email"];

                    $update1 = "UPDATE `admin` SET `is_verified`='1' WHERE `email`='$xemail1'";

                    if(mysqli_query($conn,$update1)){

                        echo '<script>
                        alert ("verification done!");
                    </script>';

                    }else{
                        echo ' <h1> error query 2 </h1>';
                    }

                }
                
                
                else{
                echo ' <h1> email already Registered </h1>';
            }


        }else{
            echo ' <h1> error query </h1>';
        }

    }else{
       echo ' <h1> error query 3 </h1>';
    }



}


?>

