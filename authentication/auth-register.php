<?php require "dbconfig.php" ?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$v_code){

    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
    require '../PHPMailer/Exception.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
                                                                //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'shirshendupal9@gmail.com';                     //SMTP username
        $mail->Password   = 'masticlub';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('shirshendupal9@gmail.com', 'PMS');
        $mail->addAddress($email);     //Add a recipient
        
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email verification for your PMS account';
        $mail->Body    = 'Thanks for Registration <br> Click the link below to verify your email address
        <a href="http://localhost/pms/authentication/verify.php?email='.$email.'&v_code='.$v_code.'">Verify</a>
        ';
    
    
        $mail->send();
        return true;
    } catch (Exception $e) {
       return false;
    }
}


?>
<?php 

$name = $_POST["username"];
$email = $_POST["useremail"];
$password = $_POST["password"];
$adminkey = $_POST["adminkey"];
$v_code = bin2hex(random_bytes(16));

if(empty($name)){
    echo "enter a valid name";
}else if(empty($email)){
    echo "enter a valid email";
}else if(empty($password)){
    echo "enter a password";
}else if(empty($adminkey)){
    if (isset($_POST["register"])){

        $sql = "INSERT INTO `user` (`name`,`email`,`password`,`verification_code`, `is_verified`) 
                VALUES('$name','$email','$password','$v_code','0')";

        if(mysqli_query($conn, $sql) && sendMail($_POST["useremail"],$v_code)){

            header("Location: ../index.php");


        }
        else{
            echo "<h1> something went worng </h1> " ;
        }



    }
}else if($adminkey=="1234" && !empty($name) && !empty($email) && !empty($password)){
    if (isset($_POST["register"])){

        $sql1 ="INSERT INTO `admin` (`name`,`email`,`password`,`adminkey`,`verification_code`, `is_verified`) 
        VALUES('$name','$email','$password','$adminkey','$v_code','0')";

        if(mysqli_query($conn, $sql1) && sendMail($_POST["useremail"],$v_code)){

            header("Location: ../index.php");


        }
        else{
            echo "<h1> something went worng </h1> " ;
            // header("Location: ../register.php");
        }



    }
}else{
    header("Location: ../register.php");
}


?>