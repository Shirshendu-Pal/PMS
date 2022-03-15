<?php 

//starting session
session_start();
//removing all session variable
session_unset();
//destroying php session
session_destroy();
//redirecting to the index page in 3 sec
header("refresh:3; url=index.php")



?>


<?php require "html/top.php" ?>
    <?php include  "headercomponent/header.php" ?>
    <div class="container text-center text-info my-5">
      <h1>Logout Successful !!</h1>
      <h1>Redirecting to Login Page in 3 Seconds</h1>
    </div>
    <?php require "html/bottom.php" ?>